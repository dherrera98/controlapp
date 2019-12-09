<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){
            return Visados::where('user_id',auth()->id())
            ->orderBy('updated_at')
            ->get();
        }else{
            return view('welcome');
        }
    }
}
