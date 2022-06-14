<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bed', 'area', 'hotel_id', 'price'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function roomImages()
    {
        return $this->hasMany(RoomImage::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->using(RoomUser::class);
    }
}
