<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Image;

class UserController extends Controller
{
    public function allUser(Request $request){

        $allUsers = User::all();

        return response()->json($allUsers, 200);

    }
    public function oneUser(Request $request, $id){

        $allUser = User::find($id);

        return response()->json($allUser, 200);
    }
    public function editUser(Request $request, $id){
        return view('useredit');
    }

    public function updateUser(Request $request, $id){
        
        $nomeOriginal = $request->user_avatar->getClientOriginalExtension();
        $avatar_path = '/storage/img/'.$nomeOriginal;
        $teste = $request->user_avatar->storeAs('public/img/', $nomeOriginal);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_level = 1;
        $user->user_avatar =  $avatar_path;
        $user->save();

        // return response()->json(['usuario' => 'Usuario atualizado com sucesso']);
        return redirect('/feed');
    }
    public function deleteUser(Request $request, $id){

        $usuario = User::find($id);
        $resultado = $usuario->delete();

        return response()->json(['usuario' => 'usuario deletado com sucesso']);

    }
}