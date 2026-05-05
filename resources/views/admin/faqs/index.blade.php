@extends('layouts.app')

@section('seo_title', 'FAQ Manager - Admin')

@section('content')
<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-6xl mx-auto px-4">
        
        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-black mb-2">FAQ Manager</h1>
            <p class="text-gray-600">Bulk upload keywords and monitor AI generation status</p>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl border-l-4 border-black shadow-sm">
                <div class="text-sm text-gray-500 mb-1">Total Keywords</div>
                <div class="text-3xl font-bold text-black">{{ $stats['total'] }}</div>
            </div>
            <div class="bg-white p-6 rounded-xl border-l-4 border-cyan-500 shadow-sm">
                <div class="text-sm text-gray-500 mb-1">Pending Generation</div>
                <div class="text-3xl font-bold text-cyan-600">{{ $stats['pending'] }}</div>
            </div>
            <div class="bg-white p-6 rounded-xl border-l-4 border-green-500 shadow-sm">
                <div class="text-sm text-gray-500 mb-1">Published FAQs</div>
                <div class="text-3xl font-bold text-green-600">{{ $stats['published'] }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- Upload Form --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-black px-6 py-4">
                    <h2 class="text-white font-semibold text-lg">📤 Bulk Upload Keywords</h2>
                </div>
                
                <div class="p-6">
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <p class="text-green-800 font-medium">✅ Import Successful!</p>
                            <p class="text-green-700 text-sm mt-1">
                                Imported: <strong>{{ session('imported') }}</strong> | 
                                Skipped: <strong>{{ session('skipped') }}</strong>
                            </p>
                            @if(count(session('duplicates', [])) > 0)
                                <p class="text-green-600 text-xs mt-2">
                                    Duplicates: {{ implode(', ', session('duplicates')) }}
                                </p>
                            @endif
                        </div>
                    @endif

                    @if(session('queued'))
                        <div class="mb-4 p-4 bg-cyan-50 border border-cyan-200 rounded-lg">
                            <p class="text-cyan-800">{{ session('message') }}</p>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <ul class="text-red-700 text-sm list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.faqs.import') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        
                        {{-- ✅ ADDED COURSE SELECTION (ONLY CHANGE) --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Select Course
                            </label>

                            <select name="course_id" required
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                                <option value="">-- Choose Course --</option>

                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->coursename }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                CSV/TXT File <span class="text-gray-400">(one keyword per line)</span>
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                        <p class="text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">CSV, TXT (MAX. 2MB)</p>
                                    </div>
                                    <input type="file" name="keywords_file" class="hidden" accept=".csv,.txt" required />
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-black text-white font-medium py-3 px-4 rounded-lg hover:bg-gray-800 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                            Upload & Import Keywords
                        </button>
                    </form>

                    {{-- Trigger Generation --}}
                    <form action="{{ route('admin.faqs.generate') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="flex gap-3">
                            <input type="number" name="limit" value="5" min="1" max="20" 
                                   class="w-24 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                            <button type="submit" class="flex-1 bg-cyan-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-cyan-700 transition">
                                🤖 Trigger AI Generation
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Or wait for cron job (runs every minute)</p>
                    </form>
                </div>
            </div>

            {{-- Recent Keywords List --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-black px-6 py-4 flex justify-between items-center">
                    <h2 class="text-white font-semibold text-lg">📋 Recent Keywords</h2>
                    <span class="text-xs text-gray-300">Last 10</span>
                </div>
                
                <div class="divide-y divide-gray-200">
                    @forelse($stats['recent'] as $faq)
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-black truncate">{{ $faq->keyword }}</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    @if($faq->content)
                                        <span class="text-green-600">✓ Published</span>
                                    @else
                                        <span class="text-cyan-600">⏳ Pending</span>
                                    @endif
                                    · {{ $faq->created_at->diffForHumans() }}
                                </p>
                            </div>
                            
                            @if(!$faq->content)
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" 
                                      onsubmit="return confirm('Delete this keyword?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm ml-4">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </div>
                    @empty
                        <div class="p-8 text-center text-gray-500">
                            <p>No keywords uploaded yet.</p>
                            <p class="text-sm mt-1">Upload a CSV file to get started.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Instructions --}}
        <div class="mt-8 bg-cyan-50 border border-cyan-200 rounded-xl p-6">
            <h3 class="text-cyan-900 font-semibold mb-2">📖 How to use:</h3>
            <ol class="list-decimal list-inside text-sm text-cyan-800 space-y-1">
                <li>Prepare a CSV or TXT file with one keyword per line (e.g., "laravel hosting", "php tutorials")</li>
                <li>Upload the file using the form above</li>
                <li>Keywords will be saved with <code>null</code> content</li>
                <li>Cron job automatically generates AI content (or click "Trigger AI Generation")</li>
                <li>Published FAQs appear on <a href="{{ route('faqs.index') }}" class="underline font-medium">/faqs</a></li>
            </ol>
        </div>

    </div>
</div>
@endsection