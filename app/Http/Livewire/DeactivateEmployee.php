<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employees;

class DeactivateEmployee extends Component
{

    public $employee;
    public $currentEmployee;

    public function render()
    {
        return view('livewire.deactivate-employee');
    }

    public function mount($employee){
        $this->employee = $employee;
        $this->currentEmployee= $employee->employee_name;

    }
    public function getEmployee($id){
        $this->currentEmployee = Employees::find($id);
    }
}
