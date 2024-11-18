<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Owner;
use App\Models\Routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class OwnerController extends Controller
{
    function ownersignup()
    {
        if (Session::has('owner_id')) {
            return redirect()->route('ownerdashboard');
        }
        return view('owners.ownersignup');
    }

    function ownersignupsubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'required|digits:10',
            'password' => 'required',
            'address' => 'required'
        ]);

        $owner = new Owner();
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->phone = $request->phone;
        $owner->password = $request->password;
        $owner->address = $request->address;

        if ($owner->save()) {
            return redirect()->route('ownerlogin')->with('Success', 'Owner register Succesfully');
        } else {
            return redirect()->route('ownersignup')->with('Failed', 'Failed to register');
        }
    }
    function ownerlogin()
    {
        if (Session::has('owner_id')) {
            return redirect()->route('ownerdashboard');
        }
        return view('owners.ownerlogin');
    }
    function ownerloginsubmit(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:10',
            'password' => 'required'

        ]);
        $data = $request->only('phone', 'password');
        $owner = Owner::where('phone', $data['phone'])->first();
        if ($owner && $data['password']) {
            Session::put('owner_id', $owner->id);
            return redirect()->route('ownerdashboard')->with('message', 'login succesfull');
        } else {
            return redirect()->route('ownerlogin')->with('message', 'login failed');
        }
    }
    function ownerlogout()
    {
        Session::forget('owner_id');
        return redirect()->route('ownerlogin');
    }
    function ownerdashboard()
    {
        $ownerId = session('owner_id');
        $buses = Bus::where('owner_id', $ownerId)->with('routes')->get();
        return view('owners.ownerdashboard', compact('buses'));
    }
    function addbus()
    {
        $routes = Routes::all();
        return view('owners.addbus', compact('routes'));
    }
    function addbussubmit(Request $request)
    {
        $request->validate([
            'bus_name' => 'required|string',
            'route_id' => 'required|exists:routes,id',
            'seat' => 'required|integer',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required'
        ]);
        Bus::create([
            'bus_name' => $request->bus_name,
            'route_id' => $request->route_id,
            'seat' => $request->seat,
            'price' => $request->price,
            'date' => $request->date,
            'time' => $request->time,

            'owner_id' => session('owner_id')
        ]);

        return redirect()->route('ownerdashboard')->with('Success', 'Bus added successfully');
    }
    function availableseat()
    {
        $ownerId = session('owner_id');
        if (!$ownerId) {
            return redirect('/login')->with('error', 'Please log in.');
        }
        $buses = Bus::with('bookings')->where('owner_id', $ownerId)->get();

        return view('dashboard.ownerdashboard', compact('buses'));
    }
}
