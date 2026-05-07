<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('faqs:generate --limit=2')
    ->cron('0 6,10,14,18,22 * * *')
    ->withoutOverlapping()
    ->appendOutputTo(storage_path('logs/faq-generator.log'));
Schedule::command('blogs:generate --limit=1')
    ->cron('0 4,8,12,16,20 * * *')
    ->withoutOverlapping()
    ->appendOutputTo(storage_path('logs/blog-generator.log'));