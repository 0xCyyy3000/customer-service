<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentTable extends DataTableComponent
{
    protected $model = Appointment::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Client", "user.full_name")
                ->sortable(),
            Column::make("Purpose", "purpose")
                ->sortable(),
            Column::make("Appointment Date", "date")
                ->sortable()
                ->format(fn ($val) => Carbon::parse($val)->format('d-M-Y g:i A')),
        ];
    }
}
