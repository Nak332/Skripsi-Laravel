<?php

namespace App\Http\Livewire;
use App\Models\MedicineDetail;

use Livewire\Component;

class DeleteStokObat extends Component
{
    public function render()
    {
        return view('livewire.obat-component.delete-stok-obat');
    }
    public $MD;
    public $currentMD;


    public function mount($MD){
        $this->MD = $MD;
        $this->currentMD = $this->MD->medicine_expired_date;
    }

    public function getMD($id){
        $this->currentMD = MedicineDetail::find($id);
    }
}
