<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Category;

class FaqController extends Controller
{
    public function index($categorySlug = null, $page = 1)
    {
        // Handle pagination without category
        if (request()->routeIs('faqs.page') && $categorySlug) {
            $page = $categorySlug;
            $categorySlug = null;
        }

        // Fetch categories that actually have published FAQs
        $categories = Category::withCount(['faqs' => function ($query) {
                $query->published();
            }])
            ->having('faqs_count', '>', 0)
            ->get();

        $currentCategory = null;

        // If a category slug is passed, fetch it
        if ($categorySlug) {
            $currentCategory = Category::where('slug', $categorySlug)->firstOrFail();
        }

        // Fetch FAQs, optionally filtering by the selected category's ID
        $faqs = Faq::published()
            ->when($currentCategory, function ($query) use ($currentCategory) {
                $query->where('category_id', $currentCategory->id);
            })
            ->latest()
            ->paginate(15, ['*'], 'page', $page);

        return view('faqs.index', [
            'faqs' => $faqs,
            'categories' => $categories,
            'currentCategory' => $currentCategory,
        ]);
    }

    public function show($slug)
    {
        // Eager load the category to prevent N+1 issues in the view
        $faq = Faq::published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $previousFaq = Faq::published()
            ->where('id', '<', $faq->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextFaq = Faq::published()
            ->where('id', '>', $faq->id)
            ->orderBy('id', 'asc')
            ->first();

        $recent = Faq::published()
            ->where('id', '!=', $faq->id)
            ->latest()
            ->limit(5)
            ->get();

        return view('faqs.show', compact(
            'faq',
            'recent',
            'previousFaq',
            'nextFaq'
        ));
    }
}