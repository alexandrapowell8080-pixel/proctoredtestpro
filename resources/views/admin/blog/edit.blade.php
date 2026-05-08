@extends('layouts.admin')

@section('seo_title', 'Edit Blog Post - Admin')

@section('content')



    <!-- Main Wrapper -->
    <div class="min-h-screen bg-[hsl(var(--background))] text-[hsl(var(--foreground))] font-sans p-4 md:p-8">
        <div class="max-w-7xl mx-auto">

            <!-- Header with Breadcrumbs -->
            <nav class="flex mb-4 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--primary))] transition-colors">Dashboard</a>
                    </li>
                    <li class="text-[hsl(var(--muted-foreground))]">/</li>
                    <li class="text-[hsl(var(--primary))] font-medium">Edit Post</li>
                </ol>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-[hsl(var(--primary))] flex items-center gap-3">
                    <span class="w-1.5 h-8 bg-[hsl(var(--accent))] rounded-full"></span>
                    Edit: {{ $blog->title }}
                </h2>
                <div class="flex items-center gap-3">
                    <a href="{{ route('blog', $blog->slug) }}" target="_blank"
                        class="px-4 py-2 text-sm font-medium border border-[hsl(var(--border))] rounded-[var(--radius)] hover:bg-[hsl(var(--muted))] transition-colors">
                        Preview Changes
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.blog.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Tip: Even though the action says POST, using @method('PUT') is standard for updates --}}
                @method('POST')

                <div class="flex flex-col lg:flex-row gap-8">

                    <!-- Main Editor Column -->
                    <div class="flex-1 space-y-6">

                        <!-- Title Input -->
                        <div
                            class="bg-[hsl(var(--card))] p-6 rounded-[var(--radius)] border border-[hsl(var(--border))] shadow-sm">
                            <label for="title"
                                class="block text-sm font-semibold mb-2 text-[hsl(var(--primary))]">Post Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                                class="w-full px-4 py-3 bg-[hsl(var(--background))] border @error('title') border-destructive @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] focus:outline-none transition-all text-lg font-medium"
                                placeholder="Enter post title...">
                            @error('title')
                                <p class="mt-1 text-xs text-destructive font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content Editor -->
                        <div
                            class="bg-[hsl(var(--card))] p-6 rounded-[var(--radius)] border border-[hsl(var(--border))] shadow-sm">
                            <label for="content"
                                class="block text-sm font-semibold mb-2 text-[hsl(var(--primary))]">Main Content</label>
                            <textarea name="content" id="content" rows="15"
                                class="w-full px-4 py-3 bg-[hsl(var(--background))] border @error('content') border-destructive @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] focus:outline-none transition-all resize-y"
                                placeholder="Write your content here...">{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-xs text-destructive font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SEO Section -->
                        <div
                            class="bg-[hsl(var(--card))] p-6 rounded-[var(--radius)] border border-[hsl(var(--border))] shadow-sm space-y-4">
                            <h3
                                class="text-md font-bold text-[hsl(var(--primary))] border-b border-[hsl(var(--border))] pb-2">
                                SEO Optimization</h3>

                            <div>
                                <label for="keywords"
                                    class="block text-sm font-semibold mb-2 text-[hsl(var(--primary))]">Keywords (Comma
                                    separated)</label>
                                <input type="text" name="keywords" id="keywords"
                                    value="{{ old('keywords', $blog->keywords) }}"
                                    class="w-full px-4 py-2 bg-[hsl(var(--background))] border @error('keywords') border-destructive @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] focus:outline-none"
                                    placeholder="e.g. technology, webdev, laravel">
                                @error('keywords')
                                    <p class="mt-1 text-xs text-destructive font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="meta_description"
                                    class="block text-sm font-semibold mb-2 text-[hsl(var(--primary))]">Meta
                                    Description</label>
                                <textarea name="meta_description" id="meta_description" rows="3"
                                    class="w-full px-4 py-2 bg-[hsl(var(--background))] border @error('meta_description') border-destructive @else border-[hsl(var(--border))] @enderror rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] focus:outline-none"
                                    placeholder="Brief summary for search results...">{{ old('meta_description', $blog->meta_description ?? $blog->description) }}</textarea>
                                @error('meta_description')
                                    <p class="mt-1 text-xs text-destructive font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar: Metadata & Actions -->
                    <aside class="w-full lg:w-80 space-y-6">

                        <!-- Publishing Box -->
                        <div
                            class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] overflow-hidden shadow-sm">
                            <div class="px-5 py-3 bg-[hsl(var(--muted))] border-b border-[hsl(var(--border))]">
                                <h3 class="text-sm font-bold text-[hsl(var(--primary))]">Status & Visibility</h3>
                            </div>
                            <div class="p-5 space-y-4">
                                <div>
                                    <label for="status"
                                        class="block text-xs font-semibold mb-2 text-[hsl(var(--muted-foreground))] uppercase">Post
                                        Status</label>
                                    <select name="status" id="status"
                                        class="w-full bg-[hsl(var(--background))] border @error('status') border-destructive @else border-[hsl(var(--border))] @enderror rounded-md p-2 text-sm focus:ring-[hsl(var(--ring))] outline-none">
                                        <option value="published"
                                            {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>
                                            Published</option>
                                        <option value="draft"
                                            {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                        <option value="scheduled"
                                            {{ old('status', $blog->status) == 'scheduled' ? 'selected' : '' }}>
                                            Scheduled</option>
                                    </select>
                                    @error('status')
                                        <p class="mt-1 text-xs text-destructive font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-[hsl(var(--muted-foreground))]">Visibility:</span>
                                    <span class="font-medium">Public</span>
                                </div>
                                <hr class="border-[hsl(var(--border))]">
                                <div class="flex flex-col gap-2">
                                    <button type="submit"
                                        class="w-full py-2 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] rounded-md font-bold hover:opacity-90 transition-opacity">
                                        Update Post
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Category Selection -->
                        <div
                            class="bg-[hsl(var(--card))] p-5 rounded-[var(--radius)] border border-[hsl(var(--border))] shadow-sm">
                            <label for="category_id"
                                class="block text-sm font-bold mb-3 text-[hsl(var(--primary))]">Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full bg-[hsl(var(--background))] border @error('category_id') border-destructive @else border-[hsl(var(--border))] @enderror rounded-md p-2 text-sm focus:ring-[hsl(var(--ring))] outline-none">
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-xs text-destructive font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Featured Image -->
                        <div
                            class="bg-[hsl(var(--card))] p-5 rounded-[var(--radius)] border border-[hsl(var(--border))] shadow-sm">
                            <label class="block text-sm font-bold mb-3 text-[hsl(var(--primary))]">Featured
                                Image</label>
                            <div
                                class="aspect-video bg-[hsl(var(--muted))] rounded-md mb-3 overflow-hidden border @error('image') border-destructive @else border-[hsl(var(--border))] @enderror">
                                <img src="{{ $blog->image_url }}" id="img-preview" class="w-full h-full object-cover">
                            </div>
                            <input type="file" name="image" id="image" onchange="previewImage(event)"
                                class="text-xs text-[hsl(var(--muted-foreground))] file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[hsl(var(--secondary))] file:text-white hover:file:opacity-80 cursor-pointer">
                            @error('image')
                                <p class="mt-1 text-xs text-destructive font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                    </aside>
                </div>
            </form>
        </div>
    </div>

    {{-- Simple Script to preview image change immediately --}}
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('img-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection