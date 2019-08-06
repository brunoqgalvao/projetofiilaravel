<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class feedController extends Controller
{
    public function getFeed(Request $request) {

        if($request->isMethod('get')){
            $posts = Post::with('postOwner')->withCount('likes')->orderBy('created_at', 'DESC')->get();
            return view('feed', ['posts' => $posts]);
        }
    }

    public function getFeedByRoom(Request $request, $roomName) {
        if($request->isMethod('get')){
            $posts = Post::with('postOwner')
                ->withCount('likes')
                ->whereHas('rooms', function ($query) use ($roomName) {$query->where('name', $roomName);})
                ->orderBy('created_at', 'DESC')
                ->get();
                
            return view('feed', ['posts' => $posts]);
        }
    }

    public function getPostsByTag(Request $request)
    {
        $allTags = Room::find($request->room_id);
        $posts = $allTags->posts;  
        $postOwner = $posts->postOwner;  
    }
}
