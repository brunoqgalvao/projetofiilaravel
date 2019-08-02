<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\PostOwner;
use App\Room;



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
            // adiciona a tag username;
            $request->request->add(['tag' => $user->name]);
            // pega o id de postowner do user;
            $owner = $user->postOwner;
            // cria um post atrelado a esse post owner;
            $post = $owner->posts()->create([
                "content"=>$request->postContent,
            ]);
            // cria ou encontra rooms a partir das tags e adicona no post
            $room = Room::firstOrCreate(['name' =>$request->tag]);
            $post->rooms()->attach($room->id);
            //TODO: this view has to be the same view the person was in (last url)
            return redirect('/feed');
        } else 
            return redirect('/feed');
    }
    
    public function getPost(Request $request) {
        if($request->isMethod('get')){
            $posts = Post::with('postOwner')->get();
            return view('home', ['posts' => $posts]);
        }
    }
}
