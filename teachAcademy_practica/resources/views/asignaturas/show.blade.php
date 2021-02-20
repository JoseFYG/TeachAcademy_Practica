@extends('plantillas.plantilla1')
@section('titulo')
Detalle Asignatura
@endsection
@section('cabecera')
Detalle Asignatura ({{$asignatura->id}})
@endsection
@section('contenido')
<div class="flex items-center w-full justify-center">

    <div class="max-w-xs">
        <div class="bg-white shadow-xl rounded-lg py-3">
            <div class="photo-wrapper p-2">
                <img class="w-32 h-32 rounded-full mx-auto" src="{{asset('storage/img/default.png')}}" alt="Imagen de {{$asignatura->nombre}}">
            </div>
            <div class="p-2">
                <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{$asignatura->nombre}}</h3>
                <div class="text-center text-gray-400 text-xs font-semibold">
                    <p>{{$asignatura->id}}</p>
                </div>
                <table class="text-xs my-3">
                    <tbody><tr>
                        <td class="px-2 py-2 text-gray-500 font-semibold">Registro Creado</td>
                        <td class="px-2 py-2">{{$asignatura->created_at}}</td>
                    </tr>
                    <tr>
                        <td class="px-2 py-2 text-gray-500 font-semibold">Registro Actualizado</td>
                        <td class="px-2 py-2">{{$asignatura->updated_at}}</td>
                    </tr>
                    <tr>
                        <td class="px-2 py-2 text-gray-500 font-semibold">Horas</td>
                        <td class="px-2 py-2">{{$asignatura->horas}}</td>
                    </tr>
                </tbody></table>

                <div class="text-center my-3">
                    <a class="text-xs text-indigo-500 italic hover:underline hover:text-indigo-600 font-medium"
                    href="{{route('matriculas.alumnosasignatura', $asignatura)}}">Ver Alumnos matriculados</a>
                </div>

            </div>
        </div>
    </div>

    </div>
    <div class="container text-center mt-10">
        <a href="{{route('asignaturas.index')}}"
            class="bg-yellow-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-home"></i> Inicio</a>
    </div>
@endsection
