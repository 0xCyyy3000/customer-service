<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

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
        return view('pages.dashboard', ['page' => 'Dashboard']);
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
