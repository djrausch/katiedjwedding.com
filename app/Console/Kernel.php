<?php

namespace App\Console;

use App\Rsvp;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*$schedule->call(function () {
            $rsvps = Rsvp::where('updated_at', '>=', Carbon::now()->subDays(1));
            if (!App::environment('local')) {
                $emailAddresses = [];
                $emailAddresses .= 'djrausch3@gmail.com';
                $emailAddresses .= 'ktherrmann@gmail.com';

                Mail::send('emails.rsvp_digest', ['rsvps' => $rsvps], function ($message) use ($emailAddresses) {
                    $message->to($emailAddresses)->subject('RSVP Daily Digest');
                });
            }
        })->daily();*/
    }
}
