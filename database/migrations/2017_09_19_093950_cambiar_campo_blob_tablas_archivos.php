<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CambiarCampoBlobTablasArchivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `alumno_images` CHANGE COLUMN `data` `data` MEDIUMBLOB NOT NULL AFTER `alumno_id`;');
        DB::statement('ALTER TABLE `temp_files` CHANGE COLUMN `data` `data` MEDIUMBLOB NOT NULL AFTER `id`;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
