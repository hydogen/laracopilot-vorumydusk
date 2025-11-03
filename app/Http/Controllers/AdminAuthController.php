<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $admins = [
            ['email' => 'admin@instagram.com', 'password' => 'admin123', 'name' => 'Super Admin', 'role' => 'Super Admin'],
            ['email' => 'manager@instagram.com', 'password' => 'manager123', 'name' => 'Content Manager', 'role' => 'Manager'],
            ['email' => 'moderator@instagram.com', 'password' => 'moderator123', 'name' => 'Content Moderator', 'role' => 'Moderator']
        ];

        foreach ($admins as $admin) {
            if ($admin['email'] === $request->email && $admin['password'] === $request->password) {
                session(['admin_logged_in' => true, 'admin_user' => $admin]);
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid admin credentials']);
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login');
    }
}