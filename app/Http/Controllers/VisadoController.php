<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visados;
use App\Visado_entrada;
use App\Visado_salida;


class VisadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->ajax()){
            return Visados::where('user_id', auth()->id())->get();
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
        $visado_entrada = new Visado_entrada();
        $visado = new Visados();

        $visado_entrada->fecha_entrada = now();
        $visado_entrada->ip_entrada = $_SERVER['REMOTE_ADDR'];
        $visado_entrada->motivo_entrada = $request->motivo_entrada;
        $visado_entrada->save();

        $visado->visado_entradas = $visado_entrada->id;
        $visado->user_id  = auth()->id();
        $visado->save();

        return $visado_entrada;
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
        $visado_salida = new Visado_salida();
        
        $visado = Visados::where('id_user',auth()->id())
                    ->orderBy('updated_at')
                    ->where('terminado', true)
                    ->take(1)
                    ->get();

        $visado = new Visados();

        $visado_salida->fecha_salida = now();
        $visado_salida->ip_salida = $_SERVER['REMOTE_ADDR'];
        $visado_salida->motivo_salida = $request->motivo_salida;
        $visado_salida->save();

        $visado->visado_salidas = $visado_salida->id;
        $visado->terminado = true;
        $visado->save();

        return $visado_salida;
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
