<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;

class UpvoteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request, Post $post)
    {

        // check if upvoted
        if ($post->upvotedBy($request->user())) {
            return response(null, 409);
        }

        // store 
        $post->upvotes()->create([
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
        $request->user()->upvotes()->where('post_id', $post->id)->delete();
        return back();
    }
}
