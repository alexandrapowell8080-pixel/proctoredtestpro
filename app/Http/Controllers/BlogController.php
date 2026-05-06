<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BlogController extends Controller
{
    //
    /**
     * List all Blogs
     */
    public function index(): View
    {
        $blogs = Blog::with(['category:id,name'])->where('status', Blog::PUBLISH)->paginate(10);
        $categories = Category::all();

        return view('blog.list', compact('blogs', 'categories'));
    }

    /**
     * Show a blog
     */
    public function show(string $blog_slug): View
    {
        $blog = Blog::where('slug', $blog_slug)->first();
        if (! $blog) {
            abort('404', 'Blog not found');
        }
        $related_blogs = Blog::where('category_id', $blog->category_id)->whereNot('id', $blog->id)->take(5)->get();

        return view('blog.show', compact('blog', 'related_blogs'));
    }

    public function list(): View
    {
        $blogs = Blog::paginate(10);
        $categories = Category::all();

        return view('admin.blog.list', compact('blogs', 'categories'));
    }

    public function edit(Request $request): View
    {
        $blog = Blog::findOrFail($request->input('id'));
        $categories = Category::all();

        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // 1. Find the blog or fail
        $blog = Blog::findOrFail($id);

        // 2. Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'meta_description' => 'required|string|max:160',
            'keywords' => 'required',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Image is optional on update
        ]);

        // 3. Handle Image Upload (Only if a new file is provided)
        $imageUrl = $blog->image_url; // Default to existing image
        if ($request->hasFile('image')) {
            $uploadResult = $this->upload($request);

            if (isset($uploadResult['error']) && $uploadResult['error'] != 'no') {
                throw ValidationException::withMessages([
                    'image' => ['Image upload failed'],
                ]);
            }
            $imageUrl = $uploadResult['url'];
        }

        // 4. Handle Slug (Only update if the title has changed)
        $slug = $blog->slug;
        if ($request->title !== $blog->title) {
            $baseSlug = Str::slug($request->title);
            $slug = $baseSlug;
            $count = 1;
            while (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $baseSlug.'-'.rand(1000, 9999);
            }
        }

        // 5. Update the record
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

        // 6. Redirect back with success message
        return redirect()->route('admin.blogs')->with('success', 'Post updated successfully!');
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

        // Check if the base slug already exists
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
            'status' => Blog::DRAFT,
        ]);

        return view('admin.blog.create');
    }

    private function upload(Request $request)
    {
        // dd($request,$request->hasFile('image'));
        // Check if file exists
        if ($request->hasFile('image')) {

            // Store the file in storage/app/public/uploads
            $path = $request->file('image')->store('uploads', 'public');

            // Generate URL
            $imageUrl = asset('storage/'.$path);

            return [
                'path' => $path,
                'url' => $imageUrl,
            ];
        }

        return ['error' => 'No file uploaded'];
    }

    /**
     * Remove the specified blog post from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        // 1. Find the blog or return a 404 if not found
        $blog = Blog::findOrFail($id);

        try {
            // 2. Handle Image Deletion (Optional but recommended)
            // If your image_url is a path, you should delete the file from the disk
            if ($blog->image_url && ! str_contains($blog->image_url, 'placeholder.png')) {
                $path = str_replace(asset('storage/'), '', $blog->image_url);
                Storage::disk('public')->delete($path);
            }

            // 3. Delete the database record
            $blog->delete();

            // 4. Redirect back with a success message
            return redirect()->route('admin.blogs')
                ->with('success', 'Blog post and associated image deleted successfully.');

        } catch (\Exception $e) {
            // Handle any potential errors during deletion
            return redirect()->route('admin.blogs')
                ->with('error', 'An error occurred while trying to delete the post.');
        }
    }

    public function keyword(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255|unique:blogs,keywords',
            'category_id' => 'required|exists:categories,id', // Validates against the dropdown selection
        ]);

        Blog::create([
            'title' => $request->keyword,
            'slug' => Str::slug($request->keyword).'-'.rand(100, 999),
            'keywords' => $request->keyword,
            'description' => $request->keyword,
            'meta_keywords' => $request->keyword,
            'status' => Blog::DRAFT,
            'content' => 'Placeholder for '.$request->keyword,
            'category_id' => $request->category_id,
            'image_url' => asset('storage/uploads/placeholder.png'),
        ]);

        return redirect()->back()->with('success', 'Keyword created successfully.');
    }

    public function keywords(Request $request)
    {
        // 
        // $request->validate([
        //     'file' => 'required|mimes:csv,txt|max:2048',
        // ]);

        $file = $request->file('file');
        $handle = fopen($file->getRealPath(), 'r');

        $createdCount = 0;
        $skippedCount = 0;

        DB::beginTransaction();

        try {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                // Expecting: row[0] = Category Name, row[1] = Keyword Name
                if (! empty($row[0]) && ! empty($row[1])) {
                    $categoryName = trim($row[0]);
                    $keywordName = trim($row[1]);

                    // 1. Fetch category by name, or create it if it doesn't exist
                    $category = Category::firstOrCreate(
                        ['name' => $categoryName],
                        ['slug' => Str::slug($categoryName)]
                    );

                    // 2. Check if keyword (blog entry) already exists
                    $exists = Blog::where('keywords', $keywordName)->exists();

                    if (! $exists) {
                        Blog::create([
                            'title' => $keywordName,
                            'slug' => Str::slug($keywordName).'-'.rand(1000, 9999),
                            'keywords' => $keywordName,
                            'meta_keywords' => $keywordName,
                            'description' => $keywordName,
                            'status' => Blog::DRAFT,
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
}
