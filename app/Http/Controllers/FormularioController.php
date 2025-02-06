<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function store(Request $r){
        $c = new Contact();
        $c->email = $r->email;
        $c->asunto = $r->asunto;
        $c->save();
        return redirect()->route('gracias.index');
    }
}
