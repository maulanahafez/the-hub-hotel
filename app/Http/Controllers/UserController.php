<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'number' => 1,
            'users' => User::latest()->get(),
        ];
        return view('dashboard.user.index', $data);
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);


        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        $data = [
            'user' => $user
        ];
        return view('dashboard.user.detail', $data);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users,email,' . $user->id;
        }

        $validated = $request->validate($rules);

        $dataToUpdate = [
            'name' => $validated['name'],
            'password' => bcrypt($validated['password']),
        ];

        if (isset($validated['email'])) {
            $dataToUpdate['email'] = $validated['email'];
        }

        User::where('id', $user->id)->update($dataToUpdate);

        return redirect()->route('user.edit', ['user' => $user->id]);
    }

    public function userProfile(User $user)
    {
        $data = [
            'user' => $user
        ];

        return view('userProfile.index', $data);
    }

    public function updateUserProfile(Request $request, User $user)
    {

        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ];


        $validated = $request->validate($rules);

        $dataToUpdate = [
            'name' => $validated['name'],
            'password' => bcrypt($validated['password']),
        ];

        if (isset($validated['email'])) {
            $dataToUpdate['email'] = $validated['email'];
        }

        User::where('id', $user->id)->update($dataToUpdate);

        return redirect()->route('home.userProfile', ['user' => $user->id]);
    }
}
