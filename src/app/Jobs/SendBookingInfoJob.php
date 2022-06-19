<?php

namespace App\Jobs;

use App\Models\Country;
use App\Models\RoomUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBookingInfoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $booking;
    private $userInfo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(RoomUser $booking, array $userInfo)
    {
        $this->booking = $booking;
        $this->userInfo = $userInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::send('emails.bookings', ['booking' => $this->booking], function ($message) {
            $message->to('wdadw@email.com', 'alexkek')->subject('new booking!');
            $message->from($this->userInfo['email'], 'FROM PALMO');
        });
    }
}
