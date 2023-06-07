<?php

namespace App\Listeners;

use App\Events\RoleChanged;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangingRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RoleChanged  $event
     * @return void
     */
    public function handle(RoleChanged $event)
    {
        $emp = $event->employee;
        $userUpdate = User::where('employee_id',$emp->id);
        $userUpdate->update([
            'role' => $emp->employee_job
        ]);
    }
}
