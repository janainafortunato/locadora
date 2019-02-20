<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->unsignedInteger('cliente_id');
            $table->string('date');
            $table->integer('time');
           // $table->integer('cliente_id') -> unsignerd(); //id da tabela cliente.
            $table->foreign('cliente_id') reference('id')-> on ('cliente');
            //$table->interger('movie_id') -> unsignerd(); // id da tabela filme.
           // $table->foreign('movie_id') reference('id') -> on('movie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
