@extends('layouts.admin')
@section('seo_title', 'Create Admin')
@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <header class="flex items-center justify-between border-b border-[hsl(var(--border))] pb-5">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Add Administrator</h1>
        </div>
        <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900">&larr;
            Back to List</a>
    </header>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 sm:p-8">
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="pt-4 border-t border-gray-200 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white font-bold py-2.5 px-6 rounded-lg hover:bg-blue-700 transition-colors shadow-sm">Save
                    User</button>
            </div>
        </form>
    </div>
</div>
@endsection