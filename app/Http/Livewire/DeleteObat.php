<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Medicine;

class DeleteObat extends Component
{
    public $medicine;
    public $currentMedicine;

    public function render()
    {
        return view('livewire.delete-obat');
    }

    public function mount($medicine){
        $this->medicine = $medicine;
        $this->currentMedicine = $this->medicine->medicine_name;
    }

    public function getMedicine($id){
        $this->currentMedicine = Medicine::find($id);
    }
}
