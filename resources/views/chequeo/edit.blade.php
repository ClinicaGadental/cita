@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Listado </h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número de Diente</th>
                        <th>Daño</th>
                        <th>Color</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dientes as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tooth_number }}</td>
                            <td>

                                @if ($item->color == '#ff0000')
                                    Amalgana desadaptada
                                @endif
                                @if ($item->color == '#00ff00')
                                    Fractura
                                @endif
                                @if ($item->color == '#0000ff')
                                    Corona buena
                                @endif
                                @if ($item->color == '#fff000')
                                    Perno bueno
                                @endif
                                @if ($item->color == '#800080')
                                    Diente sano
                                @endif
                                @if ($item->color == '#ff00ff')
                                    Diente ausente
                                @endif
                                @if ($item->color == '#a52a2a')
                                    Corona desadaptada
                                @endif
                            </td>
                            <td>

                                <div
                                    style="border-radius: 50%; background-color: {{ $item->color }}; width: 20px; height:20px; padding: 10px;">
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
