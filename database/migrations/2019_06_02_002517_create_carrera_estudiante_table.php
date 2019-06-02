<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_estudiante', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('rutEstudiante',128);
            $table->string('id_Carrera',128);

            $table->timestamps();
            //relaciones
            $table->foreign('rutEstudiante')->references('rut')->on('estudiantes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_Carrera')->references('idCarrera')->on('carreras')
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
        Schema::dropIfExists('carrera_estudiante');
    }
}
