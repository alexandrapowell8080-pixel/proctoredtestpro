<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\MonthlyGradeSummary;
use App\Notifications\SystemNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendMonthlyGrades extends Command
{
    protected $signature = 'emails:monthly-grades';
    protected $description = 'Send monthly grade summaries to users';

    public function handle()
    {
        $lastMonth = Carbon::now()->subMonth();

        $users = User::whereHas('notifications', function($query) use ($lastMonth) {
            $query->where('type', SystemNotification::class)
                  ->where('created_at', '>=', $lastMonth);
        })->get();

        foreach ($users as $user) {
            $notifications = $user->notifications()
                ->where('type', SystemNotification::class)
                ->where('created_at', '>=', $lastMonth)
                ->get();

            $summary = [];
            foreach ($notifications as $notification) {
                // Ensure it's an exam grade and the message exists
                if (isset($notification->data['title']) && $notification->data['title'] === 'Exam Graded') {
                    if (isset($notification->data['message'])) {
                        $message = $notification->data['message'];
                        
                        // Extract the exam name and score from the string you built in the controller
                        if (preg_match("/Your results for '(.*)' are ready! You scored (\d+)%\./", $message, $matches)) {
                            $summary[] = [
                                'exam' => $matches[1],
                                'score' => $matches[2] . '%'
                            ];
                        }
                    }
                }
            }

            if (!empty($summary)) {
                $user->notify(new MonthlyGradeSummary($summary));
            }
        }
    }
}