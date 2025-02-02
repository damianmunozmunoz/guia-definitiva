<?php

use Illuminate\Support\Facades\Route;

//Esta es la ruta creada por defecto que nos lleva a la url home (/)
Route::get('/', function () {
    return view('welcome');
});

//Para crear una ruta hacian un controlador añadiremos el siguiente código
Route::get('/hola', function(){
    return "Hola mundo";
});
/*La sintaxis será la siguiente
Route::get('ruta a partir del home /', function() {
    return lo que queramos que devuelva;
});
*/
//Las funciones anónimas no se usan asi que en su lugar lo redirigiremos a un controlador
Route::get('/adios', 'AdiosController@index');
/*Donde la sintaxis será
Route::get('ruta a partir del home /', Controlador@métododelcontrolador);
* Podemos crear el controlador con php artisan make:controller AdiosController
*/
/*Además de get tenemos los siguientes métodos
- get: para obtener recursos del servidor. Ej.: obtener info del usuario
- post: para crear recursos en el servidor. Ej.: crear un nuevo usuario en la bd
- put: actualizar recursos completos en el servidor. Ej.: actualizar toda la info de un usuario en la bd
- patch: actualizar parte de un recurso en el servidor. Ej.: actualizar solo el correo del usuario
- delete: eliminar recursos del servidor. Ej.: eliminar un usuario de la bd
Para emplear varios a la vez podemos especificar los que queremos con match o todos con any
*/
Route::match(['get', 'post'], '/', function(){
    //
});

Route::any('/', function(){

});

/*Para cargar una vista en el controlador usaremos view*/
Route::view('/welcome', 'welcome');
//Llama a la vista con nombre welcome en /resources/views llamada welcome.blade.php

Route::view('/welcome', 'welcome', ['name' => 'Damian']);
//Llama a la vista welcome y además le pasa la variable name con valor Damian para que la use cuando quiera

/*Podemos pasarle a las rutas tantos parámetros como queramos y podrían ser obligatorios u opcionales*/
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId){
    //
});