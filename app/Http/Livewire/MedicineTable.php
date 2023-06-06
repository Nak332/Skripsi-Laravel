<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Medicine;

class MedicineTable extends DataTableComponent
{
    protected $model = Medicine::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "medicine_name")
                ->sortable()->searchable(),
            Column::make("Description", "medicine_description")
                ->sortable(),
            Column::make("Price", "medicine_price")
                ->sortable(),
        ];
    }
}
