<?php

namespace App\Listeners;

use App\Events\antrianDelete;
use App\Models\Appointment;
use App\Models\AppointmentHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteHistory
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
     * @param  \App\Events\antrianDelete  $event
     * @return void
     */
    public function handle(antrianDelete $event)
    {
        $antrian = $event->antrian;
        $history = AppointmentHistory::where('appointment_id',$antrian->id)->where('patient_id',$antrian->patient_id)->where('appointment_date',$antrian->appointment_date)->first();
        $history->delete();
    }
}
