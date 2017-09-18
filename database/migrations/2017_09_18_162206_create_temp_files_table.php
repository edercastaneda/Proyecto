<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_files', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->integer('user_id')->index('fk_temp_files_users1_idx');
            $table->binary('data', 65535);
            $table->string('nombre');
            $table->string('type');
            $table->integer('size');
            $table->char('extension', 4);
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
        Schema::drop('temp_files');
    }
}
