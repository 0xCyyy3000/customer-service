<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Enums\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    private function isAdmin()
    {
        return Auth::user()->type == UserType::ADMIN->value || Auth::user()->type == UserType::TECHNICIAN->value;
    }

    private function isOwner($item)
    {
        return $item->user_id == Auth::user()->id;
    }

    public function item($item)
    {
        $item = $this->isAdmin() ? Item::findOrFail($item) : Item::where('user_id', Auth::user()->id)->where('id', $item)->first();

        if (!$item)
            return abort(404);

        return view('pages.item', [
            'page' => $item->model,
            'item' => $item
        ]);
    }

    public function update(Request $request)
    {
        $item = Item::findOrFail($request->item);
        if (!$this->isAdmin() && $this->isOwner($item)) {
            $item->update([
                'model'         => $request->model,
                'description'   => $request->description,
                'serial_no'     => $request->serial_no,
                'issue'         => $request->issue,
                'accessories'   => $request->accessories
            ]);
            return back()->with('alert', 'Changes have been saved!');
        } elseif ($this->isAdmin()) {
            $given_id = substr($request->technician, 1, strpos($request->technician, '-') - 1);
            if (!User::find($given_id))
                return back()->with('alert', "A problem was occured, please try again. Did you assigned a technician?");

            $item->update([
                'has_warranty'  => $request->has_warranty ? 1 : 0,
                'status'        => $request->status,
                'technician'    => $given_id,
                'accessories'   => $request->accessories
            ]);
            return back()->with('alert', 'Changes have been saved!');
        }

        return back()->with('alert', 'A problem was occured, please try again.');
    }
}
