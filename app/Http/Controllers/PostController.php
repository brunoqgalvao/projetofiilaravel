<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\PostOwner;



class PostController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $redirectTo = "/home";

    public function createPost(Request $request) {
        if ($request->isMethod('post')) {
            $user = Auth::user();
            $owner = $user->postOwner;
            $owner->posts()->create([
                "content"=>$request->postContent
            ]);
            //TODO: this view has to be the same view the person was in (last url)
            return redirect('/post');
        } else 
            return redirect('/post');
    }
    
    public function getPost(Request $request) {
        if($request->isMethod('get')){
            $posts = Post::with('postOwner')->get();
            return view('home', ['posts' => $posts]);
        }
    }
}
