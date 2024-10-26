<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\WeeklyMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\View\Components\Info;

class UpdateJobStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email-to-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending the mail to all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Log::info("Cron is started!");

        Log::info("Loop is started!");
        $users = User::all();

        foreach($users as $user)
        {
            $user->notify(new WeeklyMail());
        }

        Log::info("Loop is ended!");
    }
}
