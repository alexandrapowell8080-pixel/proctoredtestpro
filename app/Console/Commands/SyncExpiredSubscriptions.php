<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SyncExpiredSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:sync-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for expired subscriptions, notify users, and update status to expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $successCount = 0;

        // Fetch non-expired subscriptions that have passed their end date
        $expiredSubscriptions = DB::table('subscriptions as s')
            ->join('users as u', 's.user_id', '=', 'u.id')
            ->join('courses as c', 's.course_id', '=', 'c.id')
            // ADDED: 'c.slug as course_slug' to the select statement
            ->select('s.id', 's.user_id', 'u.email', 'u.full_name as names', 'c.coursename as course', 'c.slug as course_slug')
            ->where('s.end_date', '<=', $now)
            ->where('s.status', '!=', 'expired')
            ->get();

        if ($expiredSubscriptions->isEmpty()) {
            $this->info('No newly expired subscriptions found.');
            return Command::SUCCESS;
        }

        foreach ($expiredSubscriptions as $sub) {
            
            // Construct the valid URL using the slug matching the web.php checkout route
            $renewalUrl = url("/subscribe/{$sub->course_slug}");

            $body = "Hello {$sub->names},<br>
                Your subscription to <strong>{$sub->course}</strong> has expired. Renewing takes less than a minute and keeps everything exactly where you left off:
                <ul>
                    <li>All progress, notes, and bookmarked questions stay intact</li>
                    <li>You’ll pick up today with the next custom quiz instead of starting over</li>
                    <li>Same 100%-pass guarantee and updated 2025 question banks.</li>
                </ul>
                You can renew your package <a href='{$renewalUrl}'>by clicking here</a>.<br><br>
                <p>You can also reply to this email if you need assistance renewing your subscription.<br>
                Thank you for choosing Poker Exams for your exam preparations.</p>
                Best regards,<br>
                <b><i>Poker Exams Support Team</i></b>";

            try {
                // Send the email
                Mail::html($body, function ($message) use ($sub) {
                    $message->to($sub->email, $sub->names)
                            ->subject('SUBSCRIPTION EXPIRY FOR POKER EXAMS');
                });

                // Only mark as expired if email was sent successfully
                DB::table('subscriptions')
                    ->where('id', $sub->id)
                    ->update([
                        'status' => 'expired',
                        'updated_at' => now()
                    ]);

                $successCount++;
                
            } catch (\Exception $e) {
                // Log the error so it doesn't break the loop for other users
                Log::error("Failed to send expiry email to {$sub->email}: " . $e->getMessage());
                $this->error("Failed to process subscription ID {$sub->id} for {$sub->email}");
            }
        }

        $this->info("Sync was successful. {$successCount} account(s) expired and notified.");
        return Command::SUCCESS;
    }
}