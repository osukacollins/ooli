<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user, Request $request)
    {
        $users = Settings::where('user_id', $request->user()->id)->get();
        if (count($users) == 0) {

            $user->settings()->create([
                'user_id' => $request->user()->id
            ]);
        }

        return view('content.settings');
    }
    public function store(User $user, Request $request)
    {
        // check for empty checkboxes
        if (empty($request->sound_on)) {
            $request->sound_on = 0;
        }
        if (empty($request->upvote_on)) {
            $request->upvote_on = 0;
        }
        if (empty($request->downvote_on)) {
            $request->upvote_on = 0;
        }
        if (empty($request->comments_on)) {
            $request->comments_on = 0;
        }
        if (empty($request->posts_on)) {
            $request->posts_on = 0;
        }

        $user->settings()->update([
            'see_me' => $request->see_me,
            'see_post' => $request->see_post,
            'list_post' => $request->list_post,
            'sound-on' => $request->sound_on,
            'upvote-on' => $request->upvote_on,
            'downvote-on' => $request->downvote_on,
            'comments-on' => $request->comments_on,
            'posts-on' => $request->posts_on
        ]);
        return back();
    }
}
