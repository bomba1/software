<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajoTitulacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_titulacions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('idTrabajo',128)->unique();
            $table->string('nombre',128);
            $table->enum('semestreInsc',['1','2']);
            $table->integer('añoInsc')->unsigned();
            $table->date('FechaInicio')->nullable();
            $table->date('FechaTermino')->nullable();
            $table->enum('estado',['INGRESADA','ACEPTADA','FINALIZADA','ANULADA']);
            $table->string('id_actividad',128);
            $table->string('id_comision',128);

            $table->timestamps();

            
            //relaciones
            $table->foreign('id_actividad')->references('id_type')->on('tipo_actividads')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_comision')->references('idComision')->on('comisions')
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
        Schema::dropIfExists('trabajo_titulacions');
    }
}
