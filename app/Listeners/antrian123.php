<?php

namespace App\Listeners;

use App\Events\antrianUpdateFlag;
use App\Models\Appointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class antrian123
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
     * @param  \App\Events\antrianUpdateFlag  $event
     * @return void
     */
    public function handle(antrianUpdateFlag $event)
    {
        //
        Log::alert('benar jalan');
        $rekammedis = $event->rekamedis;
        $antriansekarangselesai = Appointment::where('patient_id',$rekammedis->patient_id);
        $antriansekarangselesai->update([
            'status' => 4
        ]);
    }
}
