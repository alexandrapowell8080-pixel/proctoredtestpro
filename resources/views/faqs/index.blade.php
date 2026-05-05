@extends('layouts.app')

@section('seo_title', 'Frequently Asked Questions')
@section('seo_description', 'Find answers to common questions in our comprehensive FAQ section.')

@section('content')
{{-- Fixed wrapper: added max-w-7xl, mx-auto for centering, and px-4/lg:px-8 for guaranteed side gaps --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-12 min-h-screen">
    <h1
        class="text-3xl md:text-4xl font-extrabold text-[hsl(var(--foreground))] mb-8 border-b-2 border-[hsl(var(--accent))] pb-3 inline-block">
        Frequently Asked Questions
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 lg:gap-12">

        {{-- FAQs --}}
        <main class="lg:col-span-3">
            <div class="grid gap-4">
                @forelse($faqs as $faq)
                <a href="{{ route('faqs.show', $faq->slug) }}"
                    class="block p-5 md:p-6 bg-[hsl(var(--card))] border border-[hsl(var(--border))] rounded-xl hover:border-[hsl(var(--accent))] hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">

                    <h2
                        class="text-lg md:text-xl font-bold text-[hsl(var(--foreground))] group-hover:text-[hsl(var(--accent))] mb-2 transition-colors break-words">
                        {{ $faq->title }}
                    </h2>

                    <p class="text-[hsl(var(--muted-foreground))] text-sm md:text-base leading-relaxed break-words">
                        {{ Str::limit($faq->description, 140) }}
                    </p>
                </a>
                @empty
                <div class="p-8 text-center border border-dashed border-[hsl(var(--border))] rounded-xl">
                    <p class="text-[hsl(var(--muted-foreground))] italic">No FAQs found for this category.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if ($faqs->hasPages())
            <div class="mt-12 flex flex-col sm:flex-row items-center justify-between gap-4">

                {{-- Previous --}}
                @if ($faqs->onFirstPage())
                <span
                    class="px-5 py-2.5 rounded-full bg-[hsl(var(--secondary))] text-[hsl(var(--muted-foreground))] text-sm font-semibold opacity-70 cursor-not-allowed">
                    Previous
                </span>
                @else
                <a href="{{ $currentCategory !== null 
                            ? route('faqs.category', [$currentCategory->slug, $faqs->currentPage() - 1]) 
                            : route('faqs.page', $faqs->currentPage() - 1) 
                        }}" class="btn btn-primary text-sm">
                    Previous
                </a>
                @endif

                {{-- Page Numbers --}}
                <div class="flex items-center gap-2 flex-wrap justify-center">
                    @foreach (range(1, $faqs->lastPage()) as $page)
                    @if ($page == $faqs->currentPage())
                    <span
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-[hsl(var(--accent))] text-[hsl(var(--accent-foreground))] font-bold shadow-md">
                        {{ $page }}
                    </span>
                    @else
                    <a href="{{ $currentCategory !== null 
                                    ? route('faqs.category', [$currentCategory->slug, $page]) 
                                    : route('faqs.page', $page) 
                                }}"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-transparent border border-[hsl(var(--border))] text-[hsl(var(--foreground))] hover:border-[hsl(var(--accent))] hover:text-[hsl(var(--accent))] transition-colors font-medium">
                        {{ $page }}
                    </a>
                    @endif
                    @endforeach
                </div>

                {{-- Next --}}
                @if ($faqs->hasMorePages())
                <a href="{{ $currentCategory !== null  
                            ? route('faqs.category', [$currentCategory->slug, $faqs->currentPage() + 1]) 
                            : route('faqs.page', $faqs->currentPage() + 1) 
                        }}" class="btn btn-primary text-sm">
                    Next
                </a>
                @else
                <span
                    class="px-5 py-2.5 rounded-full bg-[hsl(var(--secondary))] text-[hsl(var(--muted-foreground))] text-sm font-semibold opacity-70 cursor-not-allowed">
                    Next
                </span>
                @endif

            </div>
            @endif
        </main>

        {{-- Sidebar (No Background Color) --}}
        <aside class="lg:col-span-1">
            <div class="sticky top-28 p-2">
                <h3
                    class="text-xl font-bold mb-4 text-[hsl(var(--foreground))] border-b border-[hsl(var(--border))] pb-2">
                    Categories</h3>

                <div class="flex flex-col gap-1">
                    <a href="{{ route('faqs.index') }}"
                        class="block w-full text-left px-4 py-2.5 rounded-lg text-sm font-medium transition-all
                        {{ $currentCategory === null ? 'bg-[hsl(var(--accent))] text-[hsl(var(--accent-foreground))] shadow-md' : 'text-[hsl(var(--muted-foreground))] hover:bg-[hsl(var(--accent)/0.1)] hover:text-[hsl(var(--accent))]' }}">
                        All FAQs
                    </a>

                    @foreach($categories as $cat)
                    <a href="{{ route('faqs.category', [$cat->slug]) }}"
                        class="flex justify-between items-center w-full text-left px-4 py-2.5 rounded-lg text-sm font-medium transition-all
                            {{ $currentCategory && $currentCategory->id === $cat->id ? 'bg-[hsl(var(--accent))] text-[hsl(var(--accent-foreground))] shadow-md' : 'text-[hsl(var(--muted-foreground))] hover:bg-[hsl(var(--accent)/0.1)] hover:text-[hsl(var(--accent))]' }}">
                        <span class="truncate pr-2">{{ $cat->name }}</span>
                        <span
                            class="text-xs px-2 py-0.5 rounded-full font-bold {{ $currentCategory && $currentCategory->id === $cat->id ? 'bg-white/20 text-white' : 'bg-[hsl(var(--secondary))] text-[hsl(var(--muted-foreground))]' }}">
                            {{ $cat->faqs_count }}
                        </span>
                    </a>
                    @endforeach
                </div>
            </div>
        </aside>

    </div>
</div>
@endsection