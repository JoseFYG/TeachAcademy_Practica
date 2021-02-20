@extends('plantillas.plantilla1')
@section('titulo')
    Crear Matricula
@endsection
@section('cabecera')
    Alumno: {{ $alumno->apellidos . ', ' . $alumno->nombre }}
@endsection
@section('contenido')
    @if ($total == 0)
        <p class="p-4 bg-yellow-700 font-bold text-white mb-5">Este Alumno YA cursa todos las asignaturas</p>
        <a href="{{ route('matriculas.asignaturasalumno', $alumno) }}"
            class=" ml-2 bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fas fa-backward"></i> Regresar</a>
    @else
        <form action="{{ route('matriculas.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $alumno->id }}" name="alumno_id">
            <div class="text-center grid grid-cols-{{ $total }} py-2 gap-2 mt-10 border-2 shadow rounded rounded-md">
                @foreach ($asignaturas as $asig)
                    <div class="p-4">
                        <input type="checkbox" name="misAsignaturas[]" value="{{ $asig->id }}" class="mr-4" />
                        {{ $asig->nombre }}
                    </div>

                @endforeach
                <div class="mt-4 text-center col-span-{{ $total }}">
                    <button type="submit"
                        class="bg-blue-400 hover:bg-blue-600 rounded text-white font-bold py-2 px-4 shadow">
                        <i class="fas fa-plus"></i> Matricular</button>
                    <button type="reset"
                        class="bg-yellow-400 hover:bg-yellow-600 rounded text-white font-bold py-2 px-4 shadow">
                        <i class="fas fa-brush"></i> Limpiar</button>
                    <a href="{{ route('matriculas.asignaturasalumno', $alumno) }}"
                        class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-3 px-4 shadow">
                        <i class="fas fa-backward"></i> Regresar</a>

                </div>
            </div>
        </form>
    @endif
@endsection
