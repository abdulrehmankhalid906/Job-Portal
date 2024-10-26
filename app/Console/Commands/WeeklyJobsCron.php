<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\WeeklyJobsReportNotifiction;

class WeeklyJobsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:weekly-jobs-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly Jobs Report';

    /**
     * Execute the console command.
     */
    public function handle(User $user)
    {
        User::chunk(100, function ($users) {
            foreach ($users as $user) {
                $totalJobs = Job::where('user_id', $user->id)
                    ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                    ->count();
                    
                $user->notify(new WeeklyJobsReportNotifiction($totalJobs));
            }
        });
    }
}
