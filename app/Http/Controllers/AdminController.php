<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => 125847,
            'active_users' => 89632,
            'total_posts' => 1456789,
            'total_stories' => 234567,
            'reports_pending' => 156,
            'new_signups_today' => 1247
        ];

        $recentUsers = [
            ['username' => 'new_user_1', 'email' => 'user1@example.com', 'joined' => '2 hours ago'],
            ['username' => 'new_user_2', 'email' => 'user2@example.com', 'joined' => '4 hours ago'],
            ['username' => 'new_user_3', 'email' => 'user3@example.com', 'joined' => '6 hours ago']
        ];

        $recentPosts = [
            ['user' => 'john_doe', 'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=100&h=100&fit=crop', 'likes' => 247],
            ['user' => 'sarah_wilson', 'image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=100&h=100&fit=crop', 'likes' => 189],
            ['user' => 'travel_mike', 'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=100&h=100&fit=crop', 'likes' => 356]
        ];

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentPosts'));
    }

    public function users()
    {
        $users = [
            ['id' => 1, 'username' => 'john_doe', 'email' => 'john@example.com', 'posts' => 127, 'followers' => 1542, 'status' => 'active', 'joined' => '2023-01-15'],
            ['id' => 2, 'username' => 'sarah_wilson', 'email' => 'sarah@example.com', 'posts' => 89, 'followers' => 892, 'status' => 'active', 'joined' => '2023-02-20'],
            ['id' => 3, 'username' => 'travel_mike', 'email' => 'mike@example.com', 'posts' => 256, 'followers' => 2156, 'status' => 'active', 'joined' => '2022-11-08'],
            ['id' => 4, 'username' => 'foodie_anna', 'email' => 'anna@example.com', 'posts' => 178, 'followers' => 1234, 'status' => 'suspended', 'joined' => '2023-03-12']
        ];

        return view('admin.users', compact('users'));
    }

    public function posts()
    {
        $posts = [
            ['id' => 1, 'user' => 'john_doe', 'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=100&h=100&fit=crop', 'caption' => 'Beautiful sunset...', 'likes' => 1247, 'comments' => 89, 'status' => 'published', 'created' => '2024-01-15'],
            ['id' => 2, 'user' => 'sarah_wilson', 'image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=100&h=100&fit=crop', 'caption' => 'Morning coffee...', 'likes' => 892, 'comments' => 45, 'status' => 'published', 'created' => '2024-01-14'],
            ['id' => 3, 'user' => 'travel_mike', 'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=100&h=100&fit=crop', 'caption' => 'Mountain adventure...', 'likes' => 2156, 'comments' => 178, 'status' => 'published', 'created' => '2024-01-13'],
            ['id' => 4, 'user' => 'foodie_anna', 'image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=100&h=100&fit=crop', 'caption' => 'Inappropriate content...', 'likes' => 45, 'comments' => 12, 'status' => 'reported', 'created' => '2024-01-12']
        ];

        return view('admin.posts', compact('posts'));
    }

    public function stories()
    {
        $stories = [
            ['id' => 1, 'user' => 'john_doe', 'views' => 1247, 'created' => '2 hours ago', 'expires' => '22 hours left'],
            ['id' => 2, 'user' => 'sarah_wilson', 'views' => 892, 'created' => '4 hours ago', 'expires' => '20 hours left'],
            ['id' => 3, 'user' => 'travel_mike', 'views' => 2156, 'created' => '6 hours ago', 'expires' => '18 hours left']
        ];

        return view('admin.stories', compact('stories'));
    }

    public function reports()
    {
        $reports = [
            ['id' => 1, 'type' => 'post', 'reported_content' => 'Inappropriate image', 'reporter' => 'user123', 'reason' => 'Spam', 'status' => 'pending', 'created' => '2024-01-15'],
            ['id' => 2, 'type' => 'user', 'reported_content' => 'Fake account', 'reporter' => 'user456', 'reason' => 'Fake Account', 'status' => 'reviewing', 'created' => '2024-01-14'],
            ['id' => 3, 'type' => 'comment', 'reported_content' => 'Harassment', 'reporter' => 'user789', 'reason' => 'Harassment', 'status' => 'resolved', 'created' => '2024-01-13']
        ];

        return view('admin.reports', compact('reports'));
    }

    public function analytics()
    {
        $analytics = [
            'daily_active_users' => 89632,
            'monthly_active_users' => 2456789,
            'posts_per_day' => 15678,
            'stories_per_day' => 34567,
            'engagement_rate' => 8.5,
            'retention_rate' => 76.3
        ];

        return view('admin.analytics', compact('analytics'));
    }

    public function settings()
    {
        $settings = [
            'app_name' => 'Instagram Clone',
            'max_file_size' => '10MB',
            'allowed_formats' => 'JPG, PNG, MP4',
            'story_duration' => '24 hours',
            'max_caption_length' => '2200 characters'
        ];

        return view('admin.settings', compact('settings'));
    }
}