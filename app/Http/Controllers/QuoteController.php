<?php

namespace App\Http\Controllers;

use App\Mail\NewQuoteRequestMail;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_type' => ['nullable', 'string', 'max:100'],
            'service_label' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255'],
            'country_code' => ['nullable', 'string', 'max:20'],
            'phone' => ['required', 'string', 'max:40'],
            'subject' => ['required', 'string', 'max:255'],
            'platform' => ['nullable', 'string', 'max:255'],
            'exam_date' => ['nullable', 'date'],
            'exam_time' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:5000'],
            'pages' => ['nullable', 'integer', 'min:1', 'max:500'],
            'terms' => ['accepted'],
            'attachment' => ['nullable', 'file', 'max:10240', 'mimes:pdf,doc,docx,jpg,jpeg,png,txt,zip'],
        ]);

        $attachmentPath = null;
        $attachmentOriginalName = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $attachmentPath = $file->store('quote-attachments', 'public');
            $attachmentOriginalName = $file->getClientOriginalName();
        }

        $quote = Quote::create([
            'service_type' => $validated['service_type'] ?? null,
            'service_label' => $validated['service_label'] ?? null,
            'email' => $validated['email'],
            'country_code' => $validated['country_code'] ?? null,
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'platform' => $validated['platform'] ?? null,
            'exam_date' => $validated['exam_date'] ?? null,
            'exam_time' => $validated['exam_time'] ?? null,
            'description' => $validated['description'] ?? null,
            'pages' => $validated['pages'] ?? 1,
            'terms' => true,
            'attachment_path' => $attachmentPath,
            'attachment_original_name' => $attachmentOriginalName,
        ]);

        Mail::to('alexandrapowell8080@gmail.com')->send(new NewQuoteRequestMail($quote));

        return response()->json([
            'success' => true,
            'message' => 'Quote request received successfully.',
            'quote_id' => $quote->id,
        ]);
    }
}
