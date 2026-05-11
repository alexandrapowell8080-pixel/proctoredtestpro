@extends('layouts.app')

@section('seo_title', $currentCategory ? $currentCategory->name . ' FAQs | ProctoredTestPro' : 'Frequently Asked
Questions | ProctoredTestPro')
@section('seo_description', $currentCategory ? 'Find answers to common questions about ' . $currentCategory->name . ' in
our comprehensive FAQ section.' : 'Find answers to common questions in our comprehensive FAQ section.')
@section('seo_canonical', $currentCategory ? route('faqs.category', $currentCategory->slug) : route('faqs.index'))

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
        @if($currentCategory)
        ,{
            "@@type": "ListItem",
            "position": 3,
            "name": {!! json_encode($currentCategory->name) !!},
            "item": "{{ \Illuminate\Support\Str::finish(route('faqs.category', $currentCategory->slug), '/') }}"
        }
        @endif
    ]
}
</script>

@if($faqs->count() > 0)
<script type="application/ld+json">
    {
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [
        @foreach($faqs as $index => $faq)
        {
            "@@type": "Question",
            "name": {!! json_encode($faq->title) !!},
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": {!! json_encode(strip_tags($faq->content)) !!}
            }
        }{{ !$loop->last ? ',' : '' }}
        @endforeach
    ]
}
</script>
@endif
@endsection

@section('content')


<div class="pt-[4rem] md:pt-[5rem]">

    <div
        class="border-b border-[hsl(var(--border))] bg-[hsl(var(--background))]/80 backdrop-blur-sm sticky top-[4rem] md:top-[5rem] z-10">
        <div
            class="max-w-6xl mx-auto px-4 py-3 flex flex-wrap items-center gap-2 text-sm text-[hsl(var(--muted-foreground))]">
            <a class="hover:text-[hsl(var(--secondary))] transition-colors" href="{{ route('home') }}">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="w-3.5 h-3.5">
                <path d="m9 18 6-6-6-6"></path>
            </svg>

            @if($currentCategory)
            <a class="hover:text-[hsl(var(--secondary))] transition-colors" href="{{ route('faqs.index') }}">FAQs</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="w-3.5 h-3.5">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            <span class="text-[hsl(var(--foreground))] font-medium">{{ $currentCategory->name }}</span>
            @else
            <span class="text-[hsl(var(--foreground))] font-medium">FAQs</span>
            @endif
        </div>
    </div>


    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 min-h-screen">
        <div class="flex flex-col lg:flex-row gap-8">


            <aside class="lg:w-64 flex-shrink-0">
                <div class="bg-[hsl(var(--card))] border border-[hsl(var(--border))] rounded-2xl p-5 sticky top-32">
                    <h3
                        class="font-bold text-[hsl(var(--foreground))] text-sm mb-4 pb-3 border-b border-[hsl(var(--border))]">
                        Categories</h3>
                    <div class="space-y-1">
                        <a href="{{ route('faqs.index') }}"
                            class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium transition-all text-left {{ $currentCategory === null ? 'bg-[hsl(var(--secondary))] text-[hsl(var(--secondary-foreground))] shadow-sm' : 'text-[hsl(var(--muted-foreground))] hover:bg-[hsl(var(--muted))] hover:text-[hsl(var(--foreground))]' }}">
                            <span>All FAQs</span>
                        </a>

                        @foreach($categories as $cat)
                        <a href="{{ route('faqs.category', [$cat->slug]) }}"
                            class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium transition-all text-left {{ $currentCategory && $currentCategory->id === $cat->id ? 'bg-[hsl(var(--secondary))] text-[hsl(var(--secondary-foreground))] shadow-sm' : 'text-[hsl(var(--muted-foreground))] hover:bg-[hsl(var(--muted))] hover:text-[hsl(var(--foreground))]' }}">
                            <span class="truncate pr-2">{{ $cat->name }}</span>
                            <span
                                class="text-xs px-2 py-0.5 rounded-full font-semibold {{ $currentCategory && $currentCategory->id === $cat->id ? 'bg-white/20 text-white' : 'bg-[hsl(var(--muted))] text-[hsl(var(--muted-foreground))]' }}">
                                {{ $cat->faqs_count ?? 0 }}
                            </span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </aside>

            <main class="flex-1 min-w-0" id="faq-wrapper">


                @if($faqs->total() > 0)
                <p class="text-sm text-[hsl(var(--muted-foreground))] mb-5">
                    Showing <span class="font-medium text-[hsl(var(--foreground))]">{{ $faqs->firstItem() }}–{{
                        $faqs->lastItem() }}</span> of <span class="font-medium text-[hsl(var(--foreground))]">{{
                        $faqs->total() }}</span> questions
                </p>
                @endif

                <div class="space-y-3">
                    @forelse($faqs as $faq)
                    <a class="group flex items-start justify-between gap-4 p-5 bg-[hsl(var(--card))] border border-[hsl(var(--border))] rounded-xl hover:border-[hsl(var(--secondary))] hover:shadow-md transition-all duration-300"
                        href="{{ route('faqs.show', $faq->slug) }}">
                        <div class="flex-1 min-w-0">
                            <h3
                                class="font-bold text-[hsl(var(--foreground))] group-hover:text-[hsl(var(--secondary))] transition-colors text-sm md:text-base leading-snug mb-1.5 break-words">
                                {{ $faq->title }}
                            </h3>
                            <p
                                class="text-[hsl(var(--muted-foreground))] text-sm leading-relaxed overflow-hidden text-ellipsis whitespace-nowrap block">
                                {{ Str::limit($faq->description ?? strip_tags($faq->content), 140) }}
                            </p>

                            {{-- Topic Tag --}}
                            <div class="flex items-center gap-1.5 mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-3.5 h-3.5 text-[hsl(var(--secondary))] opacity-70">
                                    <path
                                        d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z">
                                    </path>
                                    <circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>
                                </svg>
                                <span class="text-xs text-[hsl(var(--secondary))] font-medium opacity-90">
                                    {{ $faq->category->name ?? ($currentCategory->name ?? 'General FAQ') }}
                                </span>
                            </div>
                        </div>

                        {{-- Chevron Arrow --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4 text-[hsl(var(--muted-foreground))] group-hover:text-[hsl(var(--secondary))] flex-shrink-0 mt-1 transform group-hover:translate-x-1 transition-all duration-300">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                    @empty
                    <div
                        class="p-8 text-center border border-dashed border-[hsl(var(--border))] rounded-xl bg-[hsl(var(--card))]">
                        <p class="text-[hsl(var(--muted-foreground))] italic">No FAQs found for this category.</p>
                    </div>
                    @endforelse
                </div>

                @if ($faqs->hasPages())
                <div class="mt-12 flex flex-col sm:flex-row items-center justify-between gap-4">

                    {{-- Previous --}}
                    @if ($faqs->onFirstPage())
                    <span
                        class="px-5 py-2.5 rounded-full bg-[hsl(var(--secondary))] text-[hsl(var(--secondary-foreground))] text-sm font-semibold opacity-50 cursor-not-allowed">
                        Previous
                    </span>
                    @else
                    <button type="button"
                        data-url="{{ $currentCategory !== null ? route('faqs.category', [$currentCategory->slug, $faqs->currentPage() - 1]) : route('faqs.page', $faqs->currentPage() - 1) }}"
                        class="js-paginate-btn btn btn-primary text-sm cursor-pointer">
                        Previous
                    </button>
                    @endif


                    <div class="flex items-center gap-2 flex-wrap justify-center">
                        @foreach (range(1, $faqs->lastPage()) as $page)
                        @if ($page == $faqs->currentPage())
                        <span
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-[hsl(var(--accent))] text-[hsl(var(--accent-foreground))] font-bold shadow-md">
                            {{ $page }}
                        </span>
                        @else
                        <button type="button"
                            data-url="{{ $currentCategory !== null ? route('faqs.category', [$currentCategory->slug, $page]) : route('faqs.page', $page) }}"
                            class="js-paginate-btn w-10 h-10 flex items-center justify-center rounded-full bg-transparent border border-[hsl(var(--border))] text-[hsl(var(--foreground))] hover:border-[hsl(var(--accent))] hover:text-[hsl(var(--accent))] transition-colors font-medium cursor-pointer">
                            {{ $page }}
                        </button>
                        @endif
                        @endforeach
                    </div>

                    {{-- Next --}}
                    @if ($faqs->hasMorePages())
                    <button type="button"
                        data-url="{{ $currentCategory !== null ? route('faqs.category', [$currentCategory->slug, $faqs->currentPage() + 1]) : route('faqs.page', $faqs->currentPage() + 1) }}"
                        class="js-paginate-btn btn btn-primary text-sm cursor-pointer">
                        Next
                    </button>
                    @else
                    <span
                        class="px-5 py-2.5 rounded-full bg-[hsl(var(--secondary))] text-[hsl(var(--secondary-foreground))] text-sm font-semibold opacity-50 cursor-not-allowed">
                        Next
                    </span>
                    @endif

                </div>
                @endif

            </main>
        </div>
    </div>
</div>

<script src="{{ asset('js/page-load.js') }}"></script>
@endsection