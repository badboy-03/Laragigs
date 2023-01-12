<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('user.register');
    }
    public function login()
    {
        return view('user.login');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
        'name'                  => 'required|min:3',
        'email'                 => ['required','email',Rule::unique('users','email')],
        'password'              => ['required','confirmed','min:6'],
        ]);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        auth()->login($user);
        return redirect('/')->with('message', 'User created successfully And loggedin successfully!');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/')->with('message', 'Logged out successfully!');
    }
    public function auth(Request $request)
    {
        $data = $request->validate([
        'email'                 => ['required','email'],
        'password'              => ['required'],
        ]);
        if(auth()->attempt($data))
        {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in successfully!');
        }
        return back()->withErrors(['email'=>'Invaild Credentials!'])->onlyInput('email');
    }
}
