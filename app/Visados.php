<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visados extends Model
{
    //
    protected $fillable = ['visado_entradas', 'visado_salidas', 'user_id', 'terminado'];

}
