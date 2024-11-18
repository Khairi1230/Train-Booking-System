<?php

namespace App\Http\Controllers;

use App\Models\ReservationModel;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    function reservation()
    {
        return view('files.reservation');
    }
    function reservationsubmit(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
            'date' => 'required|date',
            'passenger_no' => 'required|integer',
            'pickup' => 'required|string',
            'destination' => 'required|string',
            'duration_type' => 'required|string',
            'comment' => 'nullable|string'
        ]);
        ReservationModel::create($request->all());
        return redirect()->route('reservation')->with('success', 'Succesfully creted reservation');
    }
}
