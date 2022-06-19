<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Jobs\SendBookingInfoJob;
use App\Models\Room;
use App\Models\RoomUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;

class BookingController extends Controller implements ShouldQueue
{
    public function index()
    {
        $bookings = User::find(auth()->user()->id)->rooms;

        return view('user.bookings.index', ['bookings' => $bookings]);
    }

    public function storeBooking(BookingRequest $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;

        RoomUser::create($data);

        $booking = RoomUser::all()->where('user_id', auth()->user()->id)->first();

        $userInfo = [
            'email' => auth()->user()->email,
            'name' => auth()->user()->name
        ];

        SendBookingInfoJob::dispatch($booking, $userInfo);

        return redirect()->route('hotels.bookings.index',['booking' => $booking]);
    }

    public function destroy($roomUser)
    {
        $user = User::find(auth()->user()->id);
        $user->rooms()->wherePivot('id',$roomUser)->detach();

        return redirect()->route('hotels.bookings.index');
    }
}


