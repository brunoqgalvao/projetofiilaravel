<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class RoomController extends Controller
{
    public function getAllRooms(Request $request) {
        $rooms = Room::all();
        return response()->json($rooms,200);
    }
}
