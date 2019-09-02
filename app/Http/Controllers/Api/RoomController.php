<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function getAllRooms(Request $request) {
        $user_id = Auth::id();
        $rooms = Room::with(['follows' => function($q) use ($user_id) { return $q->where('user_id','=', $user_id); }])->get();
        return response()->json($rooms,200);
    }

    // Post::with(['like' => function ($like) use ($user_id) {
    //     return $like->whereHas('user', function ($user) use ($user_id) {
    //         $user->where('id', $user_id);
    //     })->get();
    // }])->get();
}
