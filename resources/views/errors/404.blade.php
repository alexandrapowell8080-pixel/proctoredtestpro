<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('partials.header')
    <div style="min-height: 90vh; display: flex; align-items: center; justify-content: center; padding: 2rem; overflow: hidden; position: relative; font-family: sans-serif; background-color: hsl(var(--background));">
    
    <h1 style="position: absolute; font-size: clamp(15rem, 40vw, 30rem); font-weight: 900; color: hsl(var(--primary)); opacity: 0.03; letter-spacing: -0.05em; user-select: none; z-index: 0; margin: 0;">
        404
    </h1>

    <div style="position: relative; z-index: 10; text-align: center; max-width: 500px;">
        
        <div style="width: 100px; height: 100px; background: hsl(var(--card)); border: 1px solid hsl(var(--border)); border-radius: 24px; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; box-shadow: 0 20px 40px rgba(0,0,0,0.1); transform: rotate(-6deg);">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 48px; height: 48px; color: hsl(var(--primary));" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <h2 style="font-size: 2.25rem; font-weight: 800; color: hsl(var(--foreground)); margin-bottom: 1rem; letter-spacing: -0.025em;">
            Lost in the digital woods?
        </h2>
        
        <p style="font-size: 1.125rem; color: hsl(var(--muted-foreground)); line-height: 1.6; margin-bottom: 2.5rem;">
            The page you're looking for has moved or no longer exists. Don't worry, even the best explorers get lost sometimes.
        </p>

        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="{{ url('/') }}" style="text-decoration: none; padding: 0.875rem 2rem; background-color: hsl(var(--primary)); color: hsl(var(--primary-foreground)); border-radius: 9999px; font-weight: 700; font-size: 0.875rem; box-shadow: 0 10px 15px -3px hsla(var(--primary), 0.3); transition: transform 0.2s ease;">
                Back to Homepage
            </a>
            
            <button onclick="window.history.back()" style="cursor: pointer; padding: 0.875rem 2rem; background-color: hsl(var(--secondary)); color: hsl(var(--secondary-foreground)); border: 1px solid hsl(var(--border)); border-radius: 9999px; font-weight: 700; font-size: 0.875rem; transition: background-color 0.2s ease;">
                Go Back
            </button>
        </div>

        <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid hsl(var(--border));">
            <p style="font-size: 0.875rem; font-weight: 600; color: hsl(var(--muted-foreground)); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1rem;">
                Try these instead
            </p>
            <div style="display: flex; justify-content: center; gap: 1.5rem;">
                <a href="{{ route('blogs') }}" style="color: hsl(var(--primary)); font-size: 0.875rem; text-decoration: none; font-weight: 500;">Latest Blogs</a>
                <a href="{{ route('faqs.index') }}" style="color: hsl(var(--primary)); font-size: 0.875rem; text-decoration: none; font-weight: 500;">Latest Faq</a>
            </div>
        </div>
    </div>
</div>
    @include('partials.footer')
</body>
</html>
