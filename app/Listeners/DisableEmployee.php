<?php

namespace App\Listeners;

use App\Events\DisableAccount;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DisableEmployee
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
     * @param  \App\Events\DisableAccount  $event
     * @return void
     */
    public function handle(DisableAccount $event)
    {
        $karyawan = $event->employee;
        $user = User::where('employee_id', $karyawan->id);
        $user->update([
            'status' => 0
        ]);
    }
}
