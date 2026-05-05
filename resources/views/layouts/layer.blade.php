<!DOCTYPE html>
<<<<<<< HEAD
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Dynamic SEO --}}
    <title>@yield('seo_title', config('app.name'))</title>
    <meta name="description" content="@yield('seo_description', '')">
    <meta name="keywords" content="@yield('seo_keywords', '')">
    <link href="{{ asset('css/global-header.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="{{ asset('img/logo.png') }}" rel="icon" type="image/png">
    {{-- Optional: OpenGraph / Twitter --}}
    @yield('extra_meta')

    {{-- Styles: Tailwind CDN for quick start (use Vite in production) --}}
    @if(config('app.env') === 'local')
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            cyan: { 400: '#22d3ee', 500: '#06b6d4', 600: '#0891b2', 700: '#0e7490' }
                        }
                    }
                }
            }
        </script>
    @else
        {{-- Production: Compile with Vite --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* Custom Cyan/Black/White utilities */
        .faq-link:hover { border-left-color: #06b6d4; color: #22d3ee; }
        .prose a { color: #0891b2; text-decoration: none; }
        .prose a:hover { text-decoration: underline; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">
     <header class="w-full border-b border-gray-200">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <div style="background: transparent; border: none; padding: 0;" class="flex items-center justify-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Poker Exams Logo" width="45" height="auto" style="object-fit: contain;" loading="eager">
                </div>
                <span class="text-xl font-semibold text-gray-800">Poker Exams</span>
            </a>

            <nav class="hidden md:flex items-center space-x-8 text-gray-600 font-medium">
                <a href="{{ route('home') }}" class="hover:text-gray-900">Home</a>
                <a href="{{ route('library.index') }}" class="hover:text-gray-900">Categories</a>
                <a href="{{ route('how-it-works') }}" class="hover:text-gray-900">How It Works</a>
                <a href="{{ route('about') }}" class="hover:text-gray-900">About</a>
            </nav>

            <div class="flex items-center space-x-4">
    @auth
        <div class="pe-header-profile-wrapper" id="peProfileWrapper">
            <button class="pe-header-profile-btn" id="peProfileBtn">
                <div class="pe-profile-avatar">
                    <span>{{ strtoupper(substr(Auth::user()->full_name ?? 'KS', 0, 2)) }}</span>
                </div>
                <span class="pe-profile-name">{{ explode(' ', Auth::user()->full_name)[0] ?? 'User' }}</span>
                <svg class="pe-profile-chevron" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"></path></svg>
            </button>

            <div class="pe-dropdown-menu pe-dropdown-profile" id="peProfileDropdown">
                <div class="pe-dropdown-header">
                    <p class="pe-dropdown-title">{{ Auth::user()->full_name }}</p>
                    <p class="pe-dropdown-subtitle">{{ Auth::user()->email }}</p>
                </div>
                
                <a class="pe-dropdown-item" href="{{route('dashboard')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path></svg> Dashboard
                </a>
                
                <a class="pe-dropdown-item" href="{{ route('profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile
                </a>
                <a class="pe-dropdown-item" href="{{ route('settings') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg> Settings
                </a>
                <a class="pe-dropdown-item" href="{{ route('payments') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"></rect><line x1="2" x2="22" y1="10" y2="10"></line></svg> My Payments
                </a>
                <div class="pe-dropdown-divider">
                    <form method="POST" action="{{ route('logout') }}" style="margin:0; padding:0;">
                        @csrf
                        <button type="submit" class="pe-dropdown-item pe-dropdown-item-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" x2="9" y1="12" y2="12"></line></svg> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <audio id="peSystemSound" src="{{ asset('storage/sounds/notify.mp3') }}" preload="auto"></audio>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.peCurrentUnread = {{ $unreadCount ?? 0 }};
        </script>
                @endauth
            
                @guest
                    <div class="pe-header-profile-wrapper" id="peProfileWrapper">
                        <button class="pe-header-profile-btn" id="peProfileBtn">
                            <div class="pe-profile-avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <span class="pe-profile-name">Account</span>
                            <svg class="pe-profile-chevron" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </button>
            
                        <div class="pe-dropdown-menu pe-dropdown-profile" id="peProfileDropdown">
                            <div class="pe-dropdown-header">
                                <p class="pe-dropdown-title">Welcome Guest</p>
                                <p class="pe-dropdown-subtitle">Sign in to track your progress</p>
                            </div>
                            <a class="pe-dropdown-item" href="{{ route('login') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" x2="3" y1="12" y2="12"></line></svg> Login
                            </a>
                            <a class="pe-dropdown-item" href="{{ route('register') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><line x1="19" y1="8" x2="19" y2="14"></line><line x1="22" y1="11" x2="16" y2="11"></line></svg> Register
                            </a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </header>
    
    {{-- Optional: Header/Nav --}}
    @includeWhen(view()->exists('partials.header'), 'partials.header')

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Optional: Footer --}}
    @includeWhen(view()->exists('partials.footer'), 'partials.footer')

    {{-- Scripts --}}
    @stack('scripts')
=======
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>{{ $pageData['title'] ?? 'ProctoredTestPro' }}</title>
    
    <meta name="description" content="{{ $pageData['metaDescription'] ?? '' }}">
    <meta name="keywords" content="{{ $pageData['keywords'] ?? '' }}">
    <meta name="robots" content="index, follow">
    <meta name="author" content="ProctoredTestPro">
    
    <link rel="canonical" href="{{ $pageData['canonical'] ?? url('/') }}">
    
    <meta property="og:title" content="{{ $pageData['title'] ?? '' }}">
    <meta property="og:description" content="{{ $pageData['metaDescription'] ?? '' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $pageData['canonical'] ?? url('/') }}">
    <meta property="og:image" content="{{ $pageData['ogImage'] ?? '' }}">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageData['title'] ?? '' }}">
    <meta name="twitter:description" content="{{ $pageData['metaDescription'] ?? '' }}">
    <meta name="twitter:image" content="{{ $pageData['ogImage'] ?? '' }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebSite",
        "name": "ProctoredTestPro",
        "url": "{{ url('/') }}",
        "description": "{{ $pageData['metaDescription'] ?? '' }}",
        "potentialAction": {
            "@@type": "SearchAction",
            "target": "{{ url('/search?q={search_term_string}') }}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
    
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "BreadcrumbList",
        "itemListElement": [{
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
        }]
    }
    </script>
    
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "ProctoredTestPro",
        "url": "{{ url('/') }}",
        "logo": "{{ $pageData['ogImage'] ?? '' }}",
        "contactPoint": {
            "@@type": "ContactPoint",
            "email": "support@proctoredtestpro.com",
            "contactType": "customer service",
            "availableLanguage": ["English"]
        },
        "sameAs": []
    }
    </script>
</head>
<body>
    @yield('content')
    
    <script src="{{ asset('js/app.js') }}"></script>
>>>>>>> main
</body>
</html>