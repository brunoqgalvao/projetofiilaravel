<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Room;

class feedController extends Controller
{
    public function getFeed(Request $request) {
        if($request->isMethod('get')){
            // gambiarra para usar sort + paginate;
            $sortedPosts = Post::with('postOwner')
                ->withCount('likes')
                ->orderBy('created_at', 'DESC')
                ->get()
                ->sortByDesc(function($post){return $post->relevance;})
                ->pluck('id')
                ->toArray();

            $orderedIds = implode(',', $sortedPosts);

            $result = Post::with('postOwner')
            ->orderByRaw(\DB::raw("FIELD(id, ".$orderedIds." )"))
            ->withCount('likes')
            ->paginate(8);
            return view('feed', ['posts' => $result]);
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
