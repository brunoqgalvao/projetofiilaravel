<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use Auth;

class FollowController extends Controller
{
    public function followUnfollow(Request $request) {
        $room = Room::find($request->roomId);
        $room->likes()->toggle(Auth::user()->id);
        $liked = $room->likes->contains(Auth::user()->id);
        $liked?$room['likes_total'] += 1:$room['likes_total'] -= 1;
        $room->save();
        return response()->json(['liked' => $liked,'likes_total' => $room['likes_total']]);
    }
}
