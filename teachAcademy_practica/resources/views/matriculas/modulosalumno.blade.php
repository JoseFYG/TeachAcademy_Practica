@extends('plantillas.plantilla1')
@section('titulo')
    Modulos Alumno
@endsection
@section('cabecera')
    Matrícula Alumno: {{ $alumno->apellidos . ', ' . $alumno->nombre }}
@endsection
@section('contenido')
    <!-- Mostramos mensajes si los hay -->
    @if ($texto = Session::get('mensaje'))
        <p class="bg-blue-400 text-white p-2 my-3 font-bold">{{ $texto }}</p>
    @endif
    <a href="{{route('matriculas.create', $alumno)}}" class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow text-xs">
        <i class="fa fa-plus"></i> Nueva Asignatura</a>
    <div class="text-center grid grid-cols-6 py-2 gap-2 mt-10 border-2 border-blue-200 shadow">
        <div class="font-bold text-base text-gray-700">Código</div>
        <div class="font-bold text-base text-gray-700">Asignatura</div>
        <div class="font-bold text-base text-gray-700">Nota</div>
        <div class="font-bold text-base text-gray-700">Matriculado</div>
        <div class="font-bold text-base text-gray-700 col-span-2 text-center">Acciones</div>
    </div>
    <div class="text-center grid grid-cols-6 py-2 gap-2 mt-10 border-2 border-blue-200 shadow align-middle text-xs">
        @php $token=1 @endphp
        @foreach ($asignaturas as $asignatura)
            @php
            $color = $asignatura->pivot->nota < 5 ? 'text-red-600' : 'text-green-700'; @endphp
            <div class="{{ $color }} p-2">
                {{ $asignatura->id }}
            </div>
            <div class="{{ $color }} p-2">
                {{ $asignatura->nombre }}
            </div>
            <div class="{{ $color }} p-2">
                {{ $asignatura->pivot->nota }}
            </div>
            <div class="{{ $color }} p-2">
                {{ $asignatura->pivot->created_at }}
            </div>
            <div class="p-2">

                <a href="{{ route('matriculas.edit', [$alumno, $asignatura, $token]) }}"
                    class="bg-purple-400 hover:bg-purple-600 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fas fa-edit"></i> Calificar</a>
            </div>
            <div >
                <form action="{{ route('matriculas.borrar', [$alumno, $asignatura]) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit"
                        class="bg-yellow-700 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow"
                        onclick="return confirm('¿Desea dar de baja a {{ $alumno->apellidos . ', ' . $alumno->nombre }} de la asignatura {{ $asignatura->nombre }} ?')">
                        <i class="fas fa-trash"></i> Borrar</button>
                </form>
            </div>
        @endforeach
    </div>
    <div class="mt-8 text-right">
        <a href="{{ route('alumnos.show', $alumno) }}"
            class="bg-blue-600 hover:bg-blue-800 rounded text-white font-bold py-2 px-4 shadow text-xs">
            <i class="fas fa-backward"></i> Volver</a>
    </div>

@endsection
