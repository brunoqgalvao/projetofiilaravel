<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function teste(Request $request) {

        $data = [
            'comments' => 
            [
                [
                    "id" => "1",
                    "user_name" => "Bruno Galvao",
                    "user_avatar" => "",
                    "text" => "Comentario teste...",
                ],
                [
                    "id" => "2",
                    "user_name" => "Bruno Galvao",
                    "user_avatar" => "",
                    "text" => "Comentario teste1...",
                ],
                [
                    "id" => "3",
                    "user_name" => "Bruno Galvao",
                    "user_avatar" => "",
                    "text" => "Comentario teste2...",
                ]
            ]
        ];

        return response()->json($data);
    }
}
