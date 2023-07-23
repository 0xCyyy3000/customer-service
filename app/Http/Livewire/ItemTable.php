<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ItemTable extends DataTableComponent
{
    protected $model = Item::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('items.select', ['item' => $row->id]);
            });

        $this->setTableAttributes([
            'default'   => false,
            'class'     => 'table table-hover',
        ]);
    }

    private function getStatusColor($status)
    {
        switch (strtolower($status)) {
            case 'failed':
                return 'crimson';
            case 'in progress':
                return 'orange';
            case 'repaired':
                return 'yellowgreen';
            default:
                return '#0c6dfd';
        }
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable()
                ->hideIf(true),
            Column::make("Model", "model")
                ->sortable()
                ->searchable(),
            Column::make("Description", "description")
                ->sortable()
                ->searchable(),
            Column::make("Serial no", "serial_no")
                ->sortable()
                ->searchable(),
            Column::make("Issue", "issue")
                ->sortable()
                ->searchable(),
            Column::make("Warranty", "has_warranty")
                ->sortable(),
            Column::make("Technician", "technician")
                ->sortable()
                ->searchable()
                ->format(function ($val) {
                    if (strlen($val) > 3)
                        return substr($val, strpos($val, '-') + 1);
                    return $val;
                })->hideIf(Auth::user()->type == 0),
            Column::make("Status", "status")
                ->sortable()
                ->searchable()
                ->format(function ($val) {
                    return "<small class='fw-semibold' style='color: {$this->getStatusColor($val)}'>{$val}<small/>";
                })->html()
        ];
    }
}
