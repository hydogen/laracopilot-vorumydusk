<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function feed()
    {
        $posts = [
            [
                'id' => 1,
                'user' => ['username' => 'john_doe', 'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face'],
                'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&h=600&fit=crop',
                'caption' => 'Beautiful sunset at the beach! 🌅 #sunset #beach #nature',
                'likes' => 1247,
                'comments' => 89,
                'time' => '2 hours ago',
                'liked' => false
            ],
            [
                'id' => 2,
                'user' => ['username' => 'sarah_wilson', 'avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face'],
                'image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&h=600&fit=crop',
                'caption' => 'Morning coffee and planning my day ☕️ #coffee #morning #productivity',
                'likes' => 892,
                'comments' => 45,
                'time' => '4 hours ago',
                'liked' => true
            ],
            [
                'id' => 3,
                'user' => ['username' => 'travel_mike', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face'],
                'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=600&h=600&fit=crop',
                'caption' => 'Exploring the mountains today! The view is incredible 🏔️ #mountains #hiking #adventure',
                'likes' => 2156,
                'comments' => 178,
                'time' => '6 hours ago',
                'liked' => false
            ]
        ];

        $stories = [
            ['user' => 'your_story', 'avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&h=150&fit=crop&crop=face', 'viewed' => false],
            ['user' => 'john_doe', 'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face', 'viewed' => false],
            ['user' => 'sarah_wilson', 'avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face', 'viewed' => true],
            ['user' => 'travel_mike', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face', 'viewed' => false],
            ['user' => 'foodie_anna', 'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face', 'viewed' => true]
        ];

        return view('feed', compact('posts', 'stories'));
    }

    public function explore()
    {
        $posts = [
            ['image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=300&h=300&fit=crop', 'likes' => 1247],
            ['image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=300&h=300&fit=crop', 'likes' => 892],
            ['image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=300&h=300&fit=crop', 'likes' => 2156],
            ['image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=300&h=300&fit=crop', 'likes' => 1543],
            ['image' => 'https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=300&h=300&fit=crop', 'likes' => 987],
            ['image' => 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=300&h=300&fit=crop', 'likes' => 2341],
            ['image' => 'https://images.unsplash.com/photo-1418065460487-3956ef35221a?w=300&h=300&fit=crop', 'likes' => 1789],
            ['image' => 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=300&h=300&fit=crop', 'likes' => 1456],
            ['image' => 'https://images.unsplash.com/photo-1482192505345-5655af888989?w=300&h=300&fit=crop', 'likes' => 2098]
        ];

        return view('explore', compact('posts'));
    }

    public function stories()
    {
        $stories = [
            [
                'user' => 'john_doe',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face',
                'story_image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=700&fit=crop',
                'time' => '2h'
            ]
        ];

        return view('stories', compact('stories'));
    }

    public function messages()
    {
        $conversations = [
            [
                'user' => 'sarah_wilson',
                'avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face',
                'last_message' => 'Hey! How was your trip?',
                'time' => '2m ago',
                'unread' => true
            ],
            [
                'user' => 'john_doe',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face',
                'last_message' => 'Thanks for the like! 😊',
                'time' => '1h ago',
                'unread' => false
            ],
            [
                'user' => 'travel_mike',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face',
                'last_message' => 'Check out this view!',
                'time' => '3h ago',
                'unread' => false
            ]
        ];

        return view('messages', compact('conversations'));
    }

    public function chat($user)
    {
        $messages = [
            ['sender' => 'sarah_wilson', 'message' => 'Hey! How was your trip?', 'time' => '2:30 PM', 'sent_by_me' => false],
            ['sender' => 'me', 'message' => 'It was amazing! The mountains were incredible', 'time' => '2:32 PM', 'sent_by_me' => true],
            ['sender' => 'sarah_wilson', 'message' => 'I saw your photos! They look stunning 📸', 'time' => '2:33 PM', 'sent_by_me' => false],
            ['sender' => 'me', 'message' => 'Thanks! You should come next time', 'time' => '2:35 PM', 'sent_by_me' => true]
        ];

        $chatUser = [
            'username' => $user,
            'avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face',
            'online' => true
        ];

        return view('chat', compact('messages', 'chatUser'));
    }

    public function notifications()
    {
        $notifications = [
            [
                'type' => 'like',
                'user' => 'john_doe',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face',
                'message' => 'liked your photo',
                'time' => '2m ago',
                'post_image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=100&h=100&fit=crop'
            ],
            [
                'type' => 'comment',
                'user' => 'sarah_wilson',
                'avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face',
                'message' => 'commented: "Amazing shot! 📸"',
                'time' => '5m ago',
                'post_image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=100&h=100&fit=crop'
            ],
            [
                'type' => 'follow',
                'user' => 'travel_mike',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face',
                'message' => 'started following you',
                'time' => '1h ago'
            ]
        ];

        return view('notifications', compact('notifications'));
    }
}