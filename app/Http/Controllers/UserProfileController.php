<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->get();
        return view('content.profile', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
