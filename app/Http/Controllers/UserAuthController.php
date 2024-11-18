<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{

    function usersignup()
    {
        if (Session::has('user_id')) {
            return redirect()->route('userdashboard');
        }

        return view('auth.usersignup');
    }

    function signupsubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'required|numeric|digits:10',
            'password' => 'required|min:6|max:15',
            'address' => 'required'

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        if ($user->save()) {
            return redirect()->route('userlogin')->with('Success', 'Registered succesfully');
        } else {
            return redirect()->route('usersignup')->with('error', 'failed to register user');
        }
    }
    function userlogin()
    {
        if (Session::has('user_id')) {
            return redirect()->route('userdashboard');
        }
        return view('auth.userlogin');
    }
    function loginsubmit(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);
        $data = $request->only('phone', 'password');
        $user = User::where('phone', $data['phone'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {
            Session::put('user_id', $user->id);
            // return redirect()->route('userdashboard')->with('message', 'welcome to the dashboard');
            return redirect()->intended(route('userdashboard'))->with('message', 'Welcome to the dashboard!');
        }
        return redirect()->route('userlogin')->with('error', 'invalid credientils');
    }
    function logout()
    {
        Session::forget('user_id');
        return redirect('/');
    }
    function userdashboard()
    {
        $userId = Session::get('user_id');
        $bookings = Booking::where('user_id', $userId)->get();
        return view('dashboard.userdashboard', compact('bookings'));
    }
}
