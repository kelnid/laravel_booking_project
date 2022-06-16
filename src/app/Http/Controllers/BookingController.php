<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Room;
use App\Models\RoomUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookingController extends Controller implements ShouldQueue
{
    public function index()
    {
        $rooms = Room::whereHas('users', function (Builder $query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
        $bookings = RoomUser::all();

        return view('user.bookings.index', ['rooms' => $rooms],['bookings' => $bookings]);
    }

    public function storeBooking(BookingRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        RoomUser::create($data);

        return redirect()->route('hotels.bookings.index');
    }

    public function destroy($id)
    {
//        RoomUser::where('user_id', auth()->user()->id)->delete();
        $booking = RoomUser::find($id);

        $booking->delete();

        return redirect()->route('hotels.bookings.index');
    }
}


