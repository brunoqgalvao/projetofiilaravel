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
        $post['comments_total'] += 1;
        $post->save();
        $post->comments()->save($comment);

        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function getComments(Request $request, $postId){
        $post = Post::findOrFail($postId);
        $comments = $post->comments()->with('User')->orderBy('created_at', 'DESC')->get();
        return response()->json($comments);
    }
}
