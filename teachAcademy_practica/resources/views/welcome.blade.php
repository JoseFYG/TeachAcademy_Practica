@extends('plantillas.plantilla1')
@section('titulo')
Academia
@endsection
@section('cabecera')
Tech Academy
@endsection
@section('contenido')
<div class="grid grid-cols-2 gap-5 mt-10">
    <div class="col-span-2 mx-auto">
        <a href="{{route('alumnos.index')}}"
            class="bg-blue-500 hover:bg-blue-700 mr-12 rounded text-white font-bold py-2 px-4">
            <i class="fas fas-task"></i> Gestionar Alumnos</a>
        <a href="{{route('asignaturas.index')}}"
            class="bg-blue-500 hover:bg-blue-700 rounded text-white font-bold py-2 px-4">
            <i class="fas fas-task"></i> Gestionar Asignaturas</a>
    </div>
</div>
@endsection
