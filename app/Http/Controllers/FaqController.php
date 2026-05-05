<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Exam;
use App\Models\School;

class FaqController extends Controller
{

    public function index($school = null, $page = 1)
    {
        if (is_numeric($school)) {
            $page = $school;
            $school = null;
        }
    
        $schools = School::withCount(['courses as faqs_count' => function ($query) {
                $query->join('faqs', 'faqs.course_id', '=', 'courses.id')
                      ->whereNotNull('faqs.title')
                      ->where('faqs.title', '!=', '');
            }])
            ->orderBy('schoolname')
            ->get();
    
        $selectedSchool = null;
    
        if ($school) {
            $selectedSchool = School::where('slug', $school)->firstOrFail();
        }
    
        $faqs = Faq::published()
            ->with('course.school')
            ->when($selectedSchool, function ($query) use ($selectedSchool) {
                $query->whereHas('course', function ($q) use ($selectedSchool) {
                    $q->where('school_id', $selectedSchool->id);
                });
            })
            ->latest()
            ->paginate(15, ['*'], 'page', $page);
    
        return view('faqs.index', [
            'faqs' => $faqs,
            'schools' => $schools,
            'school' => $selectedSchool,
        ]);
    }
    public function show($slug)
    {
        $faq = Faq::published()
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
    
        $testbanks = collect();
    
        if ($faq->course_id) {
            $testbanks = Exam::where('course_id', $faq->course_id)

                ->limit(7)
                ->get();
        }
    
        return view('faqs.show', compact(
            'faq',
            'recent',
            'previousFaq',
            'nextFaq',
            'testbanks'
        ));
    }
    // public function Exam()
    // {
    //   return view('faqs.index', compact('faqs'));
    // }
    
}