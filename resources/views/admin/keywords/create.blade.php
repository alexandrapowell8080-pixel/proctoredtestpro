<x-blog>
    <div class="max-w-2xl mx-auto py-8">
        <!-- Form Card -->
        <div
            class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] shadow-sm overflow-hidden">

            <!-- Header -->
            <div class="px-6 py-4 border-b border-[hsl(var(--border))] bg-[hsl(var(--muted))/50]">
                <h2 class="text-xl font-bold text-[hsl(var(--primary))] flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[hsl(var(--secondary))]" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    Create New Keyword
                </h2>
            </div>

            <!-- Form Body -->
            <form action="{{ route('keywords.store') }}" method="POST" class="p-6">
                @csrf

                <div class="space-y-4">
                    <div>
                        <label for="name"
                            class="block text-sm font-semibold text-[hsl(var(--muted-foreground))] mb-2">
                            Keyword Name
                        </label>
                        <input type="text" name="name" id="name" placeholder="e.g. Laravel, Tailwind, SEO"
                            class="w-full px-4 py-2 bg-[hsl(var(--background))] border border-[hsl(var(--border))] rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] focus:border-transparent outline-none transition-all placeholder:text-[hsl(var(--muted-foreground))/50]"
                            required>
                        <p class="mt-2 text-xs text-[hsl(var(--muted-foreground))]">
                            Use short, descriptive terms to help categorize your content.
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex items-center justify-end gap-3">
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--primary))] transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-6 py-2 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] rounded-[var(--radius)] font-bold hover:opacity-90 transition-opacity shadow-sm">
                        Save Keyword
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-blog>
