<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Patient;

class PatientTable extends DataTableComponent
{
    protected $model = Patient::class;

    public function configure(): void
{
    $this->setPrimaryKey('id');
        // ->setTableRowUrl(function($row) {
        //     return route('pasien', $row);
        // })
        // ->setTableRowUrlTarget(function($row) {
        //     if ($row->isExternal()) {
        //         return '_blank';
        //     }

        //     return '_self';
        // });
}
    public function columns(): array
    {
        return [

            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nama", "patient_name")
                ->sortable()
                ->searchable(),
            Column::make("Jenis Kelamin", "patient_gender")
                ->sortable(),
            Column::make("Alamat", "patient_address")
                ->sortable(),
            Column::make("No. Telp", "patient_phone")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),

        ];
    }
}
