<x-blog>
    <div class="min-h-screen bg-[hsl(var(--background))] text-[hsl(var(--foreground))] font-sans p-4 md:p-8">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-[hsl(var(--primary))] flex items-center gap-3">
                    <span class="w-1.5 h-8 bg-[hsl(var(--secondary))] rounded-full"></span>
                    Create New Post
                </h2>
                <p class="text-[hsl(var(--muted-foreground))] mt-1">Draft your next article and optimize it for search
                    engines.</p>
            </div>

            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Section 1: Main Content -->
                <div
                    class="bg-[hsl(var(--card))] p-6 rounded-[var(--radius)] border border-[hsl(var(--border))] shadow-sm space-y-6">
                    <h3 class="text-lg font-bold text-[hsl(var(--primary))] border-b border-[hsl(var(--border))] pb-2">
                        Core Information</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div class="md:col-span-1">
                            <label for="title"
                                class="block text-sm font-semibold mb-2 text-[hsl(var(--muted-foreground))]">Blog
                                Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="w-full px-4 py-2 bg-[hsl(var(--background))] border @error('title') border-[hsl(var(--destructive))] @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] outline-none transition-all"
                                placeholder="Enter the main heading...">
                            @error('title')
                                <p class="mt-1 text-xs text-[hsl(var(--destructive))]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category Dropdown -->
                        <div class="md:col-span-1">
                            <label for="category_id"
                                class="block text-sm font-semibold mb-2 text-[hsl(var(--muted-foreground))]">Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full px-4 py-2 bg-[hsl(var(--background))] border @error('category_id') border-[hsl(var(--destructive))] @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] outline-none transition-all cursor-pointer appearance-none">
                                <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select a
                                    category</option>
                                @php $cats = [1 => 'Medical News', 2 => 'Nursing Tips', 3 => 'Exam Prep', 4 => 'Career Advice', 5 => 'Healthcare Tech']; @endphp
                                @foreach ($cats as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ old('category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-xs text-[hsl(var(--destructive))]">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-[hsl(var(--muted-foreground))]">Cover
                            Image</label>
                        <div
                            class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed @error('image') border-[hsl(var(--destructive))] @else border-[hsl(var(--border))] @enderror rounded-lg bg-[hsl(var(--background))] hover:bg-[hsl(var(--muted))] transition-colors cursor-pointer relative overflow-hidden">
                            <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer"
                                onchange="previewImage(event)">
                            <div id="placeholder-content" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-[hsl(var(--muted-foreground))]" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="text-sm text-[hsl(var(--muted-foreground))]">Click to upload or drag and drop
                                </p>
                            </div>
                            <img id="preview" class="hidden absolute inset-0 w-full h-full object-cover">
                        </div>
                        @error('image')
                            <p class="mt-1 text-xs text-[hsl(var(--destructive))]">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-semibold mb-2">Body Content</label>
                        <textarea name="content" id="content" rows="12"
                            class="w-full px-4 py-3 bg-[hsl(var(--background))] border @error('content') border-[hsl(var(--destructive))] @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] outline-none transition-all"
                            placeholder="Start writing here...">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-xs text-[hsl(var(--destructive))]">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Section 2: SEO & Metadata -->
                <div
                    class="bg-[hsl(var(--card))] p-6 rounded-[var(--radius)] border border-[hsl(var(--border))] shadow-sm space-y-6">
                    <h3
                        class="text-lg font-bold text-[hsl(var(--primary))] border-b border-[hsl(var(--border))] pb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[hsl(var(--secondary))]"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        SEO Settings
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Meta Description -->
                        <div class="md:col-span-1">
                            <label for="meta_description" class="block text-sm font-semibold mb-2">Meta
                                Description</label>
                            <textarea name="meta_description" id="meta_description" rows="4"
                                class="w-full px-4 py-2 bg-[hsl(var(--background))] border @error('meta_description') border-[hsl(var(--destructive))] @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] outline-none text-sm"
                                placeholder="Brief summary...">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <p class="mt-1 text-xs text-[hsl(var(--destructive))]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meta Keywords -->
                        <div class="md:col-span-1">
                            <label for="meta_keywords" class="block text-sm font-semibold mb-2">Meta Keywords</label>
                            <textarea name="meta_keywords" id="meta_keywords" rows="4"
                                class="w-full px-4 py-2 bg-[hsl(var(--background))] border @error('meta_keywords') border-[hsl(var(--destructive))] @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] outline-none text-sm"
                                placeholder="k1, k2...">{{ old('meta_keywords') }}</textarea>
                            @error('meta_keywords')
                                <p class="mt-1 text-xs text-[hsl(var(--destructive))]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Keywords (Extra field from your snippet) -->
                        <div class="md:col-span-1">
                            <label for="keywords" class="block text-sm font-semibold mb-2">Keywords</label>
                            <textarea name="keywords" id="keywords" rows="4"
                                class="w-full px-4 py-2 bg-[hsl(var(--background))] border @error('keywords') border-[hsl(var(--destructive))] @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] outline-none text-sm"
                                placeholder="k1, k2...">{{ old('keywords') }}</textarea>
                            @error('keywords')
                                <p class="mt-1 text-xs text-[hsl(var(--destructive))]">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-4 pt-4">
                    <button type="button"
                        class="px-6 py-2 border border-[hsl(var(--border))] rounded-md text-sm font-medium hover:bg-[hsl(var(--muted))] transition-colors">
                        Save Draft
                    </button>
                    <button type="submit"
                        class="px-8 py-2 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] rounded-md font-bold hover:opacity-90 transition-opacity shadow-md">
                        Publish Post
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Image Preview Script -->
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                const placeholder = document.getElementById('placeholder-content');
                output.src = reader.result;
                output.classList.remove('hidden');
                placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-blog>
