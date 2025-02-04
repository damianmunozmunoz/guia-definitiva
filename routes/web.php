<?php

use Illuminate\Support\Facades\Route;

//Esta es la ruta creada por defecto que nos lleva a la url home (/)
Route::get('/', function () {
    return view('welcome');
})/*->middleware(EnsureTokenIsValid::class)*/;

//Para crear una ruta hacian un controlador añadiremos el siguiente código
Route::get('/hello', function(){
    return "Hola mundo";
});
/*La sintaxis será la siguiente
Route::get('ruta a partir del home /', function() {
    return lo que queramos que devuelva;
});
*/
//Las funciones anónimas no se usan asi que en su lugar lo redirigiremos a un controlador
//Route::get('/adios', 'AdiosController@index')->name('vistaadios');
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
/*Route::match(['get', 'post'], '/', function(){
    //
});

Route::any('/', function(){

});

/*Para cargar una vista en el controlador usaremos view*/
/*Route::view('/welcome', 'welcome');
//Llama a la vista con nombre welcome en /resources/views llamada welcome.blade.php

/*Route::view('/welcome', 'welcome', ['name' => 'Damian']);
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
/*Route::get('/user/{name?}', function($name = null){
    return $name ? "Hola, " . $name : "Hola, usuario desconocido";
});
/*Al visitar /user/Juan -> "Hola, Juan"
Al visitar /user/ -> "Hola, usuario desconocido"
*/

//Con parámetro default
/*Route::get('/user/{surname?}', function($surname = Munoz){
    return "Hola, Damian" . $surname;
});
/*Al visitar /user/Gomez -> "Hola, Damian Gomez"
Al visitar /user/ -> "Hola, Damian Munoz"
*/

//Múltiples parámetros opcionales
/*Route::get('/profile/{name?}/{age?}/{city?}', function($name = "Damian", $age = 20, $city = null){
    return "Nombre: $name, Edad: $age" . ", Ciudad: " . ($city ?? "No especificada"); //Otra forma de poner que es opcional
});
/*Al visitar /profile/Juan/25/Madrid -> Nombre: Juan, Edad: 25, Ciudad: Madrid
Al visitar /profile/Juan/25/ -> Nombre: Juan, Edad: 25, Ciudad: No especificada
Al visitar /profile/Juan//Madrid -> Nombre: Juan, Edad: 20, Ciudad: Madrid
Al visitar /profile/ -> Nombre: Damian, Edad: 20, Ciudad: No especificada
*/

/*Para cargar una vista desde el controlasdor primero crearemos una ruta como la siguiente*/
//Route::get('/hola/{nombre?}', 'HolaController@show');
//Esto llamará a la función show() del controlador HolaController en /app/Http/Controllers

/*Podemos añadir nombres a nuestras rutas para que sea más facil llamarlas más adelante*/
//Route::get('/perfil', 'UserProfileController@show')->name('perfil');
/*Ahora podremos referirnos a esta ruta como route('perfil')*/
/*Aquí un ejemplo*/
/*Route::get('/ines/{name?}/{age?}/{city?}', function($name = "Ines", $age = 21, $city = null){
    return "Nombre: $name, Edad: $age" . ", Ciudad: " . ($city ?? "No especificada");
})->name('ines');
/*return redirect()->route('ines', [$name => 'Ines', $age => 21, $city => 'Zaragoza']);
Esto podriamos ponerlo para redirigirnos directamente a una página con esta ruta*/
//Podemos redirigir también de esta manera
//Route::redirect('/here', '/there');
/*No podemos hacer formularios siguiendo los métodos de ruta PUT, PATCH o DELETE, solo GET y POST pero podemos
poner lo siguiente:
<form action="x" method="POST">
    @method('DELETE')
</form>
*/
/*¡¡¡IMPORTANTE!!! Si hay 2 rutas iguales como /profile/damian y /profile/{name} deberemos poner
primero /profile/damian porque si no interpretará que damián es una variable de /profile/{name}*/

// Operaciones REST para recurso user
/*Route::get('user', 'UserController@index')->name('user.index'); 
// Recupera todos los usuarios.
Route::get('user/{user}', 'UserController@show')->name('user.show'); 
// Recupera usuario con id=user.
Route::get('user/crear', 'UserController@create')->name('user.create');
// Lanza el formulario de creación de usuarios.
Route::post('user/{user}', 'UserController@store')->name('user.store');
// Recoge los datos del formulario y los inserta en la BD.
Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit');
// Lanza el formulario de modificación de usuarios.
Route::patch('user/{user}', 'UserController@update')->name('user.update'); 
// Recoge los datos del formulario y modifica el usuario de la BD.
Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy'); 
// Elimina al usuario de la BD.
//Hay que ser muy escrupuloso con los nombres y URLs de estas operaciones
/*Todas estas lineas se pueden resumir simplemente poniendo la siguiente*/
Route::resource('user', 'UserController');

/*Así le pasamos parámetros a la variable $name de la vista child.blade.php*/
Route::get('/child', function () {
    return view('child', ['name' => 'Damián']);
});

Route::get('/form', function(){
    return view('formularios');
});

Route::post('/formulario', 'FormularioController@store')->name('formulario');