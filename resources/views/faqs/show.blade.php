@extends('layouts.app')

@section('seo_title', $faq->title)
@section('seo_description', $faq->description)
@section('seo_keywords', implode(', ', $faq->meta_keywords ?? []))

@section('content')
{{-- Fixed wrapper: added max-w-6xl (slightly narrower for readability), mx-auto, and px-4/lg:px-8 --}}
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-12 min-h-screen">

    {{-- Breadcrumbs --}}
    <nav class="flex flex-wrap items-center text-xs md:text-sm text-[hsl(var(--muted-foreground))] mb-6 gap-2">
        <a href="{{ route('faqs.index') }}"
            class="hover:text-[hsl(var(--accent))] transition-colors font-medium">FAQs</a>

        @if($faq->category)
        <span class="opacity-50">/</span>
        <a href="{{ route('faqs.category', $faq->category->slug) }}"
            class="hover:text-[hsl(var(--accent))] transition-colors font-medium whitespace-nowrap">
            {{ $faq->category->name }}
        </a>
        @endif

        <span class="opacity-50">/</span>
        <span class="text-[hsl(var(--foreground))] font-semibold truncate max-w-[150px] sm:max-w-xs md:max-w-sm">{{
            $faq->title }}</span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 lg:gap-12">

        {{-- Main FAQ Content --}}
        <article
            class="lg:col-span-3 bg-[hsl(var(--card))] p-6 md:p-10 rounded-2xl border border-[hsl(var(--border))] shadow-sm">
            <h1
                class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-[hsl(var(--foreground))] mb-6 leading-tight break-words">
                {{ $faq->title }}
            </h1>

            <div class="prose max-w-none text-[hsl(var(--foreground))] text-sm md:text-base leading-loose mb-10 break-words"
                style="white-space: pre-wrap;">{{ $faq->content }}</div>

            <div class="mt-12 pt-8 border-t border-[hsl(var(--border))]">

                {{-- Previous / Next FAQ Buttons --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">

                    @if($previousFaq)
                    <a href="{{ route('faqs.show', $previousFaq->slug) }}"
                        class="group p-5 rounded-xl border border-[hsl(var(--border))] bg-transparent hover:border-[hsl(var(--accent))] hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                        <span
                            class="block text-xs uppercase tracking-wider font-bold text-[hsl(var(--muted-foreground))] mb-2">
                            &larr; Previous FAQ
                        </span>
                        <span
                            class="block font-bold text-[hsl(var(--foreground))] group-hover:text-[hsl(var(--accent))] transition-colors break-words line-clamp-2">
                            {{ $previousFaq->title }}
                        </span>
                    </a>
                    @else
                    <div
                        class="p-5 rounded-xl border border-[hsl(var(--border))] bg-[hsl(var(--secondary))] opacity-60">
                        <span
                            class="block text-xs uppercase tracking-wider font-bold text-[hsl(var(--muted-foreground))] mb-2">&larr;
                            Previous FAQ</span>
                        <span class="block font-bold text-[hsl(var(--muted-foreground))]">No previous FAQ</span>
                    </div>
                    @endif

                    @if($nextFaq)
                    <a href="{{ route('faqs.show', $nextFaq->slug) }}"
                        class="group p-5 rounded-xl border border-[hsl(var(--border))] bg-transparent hover:border-[hsl(var(--accent))] hover:-translate-y-1 hover:shadow-md transition-all duration-300 text-left sm:text-right">
                        <span
                            class="block text-xs uppercase tracking-wider font-bold text-[hsl(var(--muted-foreground))] mb-2">
                            Next FAQ &rarr;
                        </span>
                        <span
                            class="block font-bold text-[hsl(var(--foreground))] group-hover:text-[hsl(var(--accent))] transition-colors break-words line-clamp-2">
                            {{ $nextFaq->title }}
                        </span>
                    </a>
                    @else
                    <div
                        class="p-5 rounded-xl border border-[hsl(var(--border))] bg-[hsl(var(--secondary))] opacity-60 text-left sm:text-right">
                        <span
                            class="block text-xs uppercase tracking-wider font-bold text-[hsl(var(--muted-foreground))] mb-2">Next
                            FAQ &rarr;</span>
                        <span class="block font-bold text-[hsl(var(--muted-foreground))]">No next FAQ</span>
                    </div>
                    @endif

                </div>

                {{-- Centered Back Button using your existing CSS class --}}
                <div class="flex justify-center">
                    <a href="{{ $faq->category ? route('faqs.category', $faq->category->slug) : route('faqs.index') }}"
                        class="btn btn-primary px-8 py-3 rounded-full shadow-lg">
                        Back to FAQs
                    </a>
                </div>

            </div>
        </article>

        {{-- Sidebar (No Background Color) --}}
        <aside class="lg:col-span-1">
            <div class="sticky top-28 p-2">
                <h3
                    class="text-xl font-bold mb-4 text-[hsl(var(--foreground))] border-b border-[hsl(var(--border))] pb-2">
                    Recent FAQs</h3>

                <ul class="space-y-3 mt-4">
                    @forelse($recent as $item)
                    <li>
                        <a href="{{ route('faqs.show', is_object($item) ? $item->slug : $item) }}"
                            class="text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--accent))] text-sm md:text-base font-medium block transition-colors leading-snug break-words">
                            {{ is_object($item) ? $item->title : $item }}
                        </a>
                    </li>
                    @empty
                    <li class="text-[hsl(var(--muted-foreground))] text-sm italic">No other FAQs yet.</li>
                    @endforelse
                </ul>
            </div>
        </aside>

    </div>
</div>
@endsection