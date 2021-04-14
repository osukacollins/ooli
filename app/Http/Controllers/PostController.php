<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Notification;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $posts = Post::where('community_id', $request->user()->community->id)->orderBy('created_at', 'desc')->get();

        return view('content.home', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'body' => 'required'
        ]);

        // store value
        Post::create([
            'community_id' => $request->user()->community->id,
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
