<x-blog>
    @section('title', 'ProctoredTestPro - Blogs')
    @section('description', 'Get more knowlegable iwth our resourceful resources')
    @section('keywords', 'ProctoredTestPro,Blogs')
    @section('canonical', config('app.url') . '/blogs')
    @if (session('category_error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Sorry!',
                text: "{{ session('category_error') }}",
                confirmButtonColor: '#FF8080'
            });
        </script>
    @endif
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

                @if (count($blogs) == 0)
                    <div class="max-w-2xl mx-auto py-5 px-6 text-center">
                        <div class="relative inline-block mb-4">
                            <div class="absolute inset-0 bg-[hsl(var(--primary))] opacity-10 blur-2xl rounded-full">
                            </div>
                            <div
                                class="relative w-24 h-24 bg-[hsl(var(--card))] border border-[hsl(var(--border))] rounded-3xl shadow-sm flex items-center justify-center mx-auto rotate-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-12 h-12 text-[hsl(var(--primary))] -rotate-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-3xl font-extrabold text-[hsl(var(--foreground))] tracking-tight mb-4">
                            Our story is just beginning
                        </h2>
                        <p class="text-lg text-[hsl(var(--muted-foreground))] leading-relaxed mb-10 max-w-md mx-auto">
                            We haven't published any articles in this section yet. Check back soon or explore our other
                            categories!
                        </p>

                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="{{ url('/') }}"
                                class="px-8 py-3 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] rounded-full font-bold shadow-lg shadow-[hsl(var(--primary)/0.2)] hover:translate-y-[-2px] transition-all">
                                Return Home
                            </a>
                            <button onclick="window.history.back()"
                                class="px-8 py-3 bg-[hsl(var(--secondary))] text-[hsl(var(--secondary-foreground))] rounded-full font-bold hover:bg-[hsl(var(--muted))] transition-all">
                                Go Back
                            </button>
                        </div>
                    </div>
                @endempty

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
                            <div
                                class="p-5 bg-[hsl(var(--card))]   border-[hsl(var(--border))] rounded-[var(--radius)] hover:shadow-md transition-shadow duration-200">
                                <!-- Category Badge -->
                                <div class="flex items-center gap-2 mb-3">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-[hsl(var(--primary)/0.1)] text-[hsl(var(--primary))] border border-[hsl(var(--primary)/0.2)]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        {{ $blog->category->name }}
                                    </span>
                                </div>

                                <!-- Title -->
                                <h3
                                    class="text-lg font-bold text-[hsl(var(--foreground))] leading-tight line-clamp-2 mb-4 group-hover:text-[hsl(var(--primary))] transition-colors">
                                    {{ $blog->title }}
                                </h3>

                                <!-- Bottom Metadata Container -->
                                <div
                                    class="flex items-center justify-between pt-4 border-t border-[hsl(var(--border))]">
                                    <div class="flex items-center text-[hsl(var(--muted-foreground))] text-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $blog->created_at->format('M d, Y') }}
                                    </div>


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
                    @if (count($categories) == 0)
                        <div class="flex flex-col gap-4 opacity-60">
                            <div class="flex flex-col gap-2 italic">
                                <div class="h-2 bg-[hsl(var(--muted))] w-full rounded animate-pulse"></div>
                                <span class="text-xs text-[hsl(var(--muted-foreground))]">New topics coming
                                    soon...</span>
                            </div>

                            <div class="flex flex-col gap-2 opacity-40 select-none pointer-events-none">
                                <div class="h-2 bg-[hsl(var(--muted))] w-3/4 rounded"></div>
                                <span class="text-xs text-[hsl(var(--muted-foreground))]">Stay tuned</span>
                            </div>
                        </div>
                    @endif
                    <!-- Category Links -->
                    @foreach ($categories as $category)
                        <a href="{{ url('blogs/' . $category->slug) }}">
                            <div class="group flex flex-col gap-2 cursor-pointer">
                                <div
                                    class="h-2 bg-[hsl(var(--secondary))] w-full rounded group-hover:bg-[hsl(var(--accent))] transition-colors">
                                </div>
                                <span class="text-sm font-medium">{{ $category->name }}</span>
                            </div>
                        </a>
                    @endforeach
                </nav>
            </div>
        </aside>

    </div>
</div>


</x-blog>
