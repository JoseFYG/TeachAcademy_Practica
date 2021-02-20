@extends('plantillas.plantilla1')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
@section('titulo')
Editar Asignatura
@endsection
@section('cabecera')
Editar Asignatura
@endsection
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger my-3 p-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form name="form" action="{{route('asignaturas.update', $asignatura)}}" method="POST" enctype="multipart/form-data" class="mt-3">
@csrf
@method("PUT")
<div class="row">
    <div class="col">
        <input type="nombre" name="nombre" value="{{$asignatura->nombre}}" class="form-control" required>
    </div>   
    <div class="col">
        <input type="number" name="apellidos" value="{{$asignatura->horas}}" class="form-control" required>
    </div>   
</div>
<div class="row mt-3">
    <div class="col">
        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Editar Asignatura</button>
        <a href="{{route('asignaturas.index')}}" class="btn btn-primary"><i class="fa fa-hose-user"></i> Inicio</a>
    </div>
</div>
</form>
@endsection