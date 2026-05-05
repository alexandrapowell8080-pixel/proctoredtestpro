<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Controllers\LibraryController;

class FaqAdminController extends Controller
{
    /**
     * Show upload form
     */
    public function index()
    {
        $stats = [
            'total' => Faq::count(),
            'pending' => Faq::pending()->count(),
            'published' => Faq::published()->count(),
            'recent' => Faq::latest()->limit(10)->get(['id','keyword', 'title', 'content', 'created_at']),
        ];

       $categories = Category::orderBy('name')->get(); 
       
       return view('admin.faqs.index', compact('stats', 'categories')); 
        
    }

    /**
     * Handle CSV upload
     */
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

    /**
     * Manually trigger generation (optional)
     */
    public function generate(Request $request)
    {
        $limit = (int) $request->input('limit', 5);
        $pending = Faq::pending()->limit($limit)->count();

        if ($pending === 0) {
            return back()->with('info', 'No pending FAQs to generate.');
        }

        //  THIS LINE ACTUALLY TRIGGERS GENERATION
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
}