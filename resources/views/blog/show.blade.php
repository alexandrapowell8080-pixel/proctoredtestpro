<x-blog>
    <div class="min-h-screen bg-[hsl(var(--background))] text-[hsl(var(--foreground))] font-sans p-4 md:p-8">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8">

            <!-- Main Content Area -->
            <main
                class="flex-1 bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] p-6 shadow-sm">

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
                            <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="prose prose-slate max-w-none">
                        {!! $blog->description !!}
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
                    <button
                        class="px-6 py-3 rounded-md bg-[hsl(var(--muted))] text-[hsl(var(--primary))] font-medium hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))] transition-colors">
                        ← Previous
                    </button>
                    <button
                        class="px-6 py-3 rounded-md bg-[hsl(var(--secondary))] text-[hsl(var(--secondary-foreground))] font-medium hover:opacity-90 transition-opacity">
                        Next →
                    </button>
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
                        <div class="h-20 bg-[hsl(var(--muted))] rounded-md"></div>
                        <div class="h-20 bg-[hsl(var(--muted))] rounded-md"></div>
                        <div class="h-20 bg-[hsl(var(--muted))] rounded-md"></div>
                    </div>
                </div>

                <!-- Random Blog/Promo Card -->
                <div
                    class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] p-5 shadow-sm">
                    <h3 class="font-bold text-[hsl(var(--primary))] mb-4 border-b border-[hsl(var(--border))] pb-2">
                        Random Blog</h3>
                    <div class="aspect-square bg-[hsl(var(--muted))] rounded-md mb-3 flex items-center justify-center">
                        <span class="text-xs text-[hsl(var(--muted-foreground))]">Featured Thumbnail</span>
                    </div>
                    <div class="h-4 bg-[hsl(var(--muted))] rounded w-full mb-2"></div>
                    <div class="h-4 bg-[hsl(var(--muted))] rounded w-2/3"></div>
                </div>

            </aside>

        </div>
    </div>
</x-blog>
