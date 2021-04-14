<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();

        return view('content.comments', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function store(Request $request, Post $post)
    {
        // validate
        $this->validate($request, [
            'body' => 'required'
        ]);


        // store value
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->body
        ]);

        // create a notification
        Notification::create([
            'user_id' => $request->user()->id,
            'type' => 'upvote',
            'post_id' => $request->post->id,
            'by' => $request->post->user_id
        ]);

        return back();
    }
}
