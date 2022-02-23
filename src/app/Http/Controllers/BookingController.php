<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {
        $bookings = Booking::all();

        return view('admin.bookings.create', ['bookings' => $bookings]);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        Booking::create($data);

        return redirect()->route('admin.rooms.show', ['room' => $request->room_id]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $booking = Booking::find($id);
        $booking->update($data);

        return redirect()->route('admin.bookings.index', ['booking' => $id]);
    }
}
