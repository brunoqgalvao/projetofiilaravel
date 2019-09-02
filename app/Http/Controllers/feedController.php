<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Room;

class feedController extends Controller
{
    public function getFeed(Request $request) {

        if($request->isMethod('get')){
            $posts = Post::with('postOwner')->withCount('likes')->orderBy('created_at', 'DESC')->paginate(8);;
            return view('feed', ['posts' => $posts]);
        }
    }

    public function getFeedByRoom(Request $request, $roomName) {
        
        $isFund = false;
        $fund = "";

        if($request->isMethod('get')){
            $posts = Post::with('postOwner')
                ->withCount('likes')
                ->whereHas('rooms', function ($query) use ($roomName) {$query->where('name', $roomName);})
                ->orderBy('created_at', 'DESC')
                ->paginate(8);

            $room = Room::where(['name'=>$roomName])->first();
            if(isset($room->postOwner->user)){
                $roomAvatar = $room->postOwner->user->user_avatar;
            } if(isset($room->postOwner->fund)){
                $isFund = true;
                $fund =$room->postOwner->fund; 
                $roomAvatar = "";
            }else {
                $roomAvatar = "";
            }
            return view('feed', ['posts' => $posts, 'room' => ['name' => $roomName, 'avatar' => $roomAvatar, 'banner' => '', 'isFund' => $isFund, 'fund'=> $fund]]);
        }
    }

    public function getPostsByTag(Request $request)
    {
        $allTags = Room::find($request->room_id);
        $posts = $allTags->posts;  
        $postOwner = $posts->postOwner;  
    }
}
