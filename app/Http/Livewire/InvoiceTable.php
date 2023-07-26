<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Invoice;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class InvoiceTable extends DataTableComponent
{
    protected $model = Invoice::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setTableAttributes([
            'default'   => false,
            'class'     => 'table table-hover',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Invoice ID", "id")
                ->sortable(),
            Column::make("Customer", "order.user.full_name")
                ->sortable(),
            Column::make("Amount", "amount")
                ->sortable()
                ->format(function ($val) {
                    return '₱' . number_format($val, 2);
                }),
            Column::make("Date", "created_at")
                ->sortable()
                ->format(fn ($val) => Carbon::parse($val)->format('m-d-Y')),
        ];
    }
}
