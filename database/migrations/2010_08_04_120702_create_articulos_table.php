<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articulos', function(Blueprint $table)
		{
                  $table->increments('id');
                  $table->string('nombre_producto');
                  $table->string('modelo');
                  $table->string('estado');
                  $table->string('descripcion');
                  $table->string('localizacion');
                  $table->double('precio_venta')->default(-1);
                  $table->dateTime('fecha_inicio');
                  $table->dateTime('fecha_final');
                  $table->dateTime('fecha_venda');
                  $table->double('precio_inicial', 20, 2);
                  $table->double('incremento_precio', 20, 2);
                  $table->double('puja_mayor', 20, 2);
                  $table->integer('porrogado');
                  $table->integer('subastador_id')->unsigned();
                  $table->foreign('subastador_id')->references('id')->on('usuarios');
                  $table->integer('subcategoria_id')->unsigned();
                  $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
                  $table->integer('comprador_id')->unsigned()->nullable();
                  $table->foreign('comprador_id')->references('id')->on('usuarios');
                   $table->integer('metodo_pago_id')->unsigned();
                  $table->foreign('metodo_pago_id')->references('id')->on('metodo_pagos');
                   $table->integer('metodo_envio_id')->unsigned();
                  $table->foreign('metodo_envio_id')->references('id')->on('metodo_envios');
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
		Schema::drop('articulos');
	}

}
