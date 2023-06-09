<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Employees;

class EmployeeTable extends DataTableComponent
{
    protected $model = Employees::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setTableRowUrl(function($row) {
            return route('to.emp', $row);
        });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Employee Name", "employee_name")
                ->sortable()->searchable(),
            Column::make("Job", "employee_job")
                ->sortable(),
        ];
    }
}
