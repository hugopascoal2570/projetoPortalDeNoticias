<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('image')->default('default.png');
            $table->string('slug');
            $table->text('body');
            $table->string('subTitulo');
            $table->string('autor');
            $table->string('categoria');
            $table->string('destaque')->default(0);
            $table->string('novas')->default(0);
            $table->string('agora')->default(0);
            $table->timestamps();
        });
            Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('color');
            $table->string('hexadecimal')->default('#000000');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('categorias');

    }
}
