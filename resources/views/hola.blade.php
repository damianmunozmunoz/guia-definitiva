<body>
    <!--En esta vista añadiremos lo que queremos que se muestre al acceder a /hola/{nombre}
    Por ejemplo:-->
    Saludos, {{$nombre}}.
    Ha ingresado en el sitio web DWES
    <!--Añadimos un enlace con route() con el nombre de la ruta que hemos puesto-->
    <a href="<?= route('vistaadios')?>">A la página adios</a>
</body>
