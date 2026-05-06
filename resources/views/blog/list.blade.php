<x-blog>
    @section('title', 'ProctoredTestPro - Blogs')
    @section('description', 'Get more knowlegable iwth our resourceful resources')
    @section('keywords', 'ProctoredTestPro,Blogs')
    @section('canonical', config('app.url') . '/blogs')
    <!-- Main Wrapper -->
    <div class=" min-h-[60vh]  bg-[hsl(var(--background))] text-[hsl(var(--foreground))] font-sans p-4 md:p-8">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8">

            <!-- Grid Content Area -->
            <main class="flex-1 ">

                <div class="mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-[hsl(var(--primary))] flex items-center gap-3">
                        <!-- Optional: Accent line to match the sidebar style -->
                        <span class="w-1.5 h-8 bg-[hsl(var(--secondary))] rounded-full"></span>
                        Blogs
                    </h2>
                    <div class="mt-2 h-1 w-20 bg-[hsl(var(--accent))] rounded-full"></div>
                </div>

                <!-- 3-Column Grid (Stacks on mobile, 2 cols on tablet, 3 on desktop) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">
                    @foreach ($blogs as $blog)
                        <!-- Card Template (Repeat this for all 9 items) -->
                        <a href="{{ route('blog', ['slug' => $blog->slug]) }}"
                            class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                            <!-- Image Box -->
                            <div
                                class="aspect-[4/3] bg-[hsl(var(--muted))] flex items-center justify-center border-b border-[hsl(var(--border))]">
                                {{-- <span class="text-[hsl(var(--muted-foreground))] font-medium">Image</span> --}}
                                <img src="{{ $blog->image_url }}" alt="">
                            </div>
                            <!-- Title Box -->
                            <div class="p-4 bg-[hsl(var(--card))]">
                                <p class="text-[hsl(var(--primary))] font-semibold">{{ $blog->title }}</p>
                                <div class="h-5 bg-[hsl(var(--muted))] rounded w-3/4 mb-2">{{ $blog->category->name }}
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>



                <!-- Pagination Section -->
                @if (method_exists($blogs, 'hasPages') && $blogs->hasPages())
                    @php
                        $start = max(1, $blogs->currentPage() - 2);
                        $end = min($start + 4, $blogs->lastPage());
                        if ($end - $start < 4) {
                            $start = max(1, $end - 4);
                        }
                    @endphp
                    <div
                        class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-8 border-t border-[hsl(var(--border))]">
                        <a href="{{ $blogs->previousPageUrl() ?? '#' }}"
                            class="w-full sm:w-auto px-6 py-2 rounded-md {{ $blogs->onFirstPage() ? 'bg-[hsl(var(--muted))] text-[hsl(var(--muted-foreground))] cursor-not-allowed' : 'bg-[hsl(var(--muted))] text-[hsl(var(--primary))] hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))]' }} font-medium transition-colors"
                            @if ($blogs->onFirstPage()) aria-disabled="true" @endif>
                            prev
                        </a>

                        <div class="flex items-center gap-2 md:gap-4 overflow-x-auto py-2">
                            @for ($page = $start; $page <= $end; $page++)
                                <a href="{{ $blogs->url($page) }}"
                                    class="px-3 py-1 rounded {{ $page === $blogs->currentPage() ? 'bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))]' : 'hover:bg-[hsl(var(--muted))] text-[hsl(var(--foreground))]' }}">
                                    {{ $page }}
                                </a>
                            @endfor
                            @if ($end < $blogs->lastPage())
                                <span class="px-3 py-1">...</span>
                                <a href="{{ $blogs->url($blogs->lastPage()) }}"
                                    class="px-3 py-1 rounded hover:bg-[hsl(var(--muted))] text-[hsl(var(--foreground))]">
                                    {{ $blogs->lastPage() }}
                                </a>
                            @endif
                        </div>

                        <a href="{{ $blogs->nextPageUrl() ?? '#' }}"
                            class="w-full sm:w-auto px-6 py-2 rounded-md {{ $blogs->hasMorePages() ? 'bg-[hsl(var(--muted))] text-[hsl(var(--primary))] hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))]' : 'bg-[hsl(var(--muted))] text-[hsl(var(--muted-foreground))] cursor-not-allowed' }} font-medium transition-colors"
                            @if (!$blogs->hasMorePages()) aria-disabled="true" @endif>
                            next
                        </a>
                    </div>
                @endif
            </main>

            <!-- Categories Sidebar -->
            <aside class="w-full lg:w-72">
                <div
                    class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] p-6 shadow-sm sticky top-8">
                    <h3
                        class="text-xl font-bold text-[hsl(var(--primary))] mb-6 border-b border-[hsl(var(--border))] pb-2">
                        Categories
                    </h3>
                    <nav class="flex flex-col gap-4">
                        <!-- Category Links -->
                        @foreach ($categories as $category)
                            <div class="group flex flex-col gap-2 cursor-pointer">
                                <div
                                    class="h-2 bg-[hsl(var(--secondary))] w-full rounded group-hover:bg-[hsl(var(--accent))] transition-colors">
                                </div>
                                <span class="text-sm font-medium">{{ $category->name }}</span>
                            </div>
                        @endforeach

                        {{-- <div class="group flex flex-col gap-2 cursor-pointer">
                            <div
                                class="h-2 bg-[hsl(var(--muted))] w-3/4 rounded group-hover:bg-[hsl(var(--secondary))] transition-colors">
                            </div>
                            <span class="text-sm font-medium">Finance & NSE</span>
                        </div>
                        <div class="group flex flex-col gap-2 cursor-pointer">
                            <div
                                class="h-2 bg-[hsl(var(--muted))] w-5/6 rounded group-hover:bg-[hsl(var(--secondary))] transition-colors">
                            </div>
                            <span class="text-sm font-medium">Technical SEO</span>
                        </div>
                        <div class="group flex flex-col gap-2 cursor-pointer">
                            <div
                                class="h-2 bg-[hsl(var(--muted))] w-1/2 rounded group-hover:bg-[hsl(var(--secondary))] transition-colors">
                            </div>
                            <span class="text-sm font-medium">Nursing Exams</span>
                        </div> --}}
                    </nav>
                </div>
            </aside>

        </div>
    </div>


</x-blog>
