<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Services\AIFaqGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FaqGeneratorController extends Controller
{
    public function __construct(protected AIFaqGenerator $ai) {}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'keyword' => 'required|string|max:100'
        ]);

        try {
            $data = $this->ai->generate($validated['keyword']);

            // Handle slug collisions cleanly
            $baseSlug = $data['slug'];
            $slug = $baseSlug;
            $i = 1;
            while (Faq::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $i++;
            }
            $data['slug'] = $slug;

            Faq::create($data);

            return back()->with('success', '✅ FAQ generated and saved successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['ai_error' => $e->getMessage()])->withInput();
        }
    }
}