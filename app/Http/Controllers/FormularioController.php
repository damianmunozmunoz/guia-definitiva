<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function store(Request $r){
        $email = $r->get("email");
        $asunto = $r->get("asunto");
        request("asunto");
    }
}
