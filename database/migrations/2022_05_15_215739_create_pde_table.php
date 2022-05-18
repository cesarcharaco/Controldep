<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pde', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_asignacion');
            $table->date('fecha');
            $table->float('ponderacion_eval');
            $table->float('nota_eval')->nullable();
            $table->string('instrumento_eval');
            $table->enum('nota_cargada',['Si','No'])->default('No');
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
        Schema::dropIfExists('pde');
    }
}
