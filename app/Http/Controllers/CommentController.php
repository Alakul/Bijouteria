<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {  
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->tutorial_id = $request->input('tutorial_id');
        $comment->comment = $request->input('comment');
        $comment->save();

        return back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment -> delete();

        return back();
    }
}
