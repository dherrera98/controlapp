<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visado_entrada extends Model
{
    //
    protected $fillable = ["fecha_entrada", "motivo_entrada", "ip_entrada"];
}
