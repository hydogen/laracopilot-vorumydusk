<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showUpload()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        return redirect()->route('feed')->with('success', 'Photo uploaded successfully!');
    }

    public function like($id)
    {
        return response()->json(['success' => true, 'liked' => true, 'likes' => rand(100, 2000)]);
    }

    public function comment(Request $request, $id)
    {
        return response()->json(['success' => true, 'comment' => $request->comment]);
    }
}