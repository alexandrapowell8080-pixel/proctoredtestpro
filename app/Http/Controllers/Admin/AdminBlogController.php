<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminBlogController extends Controller
{
    public function list(): View
    {
        $blogs = Blog::paginate(10);
        $categories = Category::all();
        return view('admin.blog.list', compact('blogs', 'categories'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request): View|JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'keywords' => 'required',
        ]);

        $image_url = $this->upload($request);
        $is_error = $image_url['error'] ?? 'no';
        if ($is_error != 'no') {
            throw ValidationException::withMessages([
                'image' => ['Image upload failed'],
            ]);
        }

        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;

        if (Blog::where('slug', $slug)->exists()) {
            do {
                $randomNumber = rand(1000, 9999);
                $slug = $baseSlug.'-'.$randomNumber;
            } while (Blog::where('slug', $slug)->exists());
        }
        
        $blog = Blog::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'image_url' => $image_url['url'],
            'description' => $request->meta_description,
            'content' => $request->input('content'),
            'slug' => $slug,
            'keywords' => $request->keywords,
            'meta_keywords' => $request->meta_keywords,
            'status' => 'draft',
        ]);

        return view('admin.blog.create')->with('success', 'Blog created successfully!');
    }

    public function edit(Request $request, string $id): View
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'meta_description' => 'required|string|max:160',
            'keywords' => 'required',
            'status' => 'required|in:published,draft,scheduled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imageUrl = $blog->image_url;
        if ($request->hasFile('image')) {
            $uploadResult = $this->upload($request);
            if (isset($uploadResult['error']) && $uploadResult['error'] != 'no') {
                throw ValidationException::withMessages([
                    'image' => ['Image upload failed'],
                ]);
            }
            $imageUrl = $uploadResult['url'];
        }

        $slug = $blog->slug;
        if ($request->title !== $blog->title) {
            $baseSlug = Str::slug($request->title);
            $slug = $baseSlug;
            while (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $baseSlug.'-'.rand(1000, 9999);
            }
        }

        $blog->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'image_url' => $imageUrl,
            'description' => $request->meta_description,
            'content' => $request->input('content'),
            'slug' => $slug,
            'keywords' => $request->keywords,
            'meta_keywords' => $request->meta_keywords ?? $request->keywords,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        try {
            if ($blog->image_url && ! str_contains($blog->image_url, 'placeholder.png')) {
                $path = str_replace(asset('storage/'), '', $blog->image_url);
                Storage::disk('public')->delete($path);
            }
            $blog->delete();
            return redirect()->route('admin.blog.index')->with('success', 'Blog post and associated image deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.blog.index')->with('error', 'An error occurred while trying to delete the post.');
        }
    }

    public function keyword(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255|unique:blogs,keywords',
            'category_id' => 'required|exists:categories,id',
        ]);

        Blog::create([
            'title' => $request->keyword,
            'slug' => Str::slug($request->keyword).'-'.rand(100, 999),
            'keywords' => $request->keyword,
            'description' => $request->keyword,
            'meta_keywords' => $request->keyword,
            'status' => 'new',
            'content' => 'Placeholder for '.$request->keyword,
            'category_id' => $request->category_id,
            'image_url' => asset('storage/uploads/placeholder.png'),
        ]);

        return redirect()->back()->with('success', 'Keyword created successfully.');
    }

    public function keywords(Request $request)
    {
        $file = $request->file('file');
        $handle = fopen($file->getRealPath(), 'r');
        $createdCount = 0;
        $skippedCount = 0;

        DB::beginTransaction();
        try {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (! empty($row[0]) && ! empty($row[1])) {
                    $categoryName = trim($row[0]);
                    $keywordName = trim($row[1]);

                    $category = Category::firstOrCreate(
                        ['name' => $categoryName],
                        ['slug' => Str::slug($categoryName)]
                    );

                    $exists = Blog::where('keywords', $keywordName)->exists();
                    if (! $exists) {
                        Blog::create([
                            'title' => $keywordName,
                            'slug' => Str::slug($keywordName).'-'.rand(1000, 9999),
                            'keywords' => $keywordName,
                            'meta_keywords' => $keywordName,
                            'description' => $keywordName,
                            'status' => 'new',
                            'content' => 'Bulk generated from CSV.',
                            'category_id' => $category->id,
                            'image_url' => asset('storage/uploads/placeholder.png'),
                        ]);
                        $createdCount++;
                    } else {
                        $skippedCount++;
                    }
                }
            }
            DB::commit();
            fclose($handle);

            $msg = "$createdCount keywords imported successfully.";
            if ($skippedCount > 0) {
                $msg .= " ($skippedCount duplicates skipped).";
            }
            return redirect()->back()->with('CSV_success', $msg);

        } catch (\Exception $e) {
            DB::rollBack();
            if ($handle) {
                fclose($handle);
            }
            return redirect()->back()->with('CSV_error', 'Import failed: '.$e->getMessage());
        }
    }

    public function generate()
    {
        Artisan::call('blogs:generate');
        return redirect()->back()->with('success', 'Blogs generated!');
    }

    private function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $imageUrl = asset('storage/'.$path);
            return ['path' => $path, 'url' => $imageUrl];
        }
        return ['error' => 'No file uploaded'];
    }
}