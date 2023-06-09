<?php

namespace App\Providers;

use App\Events\AppointmentHistoryCreated;
use App\Events\EmployeeCreated;
use App\Listeners\AppointmentToHistory;
use App\Listeners\CreateUserForEmployee;
use App\Models\Employees;
use GuzzleHttp\Promise\Create;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EmployeeCreated::class => [
            CreateUserForEmployee::class,
        ],
        AppointmentHistoryCreated::class => [
            AppointmentToHistory::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
