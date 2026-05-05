<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Main Wrapper -->
<div class="min-h-screen bg-[hsl(var(--background))] text-[hsl(var(--foreground))] font-sans p-4 md:p-8">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8">
    
    <!-- Main Content Area -->
    <main class="flex-1 bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] p-6 shadow-sm">
      
      <!-- Title -->
      <h1 class="text-3xl md:text-4xl font-bold text-[hsl(var(--primary))] mb-6">
        The Title of the Blog Post Goes Here
      </h1>

      <!-- Top Section: Image + Text Wrap -->
      <div class="flex flex-col md:flex-row gap-6 mb-8">
        <!-- Image Placeholder -->
        <div class="w-full md:w-1/2 aspect-video bg-[hsl(var(--muted))] rounded-lg flex items-center justify-center border border-[hsl(var(--border))]">
          <span class="text-[hsl(var(--muted-foreground))]">Main Image</span>
        </div>
        
        <!-- Intro/Explanatory Text -->
        <div class="w-full md:w-1/2 flex flex-col gap-4">
          <div class="h-4 bg-[hsl(var(--muted))] rounded w-full"></div>
          <div class="h-4 bg-[hsl(var(--muted))] rounded w-5/6"></div>
          <div class="h-4 bg-[hsl(var(--muted))] rounded w-4/6"></div>
          <div class="h-4 bg-[hsl(var(--muted))] rounded w-full"></div>
        </div>
      </div>

      <!-- Main Long-form Content -->
      <div class="space-y-4 mb-10 text-lg leading-relaxed text-[hsl(var(--card-foreground))]">
        <p>This is where your main article content will live. The layout is designed to flow naturally under the image on mobile and sit comfortably next to it on larger screens.</p>
        <div class="h-4 bg-[hsl(var(--muted))] rounded w-full"></div>
        <div class="h-4 bg-[hsl(var(--muted))] rounded w-full"></div>
        <div class="h-4 bg-[hsl(var(--muted))] rounded w-3/4"></div>
      </div>

      <!-- Navigation: Prev & Next -->
      <div class="flex flex-col sm:flex-row justify-between gap-4 pt-6 border-t border-[hsl(var(--border))]">
        <button class="px-6 py-3 rounded-md bg-[hsl(var(--muted))] text-[hsl(var(--primary))] font-medium hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))] transition-colors">
          ← Previous
        </button>
        <button class="px-6 py-3 rounded-md bg-[hsl(var(--secondary))] text-[hsl(var(--secondary-foreground))] font-medium hover:opacity-90 transition-opacity">
          Next →
        </button>
      </div>
    </main>

    <!-- Sidebar Area -->
    <aside class="w-full lg:w-80 flex flex-col gap-6">
      
      <!-- Related Blogs Card -->
      <div class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] p-5 shadow-sm">
        <h3 class="font-bold text-[hsl(var(--primary))] mb-4 border-b border-[hsl(var(--border))] pb-2">Related Blogs</h3>
        <div class="space-y-4">
          <div class="h-20 bg-[hsl(var(--muted))] rounded-md"></div>
          <div class="h-20 bg-[hsl(var(--muted))] rounded-md"></div>
          <div class="h-20 bg-[hsl(var(--muted))] rounded-md"></div>
        </div>
      </div>

      <!-- Random Blog/Promo Card -->
      <div class="bg-[hsl(var(--card))] rounded-[var(--radius)] border border-[hsl(var(--border))] p-5 shadow-sm">
        <h3 class="font-bold text-[hsl(var(--primary))] mb-4 border-b border-[hsl(var(--border))] pb-2">Random Blog</h3>
        <div class="aspect-square bg-[hsl(var(--muted))] rounded-md mb-3 flex items-center justify-center">
            <span class="text-xs text-[hsl(var(--muted-foreground))]">Featured Thumbnail</span>
        </div>
        <div class="h-4 bg-[hsl(var(--muted))] rounded w-full mb-2"></div>
        <div class="h-4 bg-[hsl(var(--muted))] rounded w-2/3"></div>
      </div>

    </aside>

  </div>
</div>
</body>
</html>