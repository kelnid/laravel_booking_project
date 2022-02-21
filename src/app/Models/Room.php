<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bed', 'area', 'hotel_id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}