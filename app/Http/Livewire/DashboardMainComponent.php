<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AntrianController;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Vaksin;
use Carbon\Carbon;
use Livewire\Component;

class DashboardMainComponent extends Component
{

    public $antrian_stats;
    public $patient_stats;
    public $vaksin_list;
    public $currentdate;

    public function mount(){
        $this->antrian_stats = Appointment::where('status','2')->count();
        $this->patient_stats = Patient::all()->count();
        $this->currentdate = Carbon::now()->format('Y-m-d');
        $this->vaksin_list= Vaksin::where('next_dose', '>', $this->currentdate)
        ->whereNotNull('next_dose')
        ->pluck('id');
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
