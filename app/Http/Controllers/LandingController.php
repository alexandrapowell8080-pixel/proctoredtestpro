<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $pageData = [
            'title' => 'Bypass Proctored Exam | 100% Success Rate | ProctoredTestPro',
            'metaDescription' => 'Bypass any proctored exam with 100% success. Undetectable, fast, grade guaranteed. Expert help for ProctorU, Examity, Respondus & more. Get started now!',
            'keywords' => 'proctored exam, bypass proctoring, online exam help, proctored test pro, exam assistance, undetectable proctoring',
            'canonical' => url('/'),
            'ogImage' => 'https://media.base44.com/images/public/user_69b25eda19bae29c39e9c756/5255585c1_WhatsAppImage2026-05-05at114417AM.jpeg',
        ];

        return view('landing.index', compact('pageData'));
    }

    public function submitQuote(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'description' => 'nullable',
            'service_type' => 'required|in:proctored,classes,assignments',
        ]);

        $quoteRequest = QuoteRequest::create($validated);

        return response()->json(['success' => true, 'id' => $quoteRequest->id]);
    }
}
