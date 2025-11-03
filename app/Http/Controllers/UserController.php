<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($username = null)
    {
        $user = [
            'username' => $username ?: 'demo_user',
            'full_name' => 'Demo User',
            'bio' => '📸 Photography enthusiast | 🌍 Travel lover | ☕️ Coffee addict',
            'avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&h=150&fit=crop&crop=face',
            'posts_count' => 127,
            'followers_count' => 1542,
            'following_count' => 289,
            'is_following' => false,
            'is_own_profile' => !$username || $username === 'demo_user'
        ];

        $posts = [
            ['image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=300&h=300&fit=crop', 'likes' => 247, 'comments' => 12],
            ['image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=300&h=300&fit=crop', 'likes' => 189, 'comments' => 8],
            ['image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=300&h=300&fit=crop', 'likes' => 356, 'comments' => 23],
            ['image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=300&h=300&fit=crop', 'likes' => 298, 'comments' => 15],
            ['image' => 'https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=300&h=300&fit=crop', 'likes' => 421, 'comments' => 31],
            ['image' => 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=300&h=300&fit=crop', 'likes' => 167, 'comments' => 9]
        ];

        return view('profile', compact('user', 'posts'));
    }

    public function editProfile()
    {
        $user = [
            'username' => 'demo_user',
            'full_name' => 'Demo User',
            'bio' => '📸 Photography enthusiast | 🌍 Travel lover | ☕️ Coffee addict',
            'email' => 'user@instagram.com',
            'phone' => '+1 (555) 123-4567',
            'avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&h=150&fit=crop&crop=face'
        ];

        return view('edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function follow($user)
    {
        return response()->json(['success' => true, 'following' => true]);
    }
}