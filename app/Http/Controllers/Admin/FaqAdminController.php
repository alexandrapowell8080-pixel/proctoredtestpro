<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FaqAdminController extends Controller
{
    
    public function index(Request $request)
    {
        $stats = [
            'total' => Faq::count(),
            'pending' => Faq::pending()->count(),
            'published' => Faq::published()->count(),
        ];

        $categories = Category::orderBy('name')->get(); 
        
        $query = Faq::query();
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where('keyword', 'like', $searchTerm)
                  ->orWhere('content', 'like', $searchTerm);
        }
        $faqs = $query->latest()->paginate(15)->appends($request->query());

        return view('admin.faqs.index', compact('stats', 'categories', 'faqs')); 
    }

    public function import(Request $request) 
    { 
        $request->validate([ 'category_id' => 'required|exists:categories,id', ]); 
        
        if (!isset($_FILES['keywords_file']) || $_FILES['keywords_file']['error'] !== UPLOAD_ERR_OK) { 
            return back()->withErrors(['upload' => 'No file uploaded or upload failed.']); 
        } 
        
        $categoryId = $request->category_id; 
        $tmpFile = $_FILES['keywords_file']['tmp_name']; 
        $originalName = $_FILES['keywords_file']['name']; 
        
        try { 
            $content = file_get_contents($tmpFile); 
            if ($content === false) {
                return back()->withErrors(['upload' => 'Could not read uploaded file.']); 
            } 
            
            $lines = explode("\n", $content); 
            $imported = 0; 
            $skipped = 0; 
            $duplicates = []; 
            
            foreach ($lines as $line) { 
                $keyword = trim($line); 
                if (empty($keyword)) 
                    continue; 
                    
                if (\App\Models\Faq::where('keyword', $keyword) 
                    ->where('category_id', $categoryId) 
                    ->exists()) { 
                        $skipped++; 
                        $duplicates[] = $keyword; 
                        continue; 
                } 
                
                \App\Models\Faq::create([
                    'keyword' => $keyword,
                    'category_id' => $categoryId,
                    'title' => null,
                    'slug' => null,
                    'description' => null,
                    'content' => null,
                    'meta_keywords' => null,
                ]);
                $imported++; 
            } 
            
            return back()->with([ 
                'success' => true, 
                'imported' => $imported, 
                'skipped' => $skipped, 
                'duplicates' => array_slice($duplicates, 0, 10), 
            ]); 
        } 
        catch (\Exception $e) { 
            return back()->withErrors(['upload' => 'Import failed: ' . $e->getMessage()]); 
        } 
    }

    public function generate(Request $request)
    {
        $limit = (int) $request->input('limit', 5);
        $pending = Faq::pending()->limit($limit)->count();

        if ($pending === 0) {
            return back()->with('info', 'No pending FAQs to generate.');
        }

        \Illuminate\Support\Facades\Artisan::call('faqs:generate', [
            '--limit' => $limit
        ]);

        $output = \Illuminate\Support\Facades\Artisan::output();

        return back()->with([
            'success' => true,
            'message' => "✅ Generated {$pending} FAQs!",
            'log' => $output,
        ]);
    }

    /**
     * Delete a keyword
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return back()->with('success_delete', "Deleted: {$faq->keyword}");
    }

    public function store(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Faq::create([
            'keyword' => $request->keyword,
            'category_id' => $request->category_id,
            'title' => null,
            'slug' => null,
            'content' => null,
        ]);

        return back()->with('success', true)->with('imported', 1)->with('skipped', 0);
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $categories = Category::orderBy('name')->get();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'keyword' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $slug = $faq->slug;
        if ($request->filled('title') && $request->title !== $faq->title) {
            $slug = Str::slug($request->title);
        }

        $faq->update([
            'keyword' => $request->keyword,
            'title' => $request->title,
            'content' => $request->input('content'), 
            'category_id' => $request->category_id,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.faqs.index')->with('queued', 'FAQ successfully updated.');
    }
}