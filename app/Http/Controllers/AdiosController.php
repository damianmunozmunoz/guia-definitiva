<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdiosController extends Controller
{
    //Aquí añadimos el método index() al que nos referíamos en la ruta /adios
    public function index(){
        return "Adios mundo";
    }
    //No funciona si no cambiamos el archivo /bootstrap/app.php
}
