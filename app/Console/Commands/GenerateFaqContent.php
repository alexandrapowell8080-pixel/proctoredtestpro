<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Faq;
use App\Services\AIFaqGenerator;
use Illuminate\Support\Str;

// #[Signature('app:generate-faq-content')]
// #[Description('Command description')]
class GenerateFaqContent extends Command
{
    protected $signature = 'faqs:generate {--limit=5 : Max FAQs to process per run}';
    protected $description = 'Generate AI content for pending FAQ keywords';

    public function __construct(protected AIFaqGenerator $ai) { parent::__construct(); }

    public function handle()
    {
        $pending = Faq::pending()->limit($this->option('limit'))->get();
        if ($pending->isEmpty()) {
            $this->info('✨ No pending FAQs to generate.');
            return Command::SUCCESS;
        }

        $this->info("🤖 Processing {$pending->count()} FAQs...");

        foreach ($pending as $faq) {
            try {
                $this->line("⏳ Generating: {$faq->keyword}");
                $data = $this->ai->generate($faq->keyword);

                // Handle slug collisions cleanly
                $baseSlug = Str::slug($data['title']);
                $slug = $baseSlug;
                $i = 1;
                while (Faq::where('slug', $slug)->where('id', '!=', $faq->id)->exists()) {
                    $slug = $baseSlug . '-' . $i++;
                }
                $data['slug'] = $slug;

                $faq->update($data);
                $this->info("✅ Saved: {$faq->title}");

                // Rate limit padding (adjust based on your OpenAI plan)
                sleep(3);
            } catch (\Exception $e) {
                $this->error("❌ Failed {$faq->keyword}: {$e->getMessage()}");
            }
        }

        return Command::SUCCESS;
    }
}
