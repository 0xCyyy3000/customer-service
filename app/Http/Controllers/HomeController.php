<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserType;
use App\Models\Appointment;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    const TECHNICIAN_ROLE = 1;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['technicians']]);
    }

    public function technicians()
    {
        $technicians = User::where('type', $this::TECHNICIAN_ROLE)->get(['id', 'full_name']);
        return response()->json($technicians);
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

    public function isAdmin()
    {
        return Auth::user()->type == UserType::ADMIN->value || Auth::user()->type == UserType::TECHNICIAN->value;
    }

    private function getItemList()
    {
        return $this->isAdmin() ?
            Item::limit(5)->get() :
            Item::where('user_id', Auth::user()->id)->latest()->limit(5)->get()->map(function ($row) {
                switch (strtolower($row->status)) {
                    case 'failed':
                        $row->color = 'crimson';
                        break;
                    case 'in progress':
                        $row->color = 'orange';
                        break;
                    case 'repaired':
                        $row->color = 'yellowgreen';
                        break;
                    default:
                        $row->color = 'blue';
                        break;
                }
                return $row;
            });
    }

    public function dashboard()
    {
        $appointments   = $this->isAdmin() ? Appointment::count() : Appointment::where('user_id', Auth::user()->id)->count();
        $items          = $this->isAdmin() ? Item::count() : Item::where('user_id', Auth::user()->id)->count();
        $item_list      = $this->getItemList();

        return view('pages.dashboard', [
            'page'          => 'Dashboard',
            'appointments'  => $appointments,
            'sales'         => 0,
            'orders'        => 0,
            'items'         => $items,
            'customers'     => User::where('type', UserType::CLIENT->value)->count(),
            'technicians'   => User::where('type', UserType::TECHNICIAN->value)->count(),
            'item_list'     => $item_list
        ]);
    }

    public function orders()
    {
        return view('pages.orders', ['page' => 'Orders']);
    }

    public function appointments()
    {
        return view('pages.appointments', ['page' => 'Appointments']);
    }

    public function items()
    {
        return view('pages.items', ['page' => 'Items']);
    }
}
