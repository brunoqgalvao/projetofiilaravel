<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use Auth;
use App\Post;

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

    public function getComments(Request $request, $postId){
        $post = Post::findOrFail($postId);
        return $post->comments()->with('User')->orderBy('created_at', 'DESC')->get();
    }

    public function createComment(Request $request, $postId){
        $post = Post::findOrFail($postId);
        $comment = new Comment();
        $comment->body = $request->commentBody;
        $comment->user_id = Auth::id();
        $post['comments_total'] += 1;
        $post->save();
        $post->comments()->save($comment);

        return response()->json(['success' => true]);
    }
}
