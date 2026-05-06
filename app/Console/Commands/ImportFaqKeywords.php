<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Faq;
use Illuminate\Support\Facades\File;

#[Signature('app:import-faq-keywords')]
#[Description('Command description')]
class ImportFaqKeywords extends Command
{
    // Added optional category_id argument
    protected $signature = 'faqs:import {file : Path to CSV file} {category_id? : Optional Category ID to attach to these keywords}';
    protected $description = 'Bulk import FAQ keywords from CSV';

    public function handle()
    {
        $file = $this->argument('file');
        $categoryId = $this->argument('category_id');

        if (!File::exists($file)) {
            $this->error("File not found: {$file}");
            return Command::FAILURE;
        }

        $rows = array_map('str_getcsv', File::lines($file));
        $imported = $skipped = 0;

        foreach ($rows as $index => $row) {
            $keyword = trim($row[0] ?? '');
            if (empty($keyword)) continue;

            if (Faq::where('keyword', $keyword)->where('category_id', $categoryId)->exists()) {
                $skipped++;
                continue;
            }

            Faq::create([
                'keyword' => $keyword, 
                'category_id' => $categoryId,
                'title' => null, 
                'slug' => null, 
                'description' => null, 
                'content' => null
            ]);
            
            $imported++;
        }

        $this->info("✅ Imported: {$imported} | ⏭️ Skipped: {$skipped}");
        return Command::SUCCESS;
    }
}