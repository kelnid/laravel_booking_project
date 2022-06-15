<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        Rating::updateOrCreate(
            ['user_id' => auth()->user()->id, 'hotel_id' => $request->get('hotel_id')],
            ['points' => $request->get('points')]
        );
    }
    public function show($id)
    {
        $rating = Rating::where('hotel_id', $id)->avg('points');
        $exactRating = round($rating, 2);

        return response()->json($exactRating);
    }
}
