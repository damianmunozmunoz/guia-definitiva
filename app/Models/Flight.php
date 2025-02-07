<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //Añadimos la tabla asociada a este modelo con snake_case así
    protected $table = 'flights';
}
