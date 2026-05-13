@extends('layouts.admin')

@section('seo_title', 'Manage Blog Post - Admin')

@section('content')


@if (session('CSV_error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
                icon: 'error',
                title: 'Sorry!',
                text: "{{ session('CSV_error') }}",
                confirmButtonColor: '#FF8080'
            });
</script>
@endif
@if (session('CSV_success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('CSV_success') }}",
            });
</script>
@endif
@if (session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
            });
</script>
@endif
<!-- Main Wrapper -->
<div class="min-h-screen bg-[hsl(var(--background))] text-[hsl(var(--foreground))] font-sans p-4 md:p-8">
    <div class="max-w-7xl mx-auto">

        <!-- Admin Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-[hsl(var(--primary))] flex items-center gap-3">
                    <span class="w-1.5 h-8 bg-[hsl(var(--secondary))] rounded-full"></span>
                    Manage Content
                </h2>
                <p class="text-[hsl(var(--muted-foreground))] mt-1">Overview of all published and draft articles.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3">
                {{-- <button
                    class="px-4 py-2 bg-[hsl(var(--card))] border border-[hsl(var(--border))] rounded-[var(--radius)] text-sm font-medium hover:bg-[hsl(var(--muted))] transition-colors">
                    Export CSV
                </button> --}}
                <a href="{{ route('admin.blog.create') }}"
                    class="px-4 py-2 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] rounded-[var(--radius)] text-sm font-medium hover:opacity-90 transition-opacity flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create New Post
                </a>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Management Table -->
            <main class="flex-1 overflow-hidden">
                <div
                    class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] shadow-sm overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="bg-[hsl(var(--muted))] text-[hsl(var(--muted-foreground))] text-xs uppercase tracking-wider">
                                <th class="px-6 py-4 font-semibold">Post Details</th>
                                <th class="px-6 py-4 font-semibold">Category</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 font-semibold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[hsl(var(--border))]">
                            @foreach ($blogs as $blog)
                            <tr class="hover:bg-[hsl(var(--muted))/50] transition-colors">
                                <!-- Image & Title -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ $blog->image_url }}"
                                            class="w-12 h-12 rounded bg-[hsl(var(--muted))] object-cover border border-[hsl(var(--border))]">
                                        <div class="max-w-[200px] md:max-w-xs">
                                            <div class="text-[hsl(var(--primary))] font-medium truncate">
                                                {{ $blog->title }}</div>
                                            <div class="text-xs text-[hsl(var(--muted-foreground))]">Created
                                                {{ $blog->created_at->format('M d, Y') }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Category Badge -->
                                <td class="px-6 py-4 text-sm">
                                    <span
                                        class="px-2 py-1 bg-[hsl(var(--muted))] text-[hsl(var(--muted-foreground))] rounded text-xs">
                                        {{ $blog->category->name }}
                                    </span>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4 text-sm">
                                   
                                    @if ($blog->status == 'draft')
                                    <div class="flex items-center gap-1.5 text-[hsl(var(--primary))]">

                                        <span class="w-2 h-2 rounded-full bg-[hsl(var(--primary))]"></span>
                                        Draft
                                    </div>
                                    @elseif ($blog->status == 'published')
                                    <div class="flex items-center gap-1.5 text-[hsl(var(--secondary))]">
                                        <span class="w-2 h-2 rounded-full bg-[hsl(var(--secondary))]"></span>
                                        Published
                                    </div>
                                    @elseif ($blog->status == 'new')
                                    <div class="flex items-center gap-1.5 text-amber-500">
                                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                        New
                                    </div>
                                    @endif

                                </td>

                                <!-- Action Buttons -->
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}"
                                            class="p-2 text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--primary))] transition-colors"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-[hsl(var(--destructive))] hover:bg-[hsl(var(--destructive))/10] rounded transition-colors"
                                                title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <!-- Pagination Section -->
                <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4 px-2">
                    <!-- Results Summary -->
                    <p class="text-sm text-[hsl(var(--muted-foreground))] order-2 sm:order-1">
                        Showing
                        <span class="font-semibold text-[hsl(var(--foreground))]">{{ $blogs->firstItem() }}</span>
                        to
                        <span class="font-semibold text-[hsl(var(--foreground))]">{{ $blogs->lastItem() }}</span>
                        of
                        <span class="font-semibold text-[hsl(var(--foreground))]">{{ $blogs->total() }}</span>
                        results
                    </p>

                    <!-- Navigation Buttons -->
                    <div class="flex items-center gap-2 order-1 sm:order-2">
                        @if ($blogs->onFirstPage())
                        <span
                            class="px-4 py-2 border border-[hsl(var(--border))] rounded-[var(--radius)] text-sm bg-[hsl(var(--muted))] text-[hsl(var(--muted-foreground))] cursor-not-allowed opacity-50">
                            Previous
                        </span>
                        @else
                        <a href="{{ $blogs->previousPageUrl() }}"
                            class="px-4 py-2 border border-[hsl(var(--border))] rounded-[var(--radius)] text-sm bg-[hsl(var(--card))] hover:bg-[hsl(var(--muted))] text-[hsl(var(--foreground))] transition-colors shadow-sm">
                            Previous
                        </a>
                        @endif

                        @if ($blogs->hasMorePages())
                        <a href="{{ $blogs->nextPageUrl() }}"
                            class="px-4 py-2 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] rounded-[var(--radius)] text-sm font-medium hover:opacity-90 transition-opacity shadow-sm">
                            Next
                        </a>
                        @else
                        <span
                            class="px-4 py-2 bg-[hsl(var(--muted))] text-[hsl(var(--muted-foreground))] rounded-[var(--radius)] text-sm cursor-not-allowed opacity-50">
                            Next
                        </span>
                        @endif
                    </div>
                </div>
            </main>

            <!-- Admin Quick Stats Sidebar -->
            <aside class="w-full lg:w-80 space-y-6">
                <div
                    class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] overflow-hidden shadow-sm">
                    <!-- Header & Toggle -->
                    <div
                        class="px-5 py-3 bg-[hsl(var(--muted))] border-b border-[hsl(var(--border))] flex items-center justify-between">
                        <!-- Left Side: Title with Icon -->
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[hsl(var(--primary))]"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            <h3 class="text-xs font-bold text-[hsl(var(--primary))] uppercase tracking-widest">
                                Keyword Manager
                            </h3>
                        </div>

                        <!-- Right Side: Action Button -->
                        <form action="{{ route('admin.blog.generate') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-4 py-1.5 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] rounded-md text-xs font-bold hover:opacity-90 transition-all shadow-sm active:scale-95">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Generate
                            </button>
                        </form>
                    </div>

                    <div class="p-5">
                        <!-- Toggle Buttons -->
                        <div class="flex bg-[hsl(var(--muted))] p-1 rounded-md mb-6">
                            <button type="button" onclick="toggleKeywordMode('single')" id="btn-single"
                                class="flex-1 py-1.5 text-xs font-semibold rounded-sm transition-all shadow-sm bg-[hsl(var(--card))] text-[hsl(var(--primary))]">
                                Single Entry
                            </button>
                            <button type="button" onclick="toggleKeywordMode('bulk')" id="btn-bulk"
                                class="flex-1 py-1.5 text-xs font-semibold rounded-sm transition-all text-[hsl(var(--muted-foreground))]">
                                CSV Upload
                            </button>
                        </div>

                        <!-- Single Keyword Form -->
                        <form id="form-single" action="{{ route('admin.blog.keyword') }}" method="POST"
                            class="space-y-4">
                            @csrf
                            <div>
                                <label
                                    class="block text-xs font-semibold mb-2 text-[hsl(var(--muted-foreground))] uppercase">New
                                    Keyword</label>
                                <input type="text" name="keyword" required
                                    class="w-full px-3 py-2 bg-[hsl(var(--background))] border border-[hsl(var(--border))] rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] outline-none text-sm"
                                    placeholder="e.g. Laravel">
                            </div>

                            <!-- Category for Single -->
                            <div>
                                <label
                                    class="block text-xs font-semibold mb-2 text-[hsl(var(--muted-foreground))] uppercase">Category</label>
                                <select name="category_id" required
                                    class="w-full px-3 py-2 bg-[hsl(var(--background))] border border-[hsl(var(--border))] rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] outline-none text-sm">
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit"
                                class="w-full py-2 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] rounded-md text-sm font-bold hover:opacity-90 transition-opacity">
                                Add Keyword
                            </button>
                        </form>

                        <!-- CSV Upload Form -->
                        <form id="form-bulk" action="{{ route('admin.blog.keywords') }}" method="POST"
                            enctype="multipart/form-data" class="hidden space-y-4">
                            @csrf
                            <!-- Category for Bulk -->
                            {{-- <div>
                                <label
                                    class="block text-xs font-semibold mb-2 text-[hsl(var(--muted-foreground))] uppercase">Assign
                                    to Category</label>
                                <select name="category_id" required
                                    class="w-full px-3 py-2 bg-[hsl(var(--background))] border border-[hsl(var(--border))] rounded-md focus:ring-2 focus:ring-[hsl(var(--ring))] outline-none text-sm mb-4">
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div>
                                <label
                                    class="block text-xs font-semibold mb-2 text-[hsl(var(--muted-foreground))] uppercase">Upload
                                    CSV File</label>
                                <span class="text-xs">Two colums: category name and keyword name</span>
                                <div
                                    class="relative border-2 border-dashed border-[hsl(var(--border))] rounded-md p-4 text-center hover:bg-[hsl(var(--muted))] transition-colors cursor-pointer">
                                    <input type="file" name="file" accept=".csv" required
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-8 h-8 mx-auto text-[hsl(var(--muted-foreground))] mb-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-xs text-[hsl(var(--muted-foreground))]">Click or drag .csv file
                                    </p>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full py-2 bg-[hsl(var(--secondary))] text-[hsl(var(--secondary-foreground))] rounded-md text-sm font-bold hover:opacity-90 transition-opacity">
                                Import Keywords
                            </button>
                        </form>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

<script>
    function toggleKeywordMode(mode) {
            const formSingle = document.getElementById('form-single');
            const formBulk = document.getElementById('form-bulk');
            const btnSingle = document.getElementById('btn-single');
            const btnBulk = document.getElementById('btn-bulk');

            // Styles for Active/Inactive states
            const activeClass = ['bg-[hsl(var(--card))]', 'text-[hsl(var(--primary))]', 'shadow-sm'];
            const inactiveClass = ['text-[hsl(var(--muted-foreground))]'];

            if (mode === 'single') {
                formSingle.classList.remove('hidden');
                formBulk.classList.add('hidden');

                btnSingle.classList.add(...activeClass);
                btnSingle.classList.remove(...inactiveClass);

                btnBulk.classList.remove(...activeClass);
                btnBulk.classList.add(...inactiveClass);
            } else {
                formSingle.classList.add('hidden');
                formBulk.classList.remove('hidden');

                btnBulk.classList.add(...activeClass);
                btnBulk.classList.remove(...inactiveClass);

                btnSingle.classList.remove(...activeClass);
                btnSingle.classList.add(...inactiveClass);
            }
        }
</script>

@endsection