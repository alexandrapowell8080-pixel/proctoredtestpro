<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Faq;
use App\Services\AIBlogGenerator;
use App\Services\AIFaqGenerator;
use Illuminate\Support\Str;

// #[Signature('app:generate-faq-content')]
// #[Description('Command description')]
class GenerateBlogContent extends Command
{
    protected $signature = 'blogs:generate {--limit=5 : Max Blogs to process per run}';
    protected $description = 'Generate AI content for pending Blogs keywords';

    public function __construct(protected AIBlogGenerator $ai) { parent::__construct(); }

    public function handle()
    {
        $pending = Blog::where('status',Blog::NEW)->limit(5)->get();
        if ($pending->isEmpty()) {
            $this->info('✨ No pending Blogs to generate.');
            return Command::SUCCESS;
        }

        $this->info("🤖 Processing {$pending->count()} Blogs...");

        foreach ($pending as $blog) {
            try {
                $this->line("⏳ Generating: {$blog->keywords}");
                $data = $this->ai->generate($blog->keywords);

                // Handle slug collisions cleanly
                $baseSlug = Str::slug($data['title']);
                $slug = $baseSlug;
                $i = 1;
                while (Blog::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                    $slug = $baseSlug . '-' . $i++;
                }
                $data['slug'] = $slug;
                $data['status'] = Blog::DRAFT;

                $blog->update($data);
                $this->info("✅ Saved: {$blog->title}");

                // Rate limit padding (adjust based on your OpenAI plan)
                sleep(3);
            } catch (\Exception $e) {
                $this->error("❌ Failed {$blog->keyword}: {$e->getMessage()}");
            }
        }

        return Command::SUCCESS;
    }
}
