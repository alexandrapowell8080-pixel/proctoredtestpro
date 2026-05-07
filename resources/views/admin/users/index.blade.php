@extends('layouts.admin')

@section('seo_title', 'Manage Admins')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    <header
        class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-[hsl(var(--border))] pb-5 gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">System Administrators</h1>
            <p class="text-sm text-[hsl(var(--muted-foreground))] mt-1">Manage users with dashboard access.</p>
        </div>
        <a href="{{ route('admin.users.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
            + Add Admin
        </a>
    </header>

    @if(session('success'))
    <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm font-medium">
        ✅ {{ session('success') }}
    </div>
    @endif
    @if(session('success_delete'))
    <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm font-medium">
        🗑️ {{ session('success_delete') }}
    </div>
    @endif
    @if(session('error'))
    <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm font-medium">
        ⚠️ {{ session('error') }}
    </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[600px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-5 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-5 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-5 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($admins as $admin)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-5 py-4 text-sm font-medium text-gray-900">{{ $admin->name }}</td>
                        <td class="px-5 py-4 text-sm text-gray-600">{{ $admin->email }}</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="{{ route('admin.users.edit', $admin->id) }}"
                                class="text-sm font-medium text-blue-600 hover:text-blue-800 bg-blue-50 px-3 py-1.5 rounded-md">Edit</a>

                            @if(auth()->id() !== $admin->id)
                            <form action="{{ route('admin.users.destroy', $admin->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Remove this admin?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-sm font-medium text-red-600 hover:text-red-800 bg-red-50 px-3 py-1.5 rounded-md">Del</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-5 py-4 border-t border-gray-200">
            {{ $admins->links() }}
        </div>
    </div>
</div>
@endsection