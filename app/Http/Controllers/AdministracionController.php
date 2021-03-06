<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Visados;

class AdministracionController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        if($request->ajax()){
            $esAdmin = User::find(1)->esAdmin;

            if($esAdmin == 1){
                return User::get();
            }else{
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }
        }else{
            return view('welcome');
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $esAdmin = User::find(1)->esAdmin;

            if($esAdmin == 1){
                return Visados::with("Visado_salida", "Visado_entrada")
                    ->where("user_id",$id)
                    ->orderBy('updated_at', 'DESC')
                    ->get();
            }else{
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = User::find($id);
        $User->esAdmin = !$User.esAdmin;
        $User->save();

        return $User;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
