<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use App\Post;
use Auth;

class CommentController extends Controller
{

    public function createComment(Request $request, $postId){
        $post = Post::findOrFail($postId);
        $comment = new Comment();
        $comment->body = $request->commentBody;
        $comment->user_id = Auth::id();
        $post->comments()->save($comment); 
    }

    public function getComments(Request $request, $postId){
        $post = Post::findOrFail($postId);
        return $post->comments()->all();
    }
}
