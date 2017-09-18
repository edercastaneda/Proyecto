<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumno_id')->index('fk_alumno_images_alumnos1_idx');
            $table->binary('data', 65535);
            $table->string('nombre');
            $table->string('type');
            $table->integer('size');
            $table->char('extension', 4);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_images');
    }
}
