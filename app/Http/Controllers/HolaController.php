<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    /*Aquí creamos un método show llamado en web.php pasandole el parámetro de ruta $nombre*/
    public function show($nombre){
        $data['nombre'] = $nombre;
        return view('hola', $data);
    }
    /*Así estamos llamando a una vista llamada "hola" y le estamos pasando
    un array con los datos necesarios que es $data*/
    /*Crearemos una vista en /resources/views/ llamada hola.blade.php
    Podemos hacerlo con el comando php artisan make:view hola*/
}
