<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\WeeklyMail;
use Illuminate\Console\Command;

class UpdateJobStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-job-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach($users as $user)
        {
            $user->notify(new WeeklyMail());
        }
    }
}
