<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MedicineDetail;

class EditStokObat extends Component
{

    public $medicine;
    public $medicineDetail;
    public $currentStock;
    public $expiry;

    public function render()
    {
        return view('livewire.edit-stok-obat');
    }

    public function mount($medicine,$medicineDetail){
        $this->medicine = $medicine;
        $this->medicineDetail=$medicineDetail;
        $this->currentStock = $this->medicineDetail->medicine_stock;
        $this->expiry=$medicineDetail->medicine_expired_date;

    }

    public function getStock($id){
        $this->currentStock = MedicineDetail::find($id);
    }
 
   
}
