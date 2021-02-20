@extends('plantillas.plantilla1')
@section('titulo')
    Crear Matricula
@endsection
@section('cabecera')
    Asignatura: {{ $asignatura->nombre }}
@endsection
@section('contenido')
    @if ($total == 0)
        <p class="p-4 bg-yellow-700 font-bold text-white mb-5">Esta asignatura ya es cursada por todos los alumnos</p>
        <a href="{{ route('matriculas.alumnosasignatura', $asignatura) }}"
            class=" ml-2 bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fas fa-backward"></i> Regresar</a>
    @else
        <form action="{{ route('matriculas1.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $asignatura->id }}" name="asignatura_id">
            <div class="text-center grid grid-cols-2 py-2 gap-2 mt-10 border-2 shadow rounded rounded-md">
                <div>
                    Nombre
                </div>
                <div>
                    Matricular
                </div>
            </div>
            <div class="text-center grid grid-cols-2 py-2 gap-2 mt-10 border-2 shadow rounded rounded-md">
                @foreach ($alumnos as $item)
                    <div class="text-left ml-5">
                        {{ $item->apellidos . ', ' . $item->nombre }}
                    </div>

                    <div>
                        <input type="checkbox" name="misAlumnos[]" value="{{ $item->id }}" class="mr-4" />
                    </div>

                @endforeach
            </div>
            <div class="mt-4 text-center col-span-2">
                <button type="submit" class="bg-blue-400 hover:bg-blue-600 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fas fa-plus"></i> Matricular</button>
                <button type="reset"
                    class="bg-yellow-400 hover:bg-yellow-600 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fas fa-brush"></i> Limpiar</button>
                <a href="{{ route('matriculas.alumnosasignatura', $asignatura) }}"
                    class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-3 px-4 shadow">
                    <i class="fas fa-backward"></i> Regresar</a>

            </div>

        </form>
        <div class="mt-5">
            {{$alumnos->links()}}
        </div>
    @endif
@endsection
