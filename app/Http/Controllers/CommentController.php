<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required',
        ]);

        $comment = new Comment($request->all());
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment added successfully.');
    }
}
