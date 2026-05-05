@extends('layouts.app')

@section('seo_title', 'Frequently Asked Questions')
@section('seo_description', 'Find answers to common questions in our comprehensive FAQ section.')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-black mb-8 border-b-2 border-cyan-500 pb-2">
        Frequently Asked Questions
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

        {{-- FAQs --}}
        <main class="md:col-span-3">
            <div class="grid gap-4">
                @forelse($faqs as $faq)
                    <a href="{{ route('faqs.show', $faq->slug) }}"
                       class="block p-5 bg-white border border-gray-200 rounded-lg hover:border-cyan-400 hover:shadow-md transition group">

                        <h2 class="text-xl font-semibold text-cyan-700 group-hover:text-cyan-600 mb-1">
                            {{ $faq->title }}
                        </h2>

                        <p class="text-gray-600 text-sm">
                            {{ Str::limit($faq->description, 140) }}
                        </p>
                    </a>
                @empty
                    <p class="text-gray-500 italic">No FAQs found for this category.</p>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if ($faqs->hasPages())
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-between gap-4">
            
                    {{-- Previous --}}
                    @if ($faqs->onFirstPage())
                        <span class="px-5 py-2 rounded-lg bg-gray-100 text-gray-400">
                            Previous
                        </span>
                    @else
                        <a href="{{ $school 
                            ? route('faqs.school', [$school->slug, $faqs->currentPage() - 1]) 
                            : route('faqs.page', $faqs->currentPage() - 1) 
                        }}"
                           class="px-5 py-2 rounded-lg bg-cyan-600 text-white hover:bg-cyan-700 transition">
                            Previous
                        </a>
                    @endif
            
                    {{-- Page Numbers --}}
                    <div class="flex items-center gap-2 flex-wrap justify-center">
                        @foreach (range(1, $faqs->lastPage()) as $page)
                            @if ($page == $faqs->currentPage())
                                <span class="px-4 py-2 rounded-lg bg-black text-white font-semibold">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $school 
                                    ? route('faqs.school', [$school->slug, $page]) 
                                    : route('faqs.page', $page) 
                                }}"
                                   class="px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-700 hover:border-cyan-500 hover:text-cyan-600 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>
            
                    {{-- Next --}}
                    @if ($faqs->hasMorePages())
                        <a href="{{ $school 
                            ? route('faqs.school', [$school->slug, $faqs->currentPage() + 1]) 
                            : route('faqs.page', $faqs->currentPage() + 1) 
                        }}"
                           class="px-5 py-2 rounded-lg bg-cyan-600 text-white hover:bg-cyan-700 transition">
                            Next
                        </a>
                    @else
                        <span class="px-5 py-2 rounded-lg bg-gray-100 text-gray-400">
                            Next
                        </span>
                    @endif
            
                </div>
            @endif
        </main>

        {{-- Sidebar --}}
        <aside class="md:col-span-1">
            <div class="bg-white border border-gray-200 rounded-lg p-4 sticky top-24">
                <h3 class="text-lg font-bold mb-4">Categories</h3>

                <a href="{{ route('faqs.index') }}"
                   class="block w-full text-left px-4 py-2 rounded-lg mb-2
                   {{ !$school ? 'bg-cyan-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-cyan-50 hover:text-cyan-700' }}">
                    All FAQs
                </a>

                @foreach($schools as $s)
                    <a href="{{ route('faqs.school', [$s->slug]) }}"
                       class="block w-full text-left px-4 py-2 rounded-lg mb-2
                       {{ $school && $school->id === $s->id ? 'bg-cyan-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-cyan-50 hover:text-cyan-700' }}">
                        <span>{{ $s->schoolname }}</span>
                        <span class="text-xs px-2 py-1 rounded-full bg-white/70 text-gray-700">
                            {{ $s->faqs_count }}
                        </span>
                    </a>
                @endforeach
            </div>
        </aside>

    </div>
</div>
@endsection