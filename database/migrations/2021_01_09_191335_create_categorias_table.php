<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('ubicacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });


        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('habilidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->string('imagen');
            $table->text('habilidades_id');
            $table->string('titulo');
            $table->boolean('activa')->default(true);
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('experiencia_id')->constrained()->onDelete('cascade');
            $table->foreignId('ubicacion_id')->constrained()->onDelete('cascade');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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

        Schema::dropIfExists('habilidades');
        Schema::dropIfExists('salarios');
        Schema::dropIfExists('experiencias');
        Schema::dropIfExists('ubicacions');
        Schema::dropIfExists('vacantes');
        Schema::dropIfExists('categorias');

    }
}