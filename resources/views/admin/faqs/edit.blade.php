@extends('layouts.admin')

@section('seo_title', 'Edit FAQ - Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <header class="flex items-center justify-between border-b border-[hsl(var(--border))] pb-5">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight"
                style="font-family: 'Space Grotesk', sans-serif;">Edit Content</h1>
            <p class="text-sm text-[hsl(var(--muted-foreground))] mt-1">Modify keyword, category, or AI-generated
                output.</p>
        </div>
        <a href="{{ route('admin.faqs.index') }}"
            class="text-sm font-medium text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--foreground))] transition-colors">
            &larr; Back to List
        </a>
    </header>

    @if($errors->any())
    <div class="p-4 bg-[#fef2f2] border-l-4 border-[#dc2626] rounded-r-lg shadow-sm">
        <ul class="text-[#b91c1c] text-sm list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-[hsl(var(--card))] rounded-2xl shadow-sm border border-[hsl(var(--border))] p-6 sm:p-8">
        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-[hsl(var(--foreground))] mb-2">Keyword
                        Constraint</label>
                    <input type="text" name="keyword" value="{{ old('keyword', $faq->keyword) }}" required
                        class="w-full border border-[hsl(var(--border))] rounded-lg px-4 py-2.5 text-sm bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[hsl(var(--foreground))] mb-2">Category
                        Assignment</label>
                    <select name="category_id" required
                        class="w-full border border-[hsl(var(--border))] rounded-lg px-4 py-2.5 text-sm bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[hsl(var(--foreground))] mb-2">Public Title (H1)</label>
                <input type="text" name="title" value="{{ old('title', $faq->title) }}"
                    class="w-full border border-[hsl(var(--border))] rounded-lg px-4 py-2.5 text-sm bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none">
                <p class="text-xs text-[hsl(var(--muted-foreground))] mt-1">If altered, the SEO slug will regenerate
                    automatically.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[hsl(var(--foreground))] mb-2">Meta Description</label>
                <textarea name="description" rows="2"
                    class="w-full border border-[hsl(var(--border))] rounded-lg px-4 py-2.5 text-sm bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none resize-none">{{ old('description', $faq->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-[hsl(var(--foreground))] mb-2">Meta Keywords
                    (Comma-separated)</label>
                <input type="text" name="meta_keywords"
                    value="{{ old('meta_keywords', is_array($faq->meta_keywords) ? implode(', ', $faq->meta_keywords) : $faq->meta_keywords) }}"
                    class="w-full border border-[hsl(var(--border))] rounded-lg px-4 py-2.5 text-sm bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-[hsl(var(--foreground))] mb-2">Main Content Body</label>
                <textarea name="content" id="auto-expand-textarea" rows="6"
                    class="w-full border border-[hsl(var(--border))] rounded-lg px-4 py-3 text-sm bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none overflow-hidden resize-none">{{ old('content', $faq->content) }}</textarea>
            </div>

            <div class="flex justify-end pt-4 border-t border-[hsl(var(--border))]">
                <button type="submit"
                    class="bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] font-bold py-2.5 px-6 rounded-lg hover:opacity-90 transition-opacity">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('auto-expand-textarea');
        
        if (textarea) {
            const autoResize = function() {
                textarea.style.height = 'auto'; 
                textarea.style.height = textarea.scrollHeight + 'px';
            };

            textarea.addEventListener('input', autoResize);
            
         
            autoResize();
        }
    });
</script>
@endsection