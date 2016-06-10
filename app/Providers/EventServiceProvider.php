<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\RsvpSaved' => [
            'App\Listeners\SendRsvpEmail',
        ],
        'App\Events\SendSms' => [
            'App\Listeners\SendSmsListener'
        ],
        'App\Events\RsvpRecovered' => [
            'App\Listeners\SendRsvpRecoverEmail'
        ],
        'App\Events\BbqRsvpSaved' => [
            'App\Listeners\SendBbqRsvpEmail'
        ],
        'App\Events\BbqInvite'=>[
            'App\Listeners\SendBbqInvite'
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
