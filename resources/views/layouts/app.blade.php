<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('seo_title', $pageData['title'] ?? config('app.name', 'ProctoredTestPro'))</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.jpeg') }}">
    <meta name="description" content="@yield('seo_description', $pageData['metaDescription'] ?? '')">
    <meta name="keywords" content="@yield('seo_keywords', $pageData['keywords'] ?? '')">
    <meta name="robots" content="index, follow">
    <meta name="author" content="ProctoredTestPro">

    <link rel="canonical" href="{{ $pageData['canonical'] ?? url('/') }}">

    <meta property="og:title" content="{{ $pageData['title'] ?? '' }}">
    <meta property="og:description" content="{{ $pageData['metaDescription'] ?? '' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $pageData['canonical'] ?? url('/') }}">
    <meta property="og:image" content="{{ $pageData['ogImage'] ?? '' }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageData['title'] ?? '' }}">
    <meta name="twitter:description" content="{{ $pageData['metaDescription'] ?? '' }}">
    <meta name="twitter:image" content="{{ $pageData['ogImage'] ?? '' }}">

    @yield('extra_meta')

    {{-- Favicons --}}
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="{{ asset('img/logo.png') }}" rel="icon" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">

   
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/global-header.css') }}" rel="stylesheet">

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
   
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    {{-- Custom Utility Styles --}}
    <style>
        .faq-link:hover {
            border-left-color: #06b6d4;
            color: #22d3ee;
        }

        .prose a {
            color: #0891b2;
            text-decoration: none;
        }

        .prose a:hover {
            text-decoration: underline;
        }
    </style>

  
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

<body class="bg-white text-gray-900 antialiased">

    @includeWhen(view()->exists('partials.header'), 'partials.header')

    <main class="min-h-screen">
        @yield('content')
    </main>

   
    @includeWhen(view()->exists('partials.footer'), 'partials.footer')

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

</body>

</html>
