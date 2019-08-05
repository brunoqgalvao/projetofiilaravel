<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;

class LikeController extends Controller
{
    public function likeUnlike(Request $request) {
        $post = Post::find($request->postId);
        $post->likes()->toggle(Auth::user()->id);
        $liked = $post->likes->contains(Auth::user()->id);
        $liked?$post['likes_total'] += 1:$post['likes_total'] -= 1;
        $post->save();
        return response()->json(['liked' => $liked,'likes_total' => $post['likes_total']]);
    }
}
