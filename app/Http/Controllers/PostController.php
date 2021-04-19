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
        $last_posts = Post::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->take(1)->get();
        foreach ($last_posts as $last_post) {
            $last_post_id = $last_post->id;
            $last_post_user = $last_post->user_id;
        }


        // create a notification
        Notification::create([
            'user_id' => $request->user()->id,
            'type' => 'post',
            'post_id' => $last_post_id,
            'by' => $last_post_user
        ]);
        return back();
    }
    public function destroy(Post $post, Request $request)
    {
        $request->user()->posts()->where('id', $post->id)->delete();
        return back();
    }
}
