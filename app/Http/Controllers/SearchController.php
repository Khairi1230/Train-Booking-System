<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Routes;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    //
    function availablebus()
    {
        return view('dashboard.availablebus');
    }
    public function availablebussubmit(Request $request)
    {
        $request->validate([
            'pickup' => 'required',
            'destination' => 'required',
            'travledate' => 'required|date'
        ]);
        $route = Routes::where('pickup', $request->pickup)
            ->where('destination', $request->destination)
            ->first();
        $buses = collect();
        if (!$route) {
            return view('dashboard.availablebus', compact('buses'))
                ->with('message', 'No route found between selected locations');
        }

        $buses = Bus::where('route_id', $route->id)
            ->where('date', $request->travledate)
            ->whereRaw('(seat - (SELECT COALESCE(SUM(CAST(bookings.seat AS UNSIGNED)), 0) FROM bookings WHERE bookings.bus_id = buses.id)) > 0')
            ->get();
        if ($buses->isEmpty()) {
            return view('dashboard.availablebus', compact('buses'))
                ->with('message', 'No buses are available for the selected date and route.');
        }



        return view('dashboard.availablebus', compact('buses'))
            ->with('message', null);
    }


    function tours()
    {
        return view('files.tours');
    }
    function pokharatour()
    {
        return view('files.tours_files.pokhara');
    }
    function chitwantour()
    {
        return view('files.tours_files.chitwan');
    }
    function ilamtour()
    {
        return view('files.tours_files.ilam');
    }
    function contactus()
    {
        return view('files.contact');
    }

    function contactsubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Mail::send([], [], function (Message $message) use ($request) {
            $message->to('biplobkafle21@gmail.com')
                ->subject($request->subject)
                ->html(
                    "<p><strong>Name:</strong> {$request->name}</p>" .
                        "<p><strong>Phone:</strong> {$request->phone}</p>" .
                        "<p><strong>Email:</strong> {$request->email}</p>" .
                        "<p><strong>Message:</strong> {$request->message}</p>"
                );
        });
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
