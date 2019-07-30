<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function uploadImage(Request $request) {

        $arquivo = $request->file('image');
        $nomeOriginal = $arquivo->getClientOriginalName();
        error_log('Some message here.');


        $img_path = '/storage/img/'.$nomeOriginal;

        $save = $request->file('image')->storeAs('public/img/',$nomeOriginal);

        return response()->json([
            'data' => $img_path
        ]);
    }
}
