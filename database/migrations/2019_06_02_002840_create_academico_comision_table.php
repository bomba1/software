<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicoComisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academico_comision', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('rutAcademico',128);
            $table->string('idComision',128);

            $table->timestamps();

            $table->foreign('rutAcademico')->references('rut')->on('academicos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idComision')->references('idComision')->on('comisions')
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
        Schema::dropIfExists('academico_comision');
    }
}
