<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ajustes;

class AjustesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $esAdmin = User::find(1)->esAdmin;

        if($esAdmin == 1){
            return Ajustes::first().get();
        }else{
            return response()->json(['error' => 'Unauthenticated.'], 401);
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
        //
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
        $esAdmin = User::find(1)->esAdmin;

            if($esAdmin == 1){
                $Ajustes = Ajustes::firstOrFail();
                $Ajustes->horasTrabajo=$request->horasTrabajo;
                $Ajustes->save();

                return $Ajustes;
            }else{
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }
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
