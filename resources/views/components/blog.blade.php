<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title', 'ProctoredTestPro')</title>
    <meta name="description" content="@yield('description', 'ProctoredTestPro')">
    <meta name="keywords" content="@yield('keywords', 'ProctoredTestPro')">
    <link rel="canonical" href="@yield('canonical', request()->url())">
     <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="{{ asset('img/logo.png') }}" rel="icon" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --background: 200 18% 96%;
            --foreground: 213 60% 14%;
            --card: 0 0% 100%;
            --card-foreground: 213 60% 14%;
            --popover: 0 0% 100%;
            --popover-foreground: 213 60% 14%;
            --primary: 213 60% 14%;
            --primary-foreground: 0 0% 100%;
            --secondary: 175 52% 38%;
            --secondary-foreground: 0 0% 100%;
            --muted: 200 18% 92%;
            --muted-foreground: 213 20% 45%;
            --accent: 175 35% 53%;
            --accent-foreground: 0 0% 100%;
            --destructive: 0 84.2% 60.2%;
            --destructive-foreground: 0 0% 98%;
            --border: 200 18% 88%;
            --input: 200 18% 88%;
            --ring: 175 52% 38%;
            --chart-1: 175 52% 38%;
            --chart-2: 175 35% 53%;
            --chart-3: 213 60% 14%;
            --chart-4: 43 74% 66%;
            --chart-5: 27 87% 67%;
            --radius: 1rem;
            --sidebar-background: 0 0% 98%;
            --sidebar-foreground: 240 5.3% 26.1%;
            --sidebar-primary: 213 60% 14%;
            --sidebar-primary-foreground: 0 0% 98%;
            --sidebar-accent: 240 4.8% 95.9%;
            --sidebar-accent-foreground: 240 5.9% 10%;
            --sidebar-border: 220 13% 91%;
            --sidebar-ring: 175 52% 38%;
        }
    </style>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('partials.header')
    <main class="mt-20">
        {{ $slot }} 
    </main>
   
    @include('partials.footer')
</body>

</html>
