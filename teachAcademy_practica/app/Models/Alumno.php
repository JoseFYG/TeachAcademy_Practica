<?php

namespace App\Models;

use Database\Seeders\AsignaturaSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'apellidos', 'mail', 'foto'];

    //vamos a poner la relacion n m con asignaturas
    public function asignaturas(){
        return $this->belongsToMany('App\Models\Asignatura')
            ->withPivot('nota')
            ->withTimestamps();
    }
    //-----------------------------------------------------------------------------------------
    public function asignaturasOut(){
        //Id de las asignaturas que YA cursa el alumno
        $misAsignaturas=$this->asignaturas()->pluck('asignaturas.id');

        $asignaturasOut=Asignatura::whereNotIn('id', $misAsignaturas)->get();
        return $asignaturasOut;
    }

    //-----------------------------------------------------------------------------------------
    //implementando los scopes hay que seguir la nomenclatura del NOMBRE
    public function scopeApellidos($query, $v){
        if(!isset($v)){
            return $query->where('apellidos', 'like', '%');
        }
        Switch($v){
            case "%":
                return $query->where('apellidos', 'like', '%');
            case "1" :
                return $query->where('apellidos', 'like', 'a%')
                ->orWhere('apellidos', 'like', 'b%')
                ->orWhere('apellidos', 'like', 'c%')
                ->orWhere('apellidos', 'like', 'd%')
                ->orWhere('apellidos', 'like', 'e%')
                ->orWhere('apellidos', 'like', 'f%');
            case "2" :
                return $query->where('apellidos', 'like', 'g%')
                ->orWhere('apellidos', 'like', 'h%')
                ->orWhere('apellidos', 'like', 'i%')
                ->orWhere('apellidos', 'like', 'j%')
                ->orWhere('apellidos', 'like', 'k%')
                ->orWhere('apellidos', 'like', 'l%');
            case "3" :
                return $query->where('apellidos', 'like', 'm%')
                    ->orWhere('apellidos', 'like', 'n%')
                    ->orWhere('apellidos', 'like', 'o%')
                    ->orWhere('apellidos', 'like', 'p%')
                    ->orWhere('apellidos', 'like', 'q%')
                    ->orWhere('apellidos', 'like', 'r%');
            case "4" :
                return $query->where('apellidos', 'like', 's%')
                ->orWhere('apellidos', 'like', 't%')
                ->orWhere('apellidos', 'like', 'u%')
                ->orWhere('apellidos', 'like', 'v%')
                ->orWhere('apellidos', 'like', 'w%')
                ->orWhere('apellidos', 'like', 'x%')
                ->orWhere('apellidos', 'like', 'y%')
                ->orWhere('apellidos', 'like', 'z%');
        }
    }
}
