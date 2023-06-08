<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class TambahStokObat extends Component
{

    public $medicine;
    public $medicineDetail;

    public function render()
    {
        return view('livewire.tambah-stok-obat');
    }
}
