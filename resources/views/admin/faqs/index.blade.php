@extends('layouts.admin')

@section('seo_title', 'FAQ Manager Engine')

@section('content')
<div class="max-w-[1600px] mx-auto space-y-6 lg:space-y-8">

    {{-- Header --}}
    <header
        class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-[hsl(var(--border))] pb-5 gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight"
                style="font-family: 'Space Grotesk', sans-serif;">Manage FAQs</h1>
            <p class="text-sm text-[hsl(var(--muted-foreground))] mt-1">Manage bulk ingestion, manual entries, and
                content auditing.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('faqs.index') }}" target="_blank"
                class="bg-white text-black border border-[hsl(var(--border))] shadow-sm hover:bg-gray-50 text-sm font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                View Frontend
            </a>
        </div>
    </header>

    {{-- Alerts --}}
    @if(session('success') || session('queued') || session('success_delete') || $errors->any())
    <div class="space-y-3">
        @if(session('success'))
        <div class="p-4 bg-[#f0fdf4] border border-[#bbf7d0] rounded-xl flex items-center gap-3">
            <span class="text-[#16a34a]">✅</span>
            <span class="text-sm text-[#166534] font-medium">Operation completed successfully.</span>
        </div>
        @endif
        @if(session('queued'))
        <div class="p-4 bg-[#eff6ff] border border-[#bfdbfe] rounded-xl text-sm text-[#1e40af] font-medium">
            ℹ️ {{ session('queued') }}
        </div>
        @endif
        @if(session('success_delete'))
        <div class="p-4 bg-[#fef2f2] border border-[#fecaca] rounded-xl text-sm text-[#991b1b] font-medium">
            🗑️ {{ session('success_delete') }}
        </div>
        @endif
    </div>
    @endif

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 lg:gap-6">
        <div
            class="bg-[hsl(var(--card))] p-5 rounded-2xl border border-[hsl(var(--border))] shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-[hsl(var(--muted-foreground))] uppercase tracking-wider mb-1">Total
                    System</p>
                <div class="text-3xl font-bold">{{ $stats['total'] }}</div>
            </div>
        </div>
        <div
            class="bg-[hsl(var(--card))] p-5 rounded-2xl border border-[hsl(var(--border))] shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-[hsl(var(--muted-foreground))] uppercase tracking-wider mb-1">Queue
                    (Pending)</p>
                <div class="text-3xl font-bold text-cyan-600">{{ $stats['pending'] }}</div>
            </div>
        </div>
        <div
            class="bg-[hsl(var(--card))] p-5 rounded-2xl border border-[hsl(var(--border))] shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-[hsl(var(--muted-foreground))] uppercase tracking-wider mb-1">
                    Published</p>
                <div class="text-3xl font-bold text-green-600">{{ $stats['published'] }}</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 lg:gap-8">

        {{-- Left Column: Forms --}}
        <div class="xl:col-span-4 space-y-6">

            {{-- Manual Add Form --}}
            <div class="bg-[hsl(var(--card))] rounded-2xl shadow-sm border border-[hsl(var(--border))] overflow-hidden">
                <div class="bg-[hsl(var(--secondary))] px-5 py-3 border-b border-[hsl(var(--border))]">
                    <h2 class="font-bold text-xs tracking-wider text-[hsl(var(--foreground))] uppercase">Manual Add</h2>
                </div>
                <div class="p-5">
                    <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <select name="category_id" required
                                class="w-full border border-[hsl(var(--border))] rounded-lg px-3 py-2 text-sm bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none">
                                <option value="">Select Category...</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <input type="text" name="keyword" required placeholder="Enter single keyword..."
                                class="w-full border border-[hsl(var(--border))] rounded-lg px-3 py-2 text-sm bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none">
                        </div>
                        <button type="submit"
                            class="w-full bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] font-semibold text-sm py-2 px-4 rounded-lg hover:opacity-90 transition-opacity">Add
                            Keyword</button>
                    </form>
                </div>
            </div>

            {{-- Bulk Import Form --}}
            <div class="bg-[hsl(var(--card))] rounded-2xl shadow-sm border border-[hsl(var(--border))] overflow-hidden">
                <div class="bg-[hsl(var(--secondary))] px-5 py-3 border-b border-[hsl(var(--border))]">
                    <h2 class="font-bold text-xs tracking-wider text-[hsl(var(--foreground))] uppercase">Bulk Ingestion
                        (.csv/.txt)</h2>
                </div>
                <div class="p-5">
                    <form action="{{ route('admin.faqs.import') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-4">
                        @csrf
                        <select name="category_id" required
                            class="w-full border border-[hsl(var(--border))] rounded-lg px-3 py-2 text-sm bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none">
                            <option value="">Select Target Category...</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="file" name="keywords_file" accept=".csv,.txt" required
                            class="w-full text-sm text-[hsl(var(--muted-foreground))] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[hsl(var(--secondary))] file:text-[hsl(var(--foreground))] hover:file:bg-[hsl(var(--border))]" />
                        <button type="submit"
                            class="w-full bg-black text-white font-semibold text-sm py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Execute
                            Import</button>
                    </form>
                </div>
            </div>

            {{-- Generator Form --}}
            <div class="bg-[hsl(var(--card))] rounded-2xl shadow-sm border border-[hsl(var(--border))] overflow-hidden">
                <div class="bg-[hsl(var(--secondary))] px-5 py-3 border-b border-[hsl(var(--border))]">
                    <h2 class="font-bold text-xs tracking-wider text-[hsl(var(--foreground))] uppercase">AI Processor
                        Engine</h2>
                </div>
                <div class="p-5">
                    <form action="{{ route('admin.faqs.generate') }}" method="POST" class="flex gap-2">
                        @csrf
                        <input type="number" name="limit" value="5" min="1" max="20"
                            class="w-20 border border-[hsl(var(--border))] rounded-lg px-3 py-2 text-sm bg-[hsl(var(--background))] outline-none text-center">
                        <button type="submit"
                            class="flex-1 bg-cyan-600 text-white font-semibold text-sm py-2 px-4 rounded-lg hover:bg-cyan-700 transition-colors">Force
                            Process</button>
                    </form>
                </div>
            </div>

            {{-- Admin Instructions Restored --}}
            <div class="bg-[hsl(var(--secondary))/0.5] rounded-2xl border border-[hsl(var(--border))] p-6">
                <h3
                    class="text-sm font-bold text-[hsl(var(--foreground))] uppercase tracking-wide mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[hsl(var(--primary))]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    How to use bulk import
                </h3>
                <ol class="list-decimal list-outside ml-4 text-sm text-[hsl(var(--muted-foreground))] space-y-3">
                    <li class="pl-2">Create a <code
                            class="bg-[hsl(var(--background))] px-1.5 py-0.5 rounded border border-[hsl(var(--border))] font-mono text-xs">.csv</code>
                        or <code
                            class="bg-[hsl(var(--background))] px-1.5 py-0.5 rounded border border-[hsl(var(--border))] font-mono text-xs">.txt</code>
                        file with one keyword on each line.</li>
                    <li class="pl-2">Select your category above and upload the file. Keywords are added to the waiting
                        list.</li>
                    <li class="pl-2">The system will generate answers automatically in the background, or you can click
                        "Force Process" to do it now.</li>
                </ol>
            </div>

        </div>
        <div class="xl:col-span-8">
            <div
                class="bg-[hsl(var(--card))] rounded-2xl shadow-sm border border-[hsl(var(--border))] overflow-hidden flex flex-col h-full min-h-[600px]">

                <div
                    class="bg-[hsl(var(--secondary))] px-5 py-4 border-b border-[hsl(var(--border))] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <h2 class="font-bold text-xs tracking-wider text-[hsl(var(--foreground))] uppercase">Database
                        Records</h2>

                    {{-- Search Form --}}
                    <form action="{{ route('admin.faqs.index') }}" method="GET" class="relative max-w-xs w-full">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search keywords..."
                            class="w-full pl-9 pr-3 py-1.5 text-sm rounded-lg border border-[hsl(var(--border))] bg-[hsl(var(--background))] focus:ring-2 focus:ring-[hsl(var(--primary))] outline-none">
                        <svg class="w-4 h-4 absolute left-3 top-2 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </form>
                </div>

                <div class="flex-1 overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[600px]">
                        <thead>
                            <tr class="bg-[hsl(var(--secondary))/0.3] border-b border-[hsl(var(--border))]">
                                <th
                                    class="px-5 py-3 text-[11px] font-bold text-[hsl(var(--muted-foreground))] uppercase tracking-wider">
                                    Keyword</th>
                                <th
                                    class="px-5 py-3 text-[11px] font-bold text-[hsl(var(--muted-foreground))] uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-5 py-3 text-[11px] font-bold text-[hsl(var(--muted-foreground))] uppercase tracking-wider text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[hsl(var(--border))]">
                            @forelse($faqs as $faq)
                            <tr class="hover:bg-[hsl(var(--secondary))/0.3] transition-colors">
                                <td class="px-5 py-3">
                                    <p class="text-sm font-medium text-[hsl(var(--foreground))] truncate max-w-[250px]"
                                        title="{{ $faq->keyword }}">{{ $faq->keyword }}</p>
                                    @if($faq->title)
                                    <p
                                        class="text-xs text-[hsl(var(--muted-foreground))] mt-0.5 truncate max-w-[250px]">
                                        {{ $faq->title }}</p>
                                    @endif
                                </td>
                                <td class="px-5 py-3">
                                    @if($faq->content)
                                    <span
                                        class="px-2 py-1 rounded text-[10px] font-bold bg-[#ecfdf5] text-[#059669] border border-[#a7f3d0] uppercase tracking-wide">Live</span>
                                    @else
                                    <span
                                        class="px-2 py-1 rounded text-[10px] font-bold bg-cyan-50 text-cyan-700 border border-cyan-200 uppercase tracking-wide">Pending</span>
                                    @endif
                                </td>
                                <td class="px-5 py-3 text-right space-x-2">
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}"
                                        class="inline-block text-sm font-medium text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-md transition-colors">Edit</a>

                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this record completely?')"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-sm font-medium text-[#ef4444] hover:text-[#b91c1c] bg-[#fef2f2] hover:bg-[#fecaca] px-3 py-1.5 rounded-md transition-colors">Del</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3"
                                    class="px-5 py-12 text-center text-[hsl(var(--muted-foreground))] text-sm">
                                    No records found matching your criteria.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($faqs->hasPages())
                <div class="px-5 py-4 border-t border-[hsl(var(--border))]">
                    {{ $faqs->links() }}
                </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection