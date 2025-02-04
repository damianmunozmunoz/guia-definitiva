@extends('master');

@section('title', 'Estructuras');

@section('content')
<form method="POST" action="{{route('formulario')}}">
    @csrf {{--Incluirlo siempre para evitar ataques csrf--}}
    <input type="email" name="email"><br>
    <input type="text" name="asunto"><br>
    <textarea name="contenido"></textarea><br>
    <button type="submit">Enviar</button>
    {{--Si vamos a usar un método PUT, PATCH o DELETE deberemos introducirlos así:
    @method('PUT')--}}
</form>
{{--Para manejar este formulario seguiremos los siguientes pasos:
1º crearemos la ruta "formulario" y el controlador FormularioController
--}}
@endsection
