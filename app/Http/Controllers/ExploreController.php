<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Community;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExploreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        if ($request->user()->settings->list_post == 'global') {
            $posts = Post::orderBy('created_at', 'desc')->get();
        }

        if ($request->user()->settings->list_post == 'my community') {
            $posts = Post::where('community_id', $request->user()->community->id)->orderBy('created_at', 'desc')->get();
        }
        if ($request->user()->settings->list_post == 'my posts') {
            $posts = Post::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->get();
        }

        return view('content.explore', [
            'posts' => $posts
        ]);
    }

    public function search(Request $request)
    {
        $users = [];
        $users_else = [];
        $communities = [];
        if (Str::contains($request->search, '@')) {
            $username = Str::beforeLast($request->search, '@');
            $community = Str::afterLast($request->search, '@');

            $users = DB::table('users')->join('communities', 'users.id', '=', 'communities.user_id')->where('username', $username)->where('community_name', $community)->get();
            if (empty($users)) {
                $users_else = User::where('username', $username)->get();
            }
            if (empty($users_else)) {
                $users_else = DB::table('users')->join('communities', 'users.id', '=', 'communities.user_id')->where('community_name', $community)->get();
            }

            $communities = Community::where('community_name', $community)->get();
        }

        $posts = Post::where('body', $request->search)->get();

        return view('content.explore', [
            'users' => $users,
            'communities' => $communities,
            'users_else' => $users_else,
            'posts' => $posts
        ]);
    }
}
