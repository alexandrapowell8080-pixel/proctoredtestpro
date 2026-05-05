@extends('layouts.app')

@section('seo_title', $faq->title)
@section('seo_description', $faq->description)
@section('seo_keywords', implode(', ', $faq->meta_keywords ?? []))

 
@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 lg:py-12">
    <nav class="flex items-center text-sm text-gray-500 mb-6">
        <a href="{{ route('faqs.index') }}" class="hover:text-cyan-600">FAQs</a>
        <span class="mx-2">/</span>
        <span class="text-black">{{ $faq->title }}</span>
    </nav>
    

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <article class="lg:col-span-2 bg-white p-8 rounded-xl border border-gray-200">
            <h1 class="text-3xl font-bold text-black mb-6">{{ $faq->title }}</h1>
            <div class="text-gray-900 text-base leading-relaxed mb-8" style="white-space: pre-wrap;">
                {{ $faq->content }}
            </div>
        <div class="mt-10 pt-6 border-t border-gray-100">

    {{-- Previous / Next FAQ Buttons --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">

        @if($previousFaq)
            <a href="{{ route('faqs.show', $previousFaq->slug) }}"
               class="group p-4 rounded-xl border border-gray-200 bg-white hover:border-cyan-500 hover:shadow-md transition">
                <span class="block text-sm text-gray-500 mb-1">
                    &larr; Previous FAQ
                </span>
                <span class="block font-semibold text-gray-900 group-hover:text-cyan-700">
                    {{ Str::limit($previousFaq->title, 60) }}
                </span>
            </a>
        @else
            <div class="p-4 rounded-xl border border-gray-100 bg-gray-50 text-gray-400">
                <span class="block text-sm mb-1">&larr; Previous FAQ</span>
                <span class="block font-semibold">No previous FAQ</span>
            </div>
        @endif

        @if($nextFaq)
            <a href="{{ route('faqs.show', $nextFaq->slug) }}"
               class="group p-4 rounded-xl border border-gray-200 bg-white hover:border-cyan-500 hover:shadow-md transition text-left sm:text-right">
                <span class="block text-sm text-gray-500 mb-1">
                    Next FAQ &rarr;
                </span>
                <span class="block font-semibold text-gray-900 group-hover:text-cyan-700">
                    {{ Str::limit($nextFaq->title, 60) }}
                </span>
            </a>
        @else
            <div class="p-4 rounded-xl border border-gray-100 bg-gray-50 text-gray-400 text-left sm:text-right">
                <span class="block text-sm mb-1">Next FAQ &rarr;</span>
                <span class="block font-semibold">No next FAQ</span>
            </div>
        @endif

    </div>

    {{-- Centered Back Button --}}
    <div class="flex justify-center">
        <a href="{{ route('faqs.index') }}"
           class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-black text-white font-semibold hover:bg-cyan-700 transition shadow-sm">
            Back to FAQs
        </a>
    </div>

</div>
        </article>

        {{-- Sidebar --}}
        <aside>
            <div class="sticky top-8 space-y-6">
            <div class="bg-black text-white p-5 rounded-xl ">
                <h3 class="text-lg font-semibold mb-4 border-b border-cyan-500 pb-2">Recent FAQs</h3>
                <ul class="space-y-2">
                    @forelse($recent as $item)
                        <li>
                            <a href="{{ route('faqs.show', is_object($item) ? $item->slug : $item) }}" 
                            class="text-cyan-400 hover:text-cyan-300 text-sm block py-1">
                                {{ is_object($item) ? $item->title : $item }}
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-400 text-sm">No other FAQs yet.</li>
                    @endforelse
                </ul>
            </div>
            @if($testbanks->count())
                <div class="bg-white text-black p-5 rounded-xl border border-gray-200 mt-6 ">
                    <h3 class="text-lg font-semibold mb-4 border-b border-cyan-500 pb-2">
                        Related Testbanks
                    </h3>
            
                    <ul class="space-y-2">
                        @foreach($testbanks as $exam)
                            <li>
                                <a href="{{ route('library.exam', $exam->slug) }}"
                                   class="block text-sm text-cyan-700 hover:text-cyan-900 hover:underline">
                                    {{ $exam->examname }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
        </aside>
    </div>
</div>
@endsection