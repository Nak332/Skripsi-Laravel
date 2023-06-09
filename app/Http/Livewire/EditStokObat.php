<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MedicineDetail;

class EditStokObat extends Component
{

    public $medicine;
    public $currentStock=[];

    public function render()
    {
        return view('livewire.edit-stok-obat');
    }

    public function getStock($id){
        $this->currentStock = MedicineDetail::find($id);
    }
 
   
}
