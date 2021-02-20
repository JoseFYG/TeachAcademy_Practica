<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'horas'];

    public function alumnos(){
        return $this->belongsToMany('App\Models\Alumno')
         ->withPivot('nota')
         ->withTimestamps();
    }

    //devolverá los alumnos que NO tienen la asignatura en cuestión
    public function alumnosOut(){
        $misalumnos = $this->alumnos()->pluck('alumnos.id');
        $alumnosSin = Alumno::whereNotIn('id', $misalumnos)->orderBy('apellidos');
        return $alumnosSin;

    }
}
