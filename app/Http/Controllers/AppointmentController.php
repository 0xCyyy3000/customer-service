<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->type == UserType::ADMIN->value && $request->ajax()) {
            $data = Appointment::get()->map(function ($row) {
                // dd($row->user->full_name);
                // return $row->user->full_name;
                $row->full_name = $row->user->full_name;
                return $row;
            });
            return response()->json($data);
        }
    }
}
