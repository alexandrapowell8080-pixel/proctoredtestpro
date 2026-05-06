<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('seo_title', 'Admin Dashboard')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script> {{-- Assuming Tailwind is active based on your blade classes
    --}}
</head>

<body class="bg-[hsl(var(--muted))] text-[hsl(var(--foreground))] antialiased min-h-screen flex">

    {{-- Mobile Sidebar Overlay --}}
    <div id="mobile-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden transition-opacity"></div>

    {{-- Admin Sidebar --}}
    <aside id="admin-sidebar"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-[hsl(var(--card))] border-r border-[hsl(var(--border))] transform -translate-x-full lg:translate-x-0 lg:static lg:flex-shrink-0 transition-transform duration-300 ease-in-out flex flex-col h-screen">
        <div class="h-16 flex items-center px-6 border-b border-[hsl(var(--border))]">
            <div
                class="logo-icon w-8 h-8 rounded-lg bg-[hsl(var(--primary))] text-white flex items-center justify-center font-bold text-sm shadow-sm mr-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <span class="font-extrabold tracking-tight text-lg" style="font-family: 'Space Grotesk', sans-serif;">System
                Admin</span>
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <a href="{{ route('admin.faqs.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[hsl(var(--secondary))] text-[hsl(var(--accent))] font-medium transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
                FAQ Engine
            </a>
            
        </nav>
    </aside>

    {{-- Main Content Area --}}
    <div class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden">
        {{-- Mobile Header --}}
        <header
            class="lg:hidden h-16 bg-[hsl(var(--card))] border-b border-[hsl(var(--border))] flex items-center justify-between px-4 z-30">
            <span class="font-extrabold text-lg">Admin</span>
            <button id="mobile-menu-btn"
                class="p-2 text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--foreground))]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </header>

        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>
    </div>

    <script>
        // Simple mobile menu toggle
        const btn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('mobile-overlay');

        function toggleMenu() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        if(btn) btn.addEventListener('click', toggleMenu);
        if(overlay) overlay.addEventListener('click', toggleMenu);
    </script>
</body>

</html>