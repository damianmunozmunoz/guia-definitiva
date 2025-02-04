@extends('master');

@section('title', 'Estructuras');

@section('content')

<!--Condicionales-->
@if(count($records) == 1)
    I have 1 record!
@elseif(count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif

@isset($records)
    records está definido y no es nulo
@endisset

@empty($records)
    records está vacio
@endempty

@switch($i)
    @case(1)
        Primer caso
        @break

    @default
        Default case
@endswitch

<!--Bucles-->
@foreach ($users as $user)
    @if ($user->type == 1)
        @continue
    @endif

    <li>{{$user->name}}</li>

    @if ($user->number == 5)
        @break
    @endif
@endforeach

@for ($i = 0; $i < 10; i++)
    The current value is {{$i}}
@endfor

@foreach ($users as $user)
    <p>This is user {{$user->id}}</p>    
@endforeach

@forelse ($users as $user)
    <li>{{$user->name}}</li>
@empty
    <p>No users</p>
@endforelse

@while (true)
    <p>I'm looping forever.</p>
@endwhile

<!--Con la variable $loop podemos acceder al ciclo de iteración actual-->
@foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration
    @endif

    @if ($loop->last)
        This is the last iteration
    @endif

    <p>This is user {{$user->id}}</p>
@endforeach

<!--Inicio de sesión-->
@auth
    Usuario autenticado
@endauth

@guest
    Usuario NO autenticado
@endguest

@auth('admin')
    Usuario admin autenticado
@endauth

@guest('admin')
    Usuario admin NO autenticado
@endguest

<!--Comentarios-->
{{--Los comentarios en blade se escribirán así--}}

<!--php-->
{{--Existe la directiva php para introducir declaración de variables u operaciones con estas
en forma de código php nativo--}}
@php
    $counter = 1;
@endphp
@endsection