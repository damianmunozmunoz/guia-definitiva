<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Se llamará cuando se ejecute la migración
     */
    public function up(): void
    {
        //Así se crean las tablas con un id autoincrementable
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('airline');
            $table->timestamps();
        });
        /*Podemos verificar si ya existen en el schema de la bd la tabla o la columna en una tabla con las siguientes funciones
        if(Schema::hasTable('flights')) {
            //La tabla flights existe...
        }

        if(Schema::hasColumn('flights', 'name')) {
            //La tabla flights tiene la columna name...
        }
        */

        /*Si queremos modificar una tabla ya creada en una migración anterior sin borrar los datos deberemos usar Schema::table*/
        Schema::table('users', function (Blueprint $table) {
            //Se añade la columna votes a la tabla users
            $table->integer('votes');
            //Se añade la columna email a la tabla users y puede ser nula
            $table->string('email')->nullable();
            //Modifica la columna name que ya existia para que pueda ser nula y de longitud 50
            $table->string('name', 50)->nullable()->change();
            //Modifica el nombre de la columna name a nombre
            $table->renameColumn('name', 'nombre');
            //Elimina la columna votes
            $table->dropColumn('votes');
            //Elimina varias columnas a la vez
            $table->dropColumn(['votes', 'avatar', 'location']);
        });

        Schema::table('posts', function (Blueprint $table) {
            //Crea una clave ajena
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //
            $table->dropForeign('posts_user_id_foreign');
        });
    }

    /**
     * Se llamará cuando se haga un rollback de la migración
     */
    public function down(): void
    {
        Schema::drop('flights');
    }
};
