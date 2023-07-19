<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\User;
use App\Enums\UserType;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $appointments =
            Auth::user()->type == UserType::ADMIN->value || Auth::user()->type == UserType::TECHNICIAN->value ?
            Appointment::count() : Appointment::where('user_id', Auth::user()->id)->count();

        return view('pages.dashboard', [
            'page'          => 'Dashboard',
            'appointments'  => $appointments,
            'sales'         => 0,
            'orders'        => 0,
            'items'         => 0,
            'customers'     => User::where('type', UserType::CLIENT->value)->count(),
            'technicians'   => User::where('type', UserType::TECHNICIAN->value)->count()
        ]);
    }

    public function orders()
    {
        return view('pages.orders', ['page' => 'Orders']);
    }

    public function appointments()
    {
        $slots = [9, 10, 11, 12, 1, 2, 3, 4, 5];

        return view('pages.appointments', ['page' => 'Appointments']);
    }
}
