<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Hotel;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::get();
        return view('admin.comments.index', ['comments' => $comments]);
    }
    public function store(CommentRequest $request, Hotel $hotel)
    {
        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        $data['hotel_id'] = $hotel->id;
        Comment::create($data);
        return redirect()->route('user.hotels.show', $hotel->id);
    }
    public function update(CommentRequest $request, $hotel, $id)
    {
        $data = $request->except('_token', '_method');

        $comment = Comment::find($id);
        $comment->update($data);

        return redirect()->route('user.hotels.show', $hotel);
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('admin.comments.index');
    }
}
