<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
//    public function create()
//    {
//        $bookings = Booking::all();
//
//        return view('admin.bookings.create', ['bookings' => $bookings]);
//    }

    public function store(BookingRequest $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = Auth::user()->id;

        $roomId = $data['room_id'];

        Booking::where('user_id', Auth::user()->id)->where('room_id', $roomId)->get();

        $booking = Booking::create($data);

        Mail::send('emails.booking', ['booking' => $booking], function ($message) {
            $message->to(auth()->user()->email, auth()->user()->name)->subject('new booking!');
            $message->from('from.palmo@gmail.com', 'FROM PALMO');
        });

        return redirect()->route('user.rooms.show', ['room' => $request->room_id]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');

        $booking = Booking::find($id);

        $booking->update($data);

        return redirect()->route('user.bookings.index', ['booking' => $id]);
    }
}


