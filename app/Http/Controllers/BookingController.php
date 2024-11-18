<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    function bookticket()
    {
        $buses = Bus::whereRaw("CONCAT(date, ' ', time) >= ?", [now()])->get();
        return view('auth.booking', compact('buses'));
    }
    function bookticketsubmit(Request $request)
    {

        if (!Session::has('user_id')) {

            return redirect()->guest(route('userlogin'))->with('message', 'Please login to book a ticket');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'seat' => 'required',
            'bus_id' => 'required|exists:buses,id',
        ]);

        $bus = Bus::find($request->bus_id);
        $departureDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $bus->date . ' ' . $bus->time);
        if ($departureDateTime < now()) {
            return redirect()->back()->with('error', 'The departure time of the bus has already passed.');
        }
        $totalBookedSeats = Booking::where('bus_id', $bus->id)->sum('seat');
        $remainingSeats = $bus->seat - $totalBookedSeats;

        if ($remainingSeats >= $request->seat) {
            // Proceed with booking
            Booking::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'seat' => $request->seat,
                'bus_id' => $bus->id,
                'user_id' => Session::get('user_id'),
            ]);

            return redirect()->route('bookticket')->with('message', 'Ticket booked successfully!');
        } else {
            return redirect()->back()->with('message', 'Not enough seats available.' . $remainingSeats . ' seats left.');
        }
    }
    function cancelbooking($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }
        $busDepartureDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->bus->date . ' ' . $booking->bus->time);
        $currentTime = now();
        if ($currentTime->lessThan($busDepartureDateTime)) {
            $bus = $booking->bus;
            $bus->seat += $booking->number_of_tickets;
            $bus->save();
        }

        $booking->delete();
        return redirect()->back()->with('success', 'Booking has been cancelled succesfully');
    }
    function editbooking($id)
    {
        $booking = Booking::findOrFail($id);
        $bus = $booking->bus;
        $availableSeats = range(1, $bus->seat);
        return view('dashboard.edit', compact('booking', 'availableSeats'));
    }
    function updatebooking(Request $request, $id)
    {
        // dd(request()->all());
        $booking = Booking::findOrFail($id);

        $request->validate([
            'seat' => 'required',
        ]);
        $bus = Bus::find($booking->bus_id);

        $totalBookedSeats = Booking::where('bus_id', $bus->id)
            ->where('id', '!=', $booking->id)
            ->sum('seat');
        // $totalCapacity = $bus->seat;
        $remainingSeats = $bus->seat - $totalBookedSeats;
        $requestedSeats = $request->input('seat');
        if ($requestedSeats > $remainingSeats + $booking->seat) {
            return redirect()->back()->with('message', 'Not enough seats available.' . $remainingSeats . ' seats left.');
        }

        $booking->seat = $requestedSeats;
        $booking->save();
        return redirect()->route('userdashboard')->with('success', 'Booking updated successfully.');
    }
}
