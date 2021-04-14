<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }
    // to generate username
    function usernameGen($first, $second)
    {
        return $first . $second;
    }

    public function store(Request $request)
    {

        // validate
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'second_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);
        //store
        User::create([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'username' => $this->usernameGen($request->first_name, $request->second_name),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        //sign in
        auth()->attempt($request->only('email', 'password'));

        //redirect
        return redirect()->route('community');
    }
}
