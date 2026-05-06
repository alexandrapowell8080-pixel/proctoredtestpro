<x-blog>
    @section('title', $blog->title)
    @section('description', $blog->description)
    @section('keywords', $blog->meta_keywords)
    @section('canonical', config('app.url') . '/blog/' . $blog->slug)
    <div class="min-h-screen bg-[hsl(var(--background))] text-[hsl(var(--foreground))] font-sans p-4 md:p-8">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8">

            <!-- Main Content Area -->
            <main
                class="flex-1 bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] p-6 shadow-sm">
                <nav class="flex mb-6 text-sm font-medium" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <!-- Back to Blog Link -->
                        <li class="inline-flex items-center">
                            <a href="/blogs"
                                class="inline-flex items-center text-[hsl(var(--muted-foreground))]  transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 000 1.414l7 7a1 1 0 001.414-1.414L5.414 11H17a1 1 0 100-2H5.414l5.293-5.293a1 1 0 000-1.414z">
                                    </path>
                                </svg>
                                Blogs
                            </a>
                        </li>

                        <!-- Current Blog Title (Breadcrumb Trail) -->
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-[hsl(var(--border))]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span
                                    class="ml-1 md:ml-2 text-[hsl(var(--primary))] font-semibold truncate max-w-[150px] md:max-w-md">
                                    {{ $blog->title }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-[hsl(var(--primary))] mb-6">
                    {{ $blog->title }}
                </h1>


                <!-- Main Content Container -->
                <div class="mb-10 text-lg leading-relaxed text-[hsl(var(--card-foreground))] overflow-hidden">

                    <!-- Floated Image Section -->
                    <div class="float-right ml-6 mb-4 w-full md:w-1/2">
                        <div
                            class="aspect-video bg-[hsl(var(--muted))] rounded-lg overflow-hidden border border-[hsl(var(--border))] shadow-sm">
                            <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}"
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="prose prose-slate max-w-none">
                        {!! $blog->content !!}
                    </div>

                    {{-- <!-- Fallback/Placeholder lines if description is short -->
                    <div class="mt-4 space-y-4">
                        <div class="h-4 bg-[hsl(var(--muted))] rounded w-full"></div>
                        <div class="h-4 bg-[hsl(var(--muted))] rounded w-full"></div>
                        <div class="h-4 bg-[hsl(var(--muted))] rounded w-3/4"></div>
                    </div> --}}
                </div>

                <!-- Clearfix to ensure navigation doesn't jump up into the float -->
                <div class="clear-both"></div>

                <!-- Navigation: Prev & Next -->
                <div class="flex flex-col sm:flex-row justify-between gap-4 pt-6 border-t border-[hsl(var(--border))]">
                    <a href="{{ route('blog', ['slug' => $related_blogs->last()->slug]) }}"
                        class="px-6 py-3 rounded-md bg-[hsl(var(--muted))] text-[hsl(var(--primary))] font-medium hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))] transition-colors">
                        ← Previous
                    </a>
                    <a href="{{ route('blog', ['slug' => $related_blogs[1]->slug]) }}"
                        class="px-6 py-3 rounded-md bg-[hsl(var(--secondary))] text-[hsl(var(--secondary-foreground))] font-medium hover:opacity-90 transition-opacity">
                        Next →
                    </a>
                </div>
            </main>

            <!-- Sidebar Area -->
            <aside class="w-full lg:w-80 flex flex-col gap-6">

                <!-- Related Blogs Card -->
                <div
                    class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] p-5 shadow-sm">
                    <h3 class="font-bold text-[hsl(var(--primary))] mb-4 border-b border-[hsl(var(--border))] pb-2">
                        Related Blogs</h3>
                    <div class="space-y-4">
                        @foreach ($related_blogs as $related_blog)
                            <a href="{{ route('blog', ['slug' => $related_blog->slug]) }}">
                                <div class="max-h-20 pr-2 mb-5 bg-[hsl(var(--muted))] rounded-md font-bold">
                                    {{ $related_blog->title }}</div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Random Blog/Promo Card -->
                <a href="{{ route('blog', ['slug' => $related_blogs->first()->slug]) }}">
                    <div
                        class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] p-5 shadow-sm">
                        <h3 class="font-bold text-[hsl(var(--primary))] mb-4 border-b border-[hsl(var(--border))] pb-2">
                            Featured Blog</h3>
                        <div
                            class="aspect-square bg-[hsl(var(--muted))] rounded-md mb-3 flex items-center justify-center">
                            {{-- <span class="text-xs text-[hsl(var(--muted-foreground))]">Featured Thumbnail</span> --}}
                            <img src="{{ $related_blogs->first()->image_url }}" alt="">
                        </div>
                        <div class="h-fit font-bold truncate rounded w-full mb-2">{{ $related_blogs->first()->title }}
                        </div>
                        <div class="h-4 text-sm rounded w-2/3">{{ $related_blogs->first()->category->name }}</div>
                    </div>
                </a>
            </aside>

        </div>
    </div>
</x-blog>
