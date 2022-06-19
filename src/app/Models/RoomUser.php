<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoomUser extends Pivot
{
    use HasFactory;

    protected $table = 'room_user';
    protected $fillable = ['user_id', 'room_id','settlement_date','release_date'];

    protected $casts = [
        'settlement_date' => 'date:j-n-Y',
        'release_date' => 'date:j-n-Y',
    ];
}