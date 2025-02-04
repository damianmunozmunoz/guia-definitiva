<html>
    <head>
        <!--yield(nombre_sección) muestra el contenido de una sección determinada-->
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        <!--section define una sección de contenido-->
        @section('sidebar')
            This is the master sidebar
        <!--show define y muestra el contenido de la sección-->
        @show

        <div class="'container">
            @yield('content')
        </div>
        <!--Al crear una vista secundaria se deberá usar extends(nombre_layout) para especificar que layout se usará
        Las vistas secundarias pueden inyectar contenido en las secciones de esta mediante directivas section
        Hagamos por ejemplo la vista child.blade.php-->
    </body>
</html>
