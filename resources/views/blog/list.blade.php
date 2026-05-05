<x-blog>

    <!-- Main Wrapper -->
    <div class="min-h-screen  bg-[hsl(var(--background))] text-[hsl(var(--foreground))] font-sans p-4 md:p-8">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8">

            <!-- Grid Content Area -->
            <main class="flex-1 max-h-scree overflow-y-scroll">
                <!-- 3-Column Grid (Stacks on mobile, 2 cols on tablet, 3 on desktop) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">
                    @foreach ($blogs as $blog )
                       <!-- Card Template (Repeat this for all 9 items) -->
                    <a href="{{ route('blog',['slug'=> $blog->slug]) }}"
                        class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <!-- Image Box -->
                        <div
                            class="aspect-[4/3] bg-[hsl(var(--muted))] flex items-center justify-center border-b border-[hsl(var(--border))]">
                            <span class="text-[hsl(var(--muted-foreground))] font-medium">Image</span>
                        </div>
                        <!-- Title Box -->
                        <div class="p-4 bg-[hsl(var(--card))]">
                            {{-- <div class="h-5 bg-[hsl(var(--muted))] rounded w-3/4 mb-2"></div> --}}
                            <p class="text-[hsl(var(--primary))] font-semibold">{{ $blog->title }}</p>
                        </div>
                    </a> 
                    @endforeach
                    

                    <!-- Repeated Cards (Simplified for code brevity) -->
                    <!-- Card 2 -->
                    <div
                        class="bg-[hsl(var(--card))] rounded-[var(--radius)] hidden border border-[hsl(var(--border))] overflow-hidden shadow-sm">
                        <div
                            class="aspect-[4/3] bg-[hsl(var(--muted))] flex items-center justify-center border-b border-[hsl(var(--border))]">
                        </div>
                        <div class="p-4">
                            <p class="font-semibold text-[hsl(var(--primary))]">Item Title</p>
                        </div>
                    </div>
                    <!-- ... add more cards as needed -->

                </div>

                <!-- Pagination Section -->
                <div
                    class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-8 border-t border-[hsl(var(--border))]">
                    <button
                        class="w-full sm:w-auto px-6 py-2 rounded-md bg-[hsl(var(--muted))] text-[hsl(var(--primary))] font-medium hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))] transition-colors">
                        prev
                    </button>

                    <!-- Page Numbers -->
                    <div class="flex items-center gap-2 md:gap-4 overflow-x-auto py-2">
                        <span
                            class="px-3 py-1 rounded bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] cursor-pointer">1</span>
                        <span class="px-3 py-1 rounded hover:bg-[hsl(var(--muted))] cursor-pointer">2</span>
                        <span class="px-3 py-1 rounded hover:bg-[hsl(var(--muted))] cursor-pointer">3</span>
                        <span class="px-3 py-1 rounded hover:bg-[hsl(var(--muted))] cursor-pointer">4</span>
                        <span class="px-3 py-1 rounded hover:bg-[hsl(var(--muted))] cursor-pointer">5</span>
                        <span class="px-3 py-1 rounded hover:bg-[hsl(var(--muted))] cursor-pointer">6</span>
                        <span class="px-3 py-1 rounded hover:bg-[hsl(var(--muted))] cursor-pointer">7</span>
                    </div>

                    <button
                        class="w-full sm:w-auto px-6 py-2 rounded-md bg-[hsl(var(--muted))] text-[hsl(var(--primary))] font-medium hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))] transition-colors">
                        next
                    </button>
                </div>
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
                        <div class="group flex flex-col gap-2 cursor-pointer">
                            <div
                                class="h-2 bg-[hsl(var(--secondary))] w-full rounded group-hover:bg-[hsl(var(--accent))] transition-colors">
                            </div>
                            <span class="text-sm font-medium">Web Development</span>
                        </div>
                        <div class="group flex flex-col gap-2 cursor-pointer">
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
                        </div>
                    </nav>
                </div>
            </aside>

        </div>
    </div>


</x-blog>
