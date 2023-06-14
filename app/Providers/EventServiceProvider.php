<?php

namespace App\Providers;

use App\Events\antrianDelete;
use App\Events\antrianUpdateFlag;
use App\Events\AppointmentHistoryCreated;
use App\Events\CreateTransaction;
use App\Events\DisableAccount;
use App\Events\EmployeeCreated;
use App\Events\RoleChanged;
use App\Listeners\antrian123;
use App\Listeners\AppointmentToHistory;
use App\Listeners\ChangingRole;
use App\Listeners\CreateUserForEmployee;
use App\Listeners\DeleteHistory;
use App\Listeners\DisableEmployee;
use App\Listeners\TransactionCreated;
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
        RoleChanged::class => [
            ChangingRole::class
        ],
        antrianUpdateFlag::class=> [
            antrian123::class
        ],
        DisableAccount::class => [
            DisableEmployee::class
        ],
        antrianDelete::class => [
            DeleteHistory::class
        ],
        CreateTransaction::class => [
            TransactionCreated::class
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
