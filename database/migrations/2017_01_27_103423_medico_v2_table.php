<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicoV2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('medicos');

        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->unsignedInteger('especialidad_id');
            $table->timestamps();

            $table->foreign('especialidad_id')->references('id')->on('especialidads')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('medicos');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('medicos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('especialidad');
            $table->timestamps();
        });
    }
}
