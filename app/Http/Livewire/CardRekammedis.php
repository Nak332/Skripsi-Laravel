<?php

namespace App\Http\Livewire;

use App\Models\Employees;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Medicine;

class CardRekammedis extends ModalComponent
{
    public RekamMedis $Rekam;
    public Employees $emp;
    public $medicine_id;
    public $medicine_dosis;
    public $medicine_qty;

    public function mount(RekamMedis $Rekam)
    {
        $this->Rekam = $Rekam;
        $this->emp = Employees::find($Rekam->employee_id);
        $this->medicine_id= str_getcsv($Rekam->medicine_id);
        $this->medicine_qty= str_getcsv($Rekam->quantity);
        $this->medicine_dosis= str_getcsv($Rekam->dosis);

    }

    public function render()
    {
        return view('livewire.rekam-vaksin-component.card-rekammedis');
    }

    public static function modalMaxWidth(): string
    {
    return '7xl';
    }



}
