<h2>New Quote Request</h2>

<p><strong>Service:</strong> {{ $quote->service_label ?? $quote->service_type }}</p>
<p><strong>Email:</strong> {{ $quote->email }}</p>
<p><strong>Phone:</strong> {{ $quote->country_code }} {{ $quote->phone }}</p>
<p><strong>Subject/Course:</strong> {{ $quote->subject }}</p>
<p><strong>Platform:</strong> {{ $quote->platform ?? 'N/A' }}</p>
<p><strong>Date:</strong> {{ optional($quote->exam_date)->format('Y-m-d') ?? 'N/A' }}</p>
<p><strong>Time:</strong> {{ $quote->exam_time ?? 'N/A' }}</p>
<p><strong>Pages:</strong> {{ $quote->pages }}</p>
<p><strong>Terms Accepted:</strong> {{ $quote->terms ? 'Yes' : 'No' }}</p>

<p><strong>Description:</strong></p>
<p>{{ $quote->description ?? 'N/A' }}</p>

@if ($quote->attachment_original_name)
    <p><strong>Attachment:</strong> {{ $quote->attachment_original_name }}</p>
@endif