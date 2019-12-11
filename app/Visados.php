<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visados extends Model
{
    //
    protected $fillable = ['visado_entradas', 'visado_salidas', 'user_id', 'terminado'];

    public function visado_salida(){
        return $this->hasOne("App\Visado_salida", "id");
    }
    public function visado_entrada(){
        return $this->hasOne("App\Visado_entrada", "id");
    }
}
