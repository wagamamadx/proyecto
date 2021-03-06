<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePujasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pujas', function(Blueprint $table)
		{
            $table->increments('id');
            $table->double('cantidad', 20, 2);
            $table->boolean('superada');
            $table->integer('confpuja_id')->unsigned()->nullable();
            $table->foreign('confpuja_id')->references('id')->on('configuracion_pujas');
            $table->integer('articulo_id')->unsigned();
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->integer('pujador_id')->unsigned();
            $table->foreign('pujador_id')->references('id')->on('usuarios');
            $table->dateTime('fecha_puja');
            $table->rememberToken();
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
		Schema::drop('pujas');
	}

}
