@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Listado de Chequeos</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('chequeo.create') }}" class="btn btn-primary mb-3">Crear Nuevo Chequeo</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID de Paciente</th>
                        <th>Número de Diente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Doctor</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chequeos as $chequeo)
                        <tr>
                            <td>
                                @isset($chequeo->user)
                                    {{ $chequeo->user->name }}
                                @endisset
                            </td>
                            <td>{{ $chequeo->tooth_number }}</td>
                            <td>{{ $chequeo->date }}</td>
                            <td>{{ $chequeo->time }}</td>
                            <td>
                                @isset($chequeo->doctor_logueado)
                                    {{ $chequeo->doctor_logueado->name }}
                                @endisset
                            </td>
                            <td>{{ $chequeo->observaciones }}</td>
                            <!-- Agregar esta línea para mostrar las observaciones -->
                            <td>
                                <a href="{{ route('chequeo.edit', $chequeo->id) }}" class="btn btn-sm btn-warning">Ver</a>
                                <form action="{{ route('chequeo.destroy', $chequeo->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Estás seguro de que quieres eliminar este chequeo?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
