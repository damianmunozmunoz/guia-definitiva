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

/*Podemos pasarle a las rutas tantos parámetros como queramos y podrían ser obligatorios {} u opcionales {?}
Esto podemos explicarlo con los siguientes ejemplos*/

/*Parámetros obligatorios*/
Route::get('/posts/{id}', function($id){
    return "El ID del post es: " . $id;
});
/*Al visitar /posts/10 -> "El ID del post es: 10"
Al visitar /posts/ -> ERROR
*/

Route::get('/posts/{postId}/comments/{commentId}', function($postId, $commentId){
    return "Post ID: " . $postId . "Comment ID: " . $commentId;
});
/*Al visitar /posts/15/comments/24 -> "Post ID: 15 Comment ID: 24"
Al visitar /posts/15/comments/ -> ERROR*/

/*Parámetros opcionales*/
//Con parametro null
Route::get('/user/{name?}', function($name = null){
    return $name ? "Hola, " . $name : "Hola, usuario desconocido";
});
/*Al visitar /user/Juan -> "Hola, Juan"
Al visitar /user/ -> "Hola, usuario desconocido"
*/

//Con parámetro default
Route::get('/user/{surname?}', function($surname = Munoz){
    return "Hola, Damian" . $surname;
});
/*Al visitar /user/Gomez -> "Hola, Damian Gomez"
Al visitar /user/ -> "Hola, Damian Munoz"
*/

//Múltiples parámetros opcionales
Route::get('/profile/{name?}/{age?}/{city?}', function($name = "Damian", $age = 20, $city = null){
    return "Nombre: $name, Edad: $age" . ", Ciudad: " . ($city ?? "No especificada"); //Otra forma de poner que es opcional
});
/*Al visitar /profile/Juan/25/Madrid -> Nombre: Juan, Edad: 25, Ciudad: Madrid
Al visitar /profile/Juan/25/ -> Nombre: Juan, Edad: 25, Ciudad: No especificada
Al visitar /profile/Juan//Madrid -> Nombre: Juan, Edad: 20, Ciudad: Madrid
Al visitar /profile/ -> Nombre: Damian, Edad: 20, Ciudad: No especificada
*/

/*Para cargar una vista desde el controlasdor primero crearemos una ruta como la siguiente*/
Route::get('/hola/{nombre}', 'HolaController@show');
//Esto llamará a la función show() del controlador HolaController en /app/Http/Controllers
