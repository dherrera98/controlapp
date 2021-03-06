<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visados;
use App\Visado_entrada;
use App\Visado_salida;
use App\Ajustes;

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
            return Visados::with('visado_entrada')->where([['user_id',auth()->id()],['terminado',false]])
            ->orderBy('updated_at')
            ->take(1)
            ->get();
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

            // guardamos visado de entrada en la  base de datos
            $visado_entrada->fecha_entrada = now();
            $visado_entrada->ip_entrada = $_SERVER['REMOTE_ADDR'];
            $visado_entrada->motivo_entrada = $request->motivo_entrada;
            $visado_entrada->save();
            
            // guardamos visado en base de la base de datos
            $visado->visado_entradas = $visado_entrada->id;
            $visado->terminado = false;
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
        $ajustes = Ajustes::first();
        $id_visado = Visados::where([['user_id',auth()->id()],['terminado',false]])
            ->orderBy('updated_at')
            ->take(1)
            ->get('id');
        
        $visado = Visados::find($id_visado[0]->id);
        $hora_fichada = now($visado->create_at);
        $hora_limite = $hora_fichada->addHour($ajustes->horasTrabajo);
        $hora_actual = now()->addhour(1);

        // comprobamos que la hora actual esta +-10 min en la hora limite
        if($hora_actual < $hora_limite->addMinute(10) && $hora_actual > $hora_limite->subMinute(10)){
            $visado_salida = new Visado_salida();
            $visado_salida->fecha_salida = now();
            $visado_salida->ip_salida = $_SERVER['REMOTE_ADDR'];
            $visado_salida->motivo_salida = $request->motivo_salida;
            $visado_salida->save();
            $visado->visado_salidas = $visado_salida->id;
            $visado->terminado = true;
            $visado->save();
            return visado;
        }else{
            if($request->motivo_salida){
                $visado_salida = new Visado_salida();
                $visado_salida->fecha_salida = now();
                $visado_salida->ip_salida = $_SERVER['REMOTE_ADDR'];
                $visado_salida->motivo_salida = $request->motivo_salida;
                $visado_salida->save();
                $visado->visado_salidas = $visado_salida->id;
                $visado->terminado = true;
                $visado->save();
                return $visado;
            }

            return response()->json(['error' => 'El campo motivo de salida es obligatorio'], 400);
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
