<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'description', 'country_id', 'image'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
