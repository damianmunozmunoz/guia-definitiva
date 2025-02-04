<!--La hacemos hija de la vista master-->
@extends('master')

<!--section(nombre_sección, contenido_si_es_yield) es una manera rápida de introducir contenido pequeño-->
@section('title', 'Page title');

<!--Esta forma es para más contenido y termina con endsection-->
@section('sidebar')
    @parent
    <p>Esto se añade a la sidebar porque tiene parent, si no lo tuviera la sobreescribiría</p>
@endsection

@section('content')
    <p>Aquí irá el contenido de mi página</p>
    <!--Con esto podremos pasarle la variable $name por la ruta-->
    <p>Hello, {{$name}}</p>
@endsection

