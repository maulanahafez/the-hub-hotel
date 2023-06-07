<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signUp()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max: 255',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ($user) {
            session()->flash('success', 'User created successfully');
            return redirect('/login');
        } else {
            return redirect()->route('signup');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        $request->validate([
            "email" => "required|email:dns",
            "password" => "required|min:6"
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                $request->session()->regenerate();
                session()->flash('successLogin', "Successfully logged in");

                return redirect()->intended('/dashboard');
            }
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Email or password incorrect');
    }

    // public function dashboard(){
    //     return view('dashboard.index');
    // }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->flash('successLogout', "Successfully logged out");

        return redirect('/');
    }
}
