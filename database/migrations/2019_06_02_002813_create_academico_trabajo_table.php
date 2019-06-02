<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicoTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academico_trabajo', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->string('rutAcademico',128);
            $table->string('idTrabajo',128);

            $table->timestamps();

            //relaciones
            $table->foreign('rutAcademico')->references('rut')->on('academicos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idTrabajo')->references('idTrabajo')->on('trabajo_titulacions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academico_trabajo');
    }
}
