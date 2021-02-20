@extends('plantillas.plantilla1')
@section('titulo')
Alumnos
@endsection
@section('cabecera')
Gestión de Alumnos
@endsection
@section('contenido')
@if($text=Session::get("mensaje"))
    <p class="text-danger p-2 my-3">{{$text}}</p>
@endif
<div class="grid grid-cols-2 gap-5 py-2">
    <div class="py-2">
<a href="{{route('alumnos.create')}}"
            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-plus"></i> Nuevo Alumno</a>
    </div>
    <div class="py-2 text-right ">
        <form name="search" action="{{route('alumnos.index')}}">
            <i class="fa fa-search"></i>
            <span class="font-bold text-gray-700 mx-2">Apellidos:</span>
            <select name="apellidos" class="form-select mx-2" onchange="this.form.submit()">
                <option value="%">Todos</option>
                <option value="1" @if($selectOption=='1') selected @endif>A~F</option>
                <option value="2" @if($selectOption=='2') selected @endif>G~L</option>
                <option value="3" @if($selectOption=='3') selected @endif>M~R</option>
                <option value="4" @if($selectOption=='4') selected @endif>S~Z</option>
            </select>
        </form>
    </div>
</div>
<div class="text-center grid grid-cols-5 py-2 gap-2 mt-10 border-2 border-blue-200 shadow">
    <div class="font-bold text-xl text-gray-700">Detalle</div>
    <div class="font-bold text-xl text-gray-700">Nombre</div>
    <div class="font-bold text-xl text-gray-700">Mail</div>
    <div class="font-bold text-xl text-gray-700">Foto</div>
    <div class="font-bold text-xl text-gray-700">Acciones</div>
</div>
<div class="text-center grid grid-cols-5 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5">
    @foreach($alumnos as $item)
    <div class="mb-5">
        <a href="{{route('alumnos.show', $item)}}"
        class="bg-purple-400 hover:bg-green-200 rounded text-white font-bold py-2 px-4 shadow">
        <i class="fa fa-info"></i> Detalle</a>
    </div>
    <div>
        {{$item->apellidos.", ".$item->nombre}}
    </div>
    <div>
        {{$item->mail}}
    </div>
    <div class="mx-auto">
        <img src="{{asset($item->foto)}}" class="rounded-full align-middle h-auto w-10 border-2">
    </div>
    <div>
        <form name="a" action="{{route('alumnos.destroy', $item)}}" method='POST' class="form-inline">
            @csrf
            @method("DELETE")
            <a href="{{route('alumnos.edit', $item)}}" class="btn btn-warning btn-lg ml-4"><i class="fa fa-edit"></i> Editar</a>
            <button type="submit" class="btn btn-danger btn-lg ml-4" onclick="return confirm('¿Borrar Alumno?')">
                <i class="fas fa-trash"></i> Borrar</button>
        </form>
    </div>

    @endforeach


</div>
<div class="mt-10">
    {{$alumnos->links()}}
</div>


@endsection
