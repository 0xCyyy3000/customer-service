<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class AppointmentController extends Controller
{
    private function getSlots($start, $end)
    {
        $available_hours = ['08 AM', '09 AM', '10 AM', '11 AM', '01 PM', '02 PM', '03 PM', '04 PM'];
        // $available_hours = ['09 AM', '01 PM', '03 PM'];

        $slots = Appointment::whereDate('start', '>=', $start)->whereDate('end', '<=', $end)->get();
        foreach ($slots as $slot) {
            $taken_hour = Carbon::parse($slot->start)->format('h A');
            $index      = array_search($taken_hour, $available_hours);

            if ($index >= 0)
                unset($available_hours[$index]);
        }

        return $available_hours;
    }

    private function getAppointments($request, $client = false)
    {
        if ($client) {
            return Appointment::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                // ->where('user_id', Auth::user()->id)
                ->get(['id', 'user_id', 'title', 'start'])
                ->map(function ($row) {
                    if ($row->user_id != Auth::user()->id) {
                        $row->title = 'Taken';
                        $row->color = 'tomato';
                    } else {
                        $row->color = '#0d6efd';
                        $row->title = "{$row->title} - EDS Zamora Tacloban";
                    }

                    return $row;
                });
        }

        return Appointment::whereDate('start', '>=', $request->start)
            ->whereDate('end', '<=', $request->end)->get(['id', 'user_id', 'title', 'start'])
            ->map(function ($row) {
                $row->title = User::findOrFail($row->user_id)->full_name . " - {$row->title}";
                $row->color = 'tomato';
                return $row;
            });
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            switch ($request->type) {
                case 'getSlots':
                    $data = $this->getSlots($request->start, $request->end);
                    break;

                default:
                    if (Auth::user()->type == UserType::ADMIN->value ||  Auth::user()->type == UserType::TECHNICIAN->value)
                        $data = $this->getAppointments($request);
                    else
                        $data = $this->getAppointments($request, true);
                    break;
            }

            return response()->json($data);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_date'  => 'required',
            'appointment_time'  => 'required',
            'purpose'           => 'required',
        ]);

        $date_time = Carbon::parse($request->appointment_date . Carbon::parse($request->appointment_time)->format('H:00:00'));

        Appointment::create([
            'user_id'   => $request->client,
            'title'     => $request->purpose,
            'start'     => $date_time,
            'end'       => $date_time
        ]);

        return redirect()->back()->with('success', 'Appointment submitted!');
    }
}
