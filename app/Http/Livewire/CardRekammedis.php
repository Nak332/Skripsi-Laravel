<?php

namespace App\Http\Livewire;

use App\Models\Employees;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CardRekammedis extends ModalComponent
{
    public RekamMedis $Rekam;
    public Employees $emp;

    public function mount(RekamMedis $Rekam)
    {
        $this->Rekam = $Rekam;
        $this->emp = Employees::find($Rekam->employee_id);
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
