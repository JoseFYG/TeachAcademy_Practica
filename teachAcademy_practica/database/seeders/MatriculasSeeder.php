<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\{Alumno, Asignatura};

class MatriculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codAl=Alumno::orderBy('id')->pluck('id')->toArray();
        $codAsig=Asignatura::orderBy('id')->pluck('id')->toArray();
        for($i=0; $i<count($codAl); $i++){
            //elijo al alumno de codigo $cod[$i]
            $esteAlumno=Alumno::find($codAl[$i]);
            //elegimos una cantida aleatora de ASIGNATURAS PARA MATRICULARLE
            $cantidadAsig=rand(0, count($codAsig));

            shuffle($codAsig);  //4, 1, 2
            for($j=0; $j<$cantidadAsig; $j++){
                $nota=rand(0, 10);
                $esteAlumno->asignaturas()->attach($codAsig[$j], ['nota'=>$nota]);
            }
        }
    }
}
