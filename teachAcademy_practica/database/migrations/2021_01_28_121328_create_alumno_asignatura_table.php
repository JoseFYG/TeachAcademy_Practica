<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_asignatura', function (Blueprint $table) {
            $table->id();
            $table->decimal('nota', 4, 2)->nullable();
            $table->ForeignId('alumno_id');
            $table->ForeignId('asignatura_id');
            $table->timestamps();
            //nos creamos las foreign
            $table->foreign('alumno_id')
                ->references('id')
                ->on('alumnos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('asignatura_id')
                ->references('id')
                ->on('asignaturas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_asignatura');
    }
}
