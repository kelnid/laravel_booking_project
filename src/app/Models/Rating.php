<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';
    protected $fillable = ['points', 'hotel_id', 'user_id'];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
