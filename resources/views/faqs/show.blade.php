@extends('layouts.app')

@section('seo_title', $faq->title)
@section('seo_description', $faq->description ?? \Illuminate\Support\Str::limit(strip_tags($faq->content), 150))
@section('seo_keywords', is_array($faq->meta_keywords) ? implode(', ', $faq->meta_keywords) : ($faq->meta_keywords ??
''))
@section('seo_canonical', route('faqs.show', $faq->slug))

@section('dynamic_schemas')
<script type="application/ld+json">
    {
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ \Illuminate\Support\Str::finish(url('/'), '/') }}"
        },
        {
            "@@type": "ListItem",
            "position": 2,
            "name": "FAQs",
            "item": "{{ \Illuminate\Support\Str::finish(route('faqs.index'), '/') }}"
        }
        @if($faq->category)
        ,{
            "@@type": "ListItem",
            "position": 3,
            "name": {!! json_encode($faq->category->name) !!},
            "item": "{{ \Illuminate\Support\Str::finish(route('faqs.category', $faq->category->slug), '/') }}"
        }
        @endif
        ,{
            "@@type": "ListItem",
            "position": {{ $faq->category ? 4 : 3 }},
            "name": {!! json_encode($faq->title) !!},
            "item": "{{ \Illuminate\Support\Str::finish(route('faqs.show', $faq->slug), '/') }}"
        }
    ]
}
</script>

<script type="application/ld+json">
    {
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [{
        "@@type": "Question",
        "name": {!! json_encode($faq->title) !!},
        "acceptedAnswer": {
            "@@type": "Answer",
            "text": {!! json_encode(strip_tags($faq->content)) !!}
        }
    }]
}
</script>
@endsection

@section('content')
{{-- Hero Header Section --}}
<div class="bg-[hsl(var(--primary))] pt-24 pb-10 px-4">
    <div class="max-w-5xl mx-auto">

        {{-- Breadcrumbs --}}
        <div class="flex flex-wrap items-center gap-2 text-sm text-[hsl(var(--primary-foreground))]/50 mb-3">
            <a class="hover:text-[hsl(var(--accent))] transition-colors" href="{{ url('/') }}">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-right w-3.5 h-3.5">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            <a class="hover:text-[hsl(var(--accent))] transition-colors" href="{{ route('faqs.index') }}">FAQs</a>


            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-right w-3.5 h-3.5">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            <span class="text-[hsl(var(--primary-foreground))]/80 truncate max-w-[150px] sm:max-w-xs md:max-w-md">{{
                $faq->title }}</span>
        </div>

        <div>
            {{-- Category Tag --}}
            @if($faq->category)
            <div
                class="inline-flex items-center gap-1.5 bg-[hsl(var(--secondary))]/20 text-[hsl(var(--accent))] px-3 py-1 rounded-full text-xs font-medium mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-tag w-3 h-3">
                    <path
                        d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z">
                    </path>
                    <circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>
                </svg>
                {{ $faq->category->name }}
            </div>
            @endif

            <h1
                class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold text-[hsl(var(--primary-foreground))] leading-tight max-w-3xl">
                {{ $faq->title }}
            </h1>
        </div>
    </div>
</div>

{{-- Main Content Section --}}
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-10">

        {{-- Left Article Content --}}
        <article class="flex-1 min-w-0">
            <div class="bg-[hsl(var(--card))] border border-[hsl(var(--border))] rounded-2xl p-6 md:p-8 shadow-sm">
                <div class="text-[hsl(var(--foreground))]/80 leading-relaxed text-base prose max-w-none break-words"
                    style="white-space: pre-wrap;">{{ $faq->content }}</div>
            </div>

            {{-- Previous / Next FAQ Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 mt-8">
                @if($previousFaq)
                <a class="flex-1 group flex items-start gap-4 p-5 bg-[hsl(var(--card))] border border-[hsl(var(--border))] rounded-xl hover:border-[hsl(var(--secondary))]/40 hover:shadow-md transition-all text-left"
                    href="{{ route('faqs.show', $previousFaq->slug) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-left w-5 h-5 text-[hsl(var(--secondary))] mt-0.5 flex-shrink-0 group-hover:-translate-x-0.5 transition-transform">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                    <div>
                        <p class="text-xs text-[hsl(var(--muted-foreground))] mb-1">&larr; Previous FAQ</p>
                        <p
                            class="font-medium text-[hsl(var(--foreground))] text-sm leading-snug group-hover:text-[hsl(var(--secondary))] transition-colors line-clamp-2">
                            {{ $previousFaq->title }}</p>
                    </div>
                </a>
                @else
                <div class="flex-1 hidden sm:block"></div>
                @endif

                @if($nextFaq)
                <a class="flex-1 group flex items-start gap-4 p-5 bg-[hsl(var(--card))] border border-[hsl(var(--border))] rounded-xl hover:border-[hsl(var(--secondary))]/40 hover:shadow-md transition-all text-right justify-end"
                    href="{{ route('faqs.show', $nextFaq->slug) }}">
                    <div>
                        <p class="text-xs text-[hsl(var(--muted-foreground))] mb-1">Next FAQ &rarr;</p>
                        <p
                            class="font-medium text-[hsl(var(--foreground))] text-sm leading-snug group-hover:text-[hsl(var(--secondary))] transition-colors line-clamp-2">
                            {{ $nextFaq->title }}</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-right w-5 h-5 text-[hsl(var(--secondary))] mt-0.5 flex-shrink-0 group-hover:translate-x-0.5 transition-transform">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
                @else
                <div class="flex-1 hidden sm:block"></div>
                @endif
            </div>

            <div class="mt-8 text-center">
                <a class="inline-flex items-center gap-2 text-[hsl(var(--secondary))] hover:text-[hsl(var(--accent))] text-sm font-medium transition-colors"
                    href="{{ $faq->category ? route('faqs.category', $faq->category->slug) : route('faqs.index') }}">
                    &larr; Back to all FAQs
                </a>
            </div>
        </article>

        {{-- Right Sidebar --}}
        <aside class="lg:w-72 flex-shrink-0 space-y-6">

            {{-- Recent FAQs --}}
            <div class="bg-[hsl(var(--card))] border border-[hsl(var(--border))] rounded-2xl p-6 shadow-sm">
                <h3
                    class="font-heading font-semibold text-[hsl(var(--foreground))] text-sm mb-4 pb-3 border-b border-[hsl(var(--border))]">
                    Recent FAQs</h3>
                <div class="space-y-3">
                    @forelse($recent as $item)
                    <a class="group flex items-start gap-2 text-sm text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--secondary))] transition-colors"
                        href="{{ route('faqs.show', is_object($item) ? $item->slug : $item) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-arrow-right w-3.5 h-3.5 mt-0.5 flex-shrink-0 opacity-50 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                        <span class="leading-snug">{{ is_object($item) ? $item->title : $item }}</span>
                    </a>
                    @empty
                    <span class="text-[hsl(var(--muted-foreground))] text-sm italic">No other FAQs yet.</span>
                    @endforelse
                </div>
            </div>

            {{-- More in Category --}}
            @if($faq->category && isset($faq->category->faqs))
            @php
            $relatedFaqs = $faq->category->faqs->where('id', '!=', $faq->id)->take(5);
            @endphp
            @if($relatedFaqs->count() > 0)
            <div
                class="bg-[hsl(var(--secondary))]/5 border border-[hsl(var(--secondary))]/20 rounded-2xl p-6 shadow-sm">
                <h3
                    class="font-heading font-semibold text-[hsl(var(--foreground))] text-sm mb-4 pb-3 border-b border-[hsl(var(--secondary))]/15">
                    More in "{{ $faq->category->name }}"</h3>
                <div class="space-y-3">
                    @foreach($relatedFaqs as $related)
                    <a class="group flex items-start gap-2 text-sm text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--secondary))] transition-colors"
                        href="{{ route('faqs.show', $related->slug) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-arrow-right w-3.5 h-3.5 mt-0.5 flex-shrink-0 opacity-50 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                        <span class="leading-snug">{{ $related->title }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
            @endif

            {{-- Support Call to Action --}}
            <div data-nosnippet class="bg-[hsl(var(--primary))] rounded-2xl p-6 text-center shadow-md">
                <h3 class="font-heading font-semibold text-[hsl(var(--primary-foreground))] text-sm mb-2">Still have
                    questions?</h3>
                <p class="text-[hsl(var(--primary-foreground))]/60 text-xs mb-4 leading-relaxed">Our experts are ready
                    to help you ace your next exam.</p>
                <a href="{{ url('/#hero-form') }}"
                    class="inline-block bg-[hsl(var(--secondary))] hover:opacity-90 text-[hsl(var(--primary-foreground))] text-xs font-bold px-5 py-2.5 rounded-xl transition-all w-full shadow-sm hover:shadow-md">Get
                    Free Quote</a>
            </div>

        </aside>

    </div>
</div>
@endsection