<!DOCTYPE html>
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
</body>
</html>