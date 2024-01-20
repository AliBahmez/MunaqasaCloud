<?php

namespace App\Providers;

use App\Models\Core\CoreModuleEventListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Models\Core\CoreEventListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        'Illuminate\Foundation\Http\Events\RequestHandled' => [
            // 'App\Listeners\Profile\AddProfileFieldsToUser',
        ],
        'App\Events\Account\UserSignedInEvent' => [
            'App\Listeners\Account\SendEmailToUserListener',
        ],
        'App\Events\Account\UserSignedOutEvent' => [
            'App\Listeners\Account\SendEmailToUserListener',
        ],
    ];
    

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();

        // Load the event-listener mappings from the database
        // $eventListeners = CoreModuleEventListener::all();

        // // Register the event-listener mappings
        // foreach ($eventListeners as $eventListener) {
        //     $this->listen[$eventListener->event][] = $eventListener->listener;
        // }
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
