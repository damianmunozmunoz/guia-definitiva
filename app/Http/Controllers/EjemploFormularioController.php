<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjemploFormularioController extends Controller
{
    //Aquí se guardan los sectores disponibles
    const sectors = ['Electricista', 'Albañil', 'Fontanero', 'Carpintero', 'Transportista'];

    //Muestra la vista del formulario
    public function showForm()
    {
        return view('ejemplo-formulario');
    }

    //Muestra el resultado del formulario
    public function storeData(Request $request)
    {
        $email = $request->email;
        $sector = $request->sector;

        echo "El email seleccionado es: $email<br>";
        echo "La profesión seleccionada es: <b> " . self::sectors[$sector] . "</b>";
    }
}
