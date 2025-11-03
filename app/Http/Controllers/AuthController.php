<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $users = [
            ['email' => 'user@instagram.com', 'password' => 'user123', 'username' => 'demo_user'],
            ['email' => 'sarah@instagram.com', 'password' => 'sarah123', 'username' => 'sarah_wilson'],
            ['email' => 'john@instagram.com', 'password' => 'john123', 'username' => 'john_doe'],
            ['email' => 'mike@instagram.com', 'password' => 'mike123', 'username' => 'travel_mike']
        ];

        foreach ($users as $user) {
            if ($user['email'] === $request->email && $user['password'] === $request->password) {
                session(['user_logged_in' => true, 'user' => $user]);
                return redirect()->route('feed');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showSignup()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $userData = [
            'email' => $request->email,
            'username' => $request->username,
            'full_name' => $request->full_name,
            'password' => $request->password
        ];

        session(['user_logged_in' => true, 'user' => $userData]);
        return redirect()->route('feed');
    }

    public function logout()
    {
        session()->forget(['user_logged_in', 'user']);
        return redirect()->route('home');
    }
}