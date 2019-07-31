<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class commentController extends Controller
{
    public function teste(Request $request) {

        return response()->json(['commentText' => "Comentario teste..."])
    }
}
