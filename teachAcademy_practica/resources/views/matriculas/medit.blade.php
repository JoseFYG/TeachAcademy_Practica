@extends('plantillas.plantilla1')
@section('titulo')
Editar Matricula
@endsection
@section('cabecera')
Alumno: {{$alumno->apellidos.", ".$alumno->nombre}} [{{$asignatura->nombre}}]
@endsection
@section('contenido')
<form method="POST" action="{{route('matriculas.update', [$alumno, $asignatura, $token])}}" name="s">
    @csrf
    @method('PUT')
    <label class="block">
        <span class="text-gray-700 font-bold">NOTA</span>
        <input class="form-input mt-1 block w-1/4 p-1"
            placeholder="Nota" name="nota" type="number" min='0' max='10' step="0.05" required />
    </label>
    <div class="mt-2 text-center">
        <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fas fa-send"></i> Enviar</button>
        <a href="{{route('matriculas.asignaturasalumno', $alumno)}}" class=" ml-2 bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fas fa-backward"></i> Volver</a>
    </div>
</form>
@endsection
