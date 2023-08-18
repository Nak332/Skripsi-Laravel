<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AntrianController;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Transaction;
use App\Models\Vaksin;
use Carbon\Carbon;
use Livewire\Component;

class DashboardMainComponent extends Component
{

    public $antrian_stats;
    public $patient_stats;
    public $vaksin_list;
    public $currentdate;
    public $transaction_list;
    public $count = 0;
    public $target = 100;


    public function mount(){
        $this->antrian_stats = Appointment::where('status','1')->count();
        $this->patient_stats  = Patient::all()->count();
        $this->currentdate = Carbon::now()->format('Y-m-d');
        $this->vaksin_list= Vaksin::where('next_dose', '>', $this->currentdate)
        ->whereNotNull('next_dose')->orderBy('next_dose')
        ->get();
        $this->count = $this->target;
        $this->transaction_list = Transaction::where('created_at', '>=', $this->currentdate)->get();
        
    
    }

    public function startCounting()
{
    $duration = 2000; // The duration of the counting animation in milliseconds
    $increment = $this->target / ($duration / 1000); // Calculate the increment per second

    $interval = floor($this->target / $increment); // Number of iterations

    $this->count = 0;

    for ($i = 1; $i <= $interval; $i++) {
        usleep($duration * 1000 / $interval); // Delay between iterations

        $this->count = $increment * $i;

        $this->emit('countUpdated', $this->count); // Emit event to update the count
    }
}


    public function updated()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->currentdate = Carbon::now()->format('Y-m-d');
    
        $this->vaksin_list =Vaksin::where('next_dose', '>', $this->currentdate)
        ->whereNotNull('next_dose')
        ->pluck('id');
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-main-component');
    }
}
