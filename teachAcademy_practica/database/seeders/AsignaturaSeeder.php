<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asignatura;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asignatura::create([
            'nombre'=>'DWES',
            'horas'=>8
            ]
        );
        Asignatura::create([
            'nombre'=>'DWECL',
            'horas'=>6
            ]
        );
        Asignatura::create([
            'nombre'=>'EINEM',
            'horas'=>4
            ]
        );
        Asignatura::create([
            'nombre'=>'DIWEB',
            'horas'=>5
            ]
        );
        Asignatura::create([
            'nombre'=>'DAWEB',
            'horas'=>6
            ]
        );
        Asignatura::create([
            'nombre'=>'HLC',
            'horas'=>3
            ]
        );


    }
}
