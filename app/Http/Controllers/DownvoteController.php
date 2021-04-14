<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Notification;
use Illuminate\Http\Request;

class DownvoteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request, Post $post)
    {

        // check if downvoted
        if ($post->downvotedBy($request->user())) {
            return response(null, 409);
        }
        // store 
        $post->downvotes()->create([
            'user_id' => $request->user()->id,
        ]);

        // create a notification
        Notification::create([
            'user_id' => $request->user()->id,
            'type' => 'upvote',
            'post_id' => $request->post->id,
            'by' => $request->post->user_id
        ]);

        // redirect
        return back();
    }
    public function destroy(Post $post, Request $request)
    {
        $request->user()->downvotes()->where('post_id', $post->id)->delete();
        return back();
    }
}
