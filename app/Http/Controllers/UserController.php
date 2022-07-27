<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;
use Whoops\Run;

class UserController extends Controller
{
    // Show register/create form
    public function create()
    {
        return view('users.register');
    }

    //  register/create user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6' //confirmed works when the name of the filed is password-confirmation
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // register then login
        //create user
        $user = User::create($formFields);
        // login
        auth()->login($user);
        return redirect('/')->with('message', 'User registered and logged in successfully');

    }

    // logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }
}
