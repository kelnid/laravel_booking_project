<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller implements ShouldQueue
{
    public function index()
    {
        $rooms = Room::whereHas('users', function (Builder $query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
        $bookings = Booking::all();

        return view('user.bookings.index', ['rooms' => $rooms], ['bookings' => $bookings]);
    }

    public function storeBooking(BookingRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        RoomUser::create($data);
//        return redirect()->route('hotels.bookings.index');

        $roomId = $data['room_id'];

        Booking::where('user_id', Auth::user()->id)->where('room_id', $roomId)->get();

        $booking = Booking::create($data);

        Mail::send('emails.booking', ['booking' => $booking], function ($message) {
            $message->to(auth()->user()->email, auth()->user()->name)->subject('new booking!');
            $message->from('from.palmo@gmail.com', 'FROM PALMO');
        });

        return redirect()->route('hotels.bookings.index', ['room' => $request->room_id]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');

        $booking = Booking::find($id);

        $booking->update($data);

        return redirect()->route('user.bookings.index', ['booking' => $id]);
    }

    public function destroy($id)
    {
//        Booking::find($id)->delete();

        RoomUser::where('room_id', $id)->where('user_id', auth()->user()->id)->delete();

        return redirect()->route('hotels.bookings.index');
    }
}


