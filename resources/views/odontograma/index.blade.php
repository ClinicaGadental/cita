@extends('layouts.panel')


@section('content')

    <!-- Agrega el meta tag para el token CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Incluye el enlace a tu archivo de script -->
    <script src="{{ asset('public/js/script.js') }}"></script>

    <!-- Agrega los scripts de Highcharts para exportación y exportación de datos -->
@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
@endsection

<div class="card shadow">
    <div class="card-header border-0">
        <div class="container-fluid">
            <h1 class="text-center" style="margin-bottom: 20px; margin-top: 20px;">Odontograma</h1>
            <div style="margin-bottom: 40px;">
                <div class="form-group" style="margin-bottom: 20px;">
                </div>
            </div>

            <!-- Agrega el botón de impresión -->
            <div class="text-right">
                <button class="btn btn-secondary" onclick="imprimirPagina()">Imprimir</button>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="form-group text-center"
                    style="margin-bottom: 20px; flex: 2; display: flex; flex-direction: column; align-items: center;">
                    <label for="pacientes" style="margin-bottom: 0;">Pacientes</label>
                    <select id="pacientes" class="form-control" title="Seleccionar pacientes"
                        style="background-color: #5e72e4; color: white; margin-top: 10px;">
                        <option disabled selected>Seleccionar</option>
                        @foreach ($patients as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="width: 20px;"></div> <!-- Espacio entre los dos elementos -->
                <div class="form-group text-center"
                    style="margin-bottom: 20px; flex: 2; display: flex; flex-direction: column; align-items: center;">
                    <label for="doctores" style="margin-bottom: 0;">Doctor</label>
                    <select id="doctores" class="form-control" title="Seleccionar doctores"
                        style="background-color: #5e72e4; color: white; margin-top: 10px;">
                        <option disabled selected>Seleccionar</option>
                        @foreach ($doctors as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->name }}</option>
                        @endforeach
                    </select>
                </div>


            </div>




            <div class="row justify-content-center" style="margin-top: 40px;">
                <div class="col-12 text-center">
                    <div class="dientes-fila">
                        @for ($i = 18; $i >= 11; $i--)
                            <div class="diente" onclick="marcarDiente(this, {{ $i }})">
                                <img src="{{ asset('img/muela1.png') }}" alt="Diente {{ $i }}"
                                    style="width: 40px; height: 40px;">
                                <img src="{{ asset('img/diente.png') }}" alt="Diente {{ $i }}"
                                    style="width: 40px; height: 40px;">
                                <div>{{ $i }}</div>
                            </div>
                        @endfor
                        @for ($i = 28; $i >= 21; $i--)
                            <div class="diente" onclick="marcarDiente(this,{{ $i }})">
                                <img src="{{ asset('img/muela2.png') }}" alt="Diente {{ $i }}"
                                    style="width: 40px; height: 40px;">
                                <img src="{{ asset('img/diente.png') }}" alt="Diente {{ $i }}"
                                    style="width: 40px; height: 40px;">
                                <div>{{ $i }}</div>
                            </div>
                        @endfor
                    </div>
                    <div class="dientes-fila">
                        @for ($i = 31; $i <= 38; $i++)
                            <div class="diente" onclick="marcarDiente(this, {{ $i }})">
                                <img src="{{ asset('img/muela4.png') }}" alt="Diente {{ $i }}"
                                    style="width: 40px; height: 40px;">
                                <img src="{{ asset('img/diente.png') }}" alt="Diente {{ $i }}"
                                    style="width: 40px; height: 40px;">
                                <div>{{ $i }}</div>
                            </div>
                        @endfor
                        @for ($i = 41; $i <= 48; $i++)
                            <div class="diente" onclick="marcarDiente(this, {{ $i }})">
                                <img src="{{ asset('img/muela6.png') }}" alt="Diente {{ $i }}"
                                    style="width: 40px; height: 40px;">
                                <img src="{{ asset('img/diente.png') }}" alt="Diente {{ $i }}"
                                    style="width: 40px; height: 40px;">
                                <div>{{ $i }}</div>
                            </div>
                        @endfor


                    </div>
                </div>
            </div>
            <div>

                <div class="row">
                    <div class="col-3">
                        <div class="informacion-item">
                            <div class="informacion-icon" style="background-color: #ff0000;"
                                onclick="seleccionarColor('#ff0000')"></div>
                            <div>Amalgana desadaptada</div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="informacion-item">
                            <div class="informacion-icon" style="background-color: #00ff00;"
                                onclick="seleccionarColor('#00ff00')"></div>
                            <div>Fractura</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="informacion-item">
                            <div class="informacion-icon" style="background-color: #0000ff;"
                                onclick="seleccionarColor('#0000ff')"></div>
                            <div>Corona buena</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="informacion-item">
                            <div class="informacion-icon" style="background-color: #fff000;"
                                onclick="seleccionarColor('#fff000')"></div>
                            <div>Perno bueno</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="informacion-item">
                            <div class="informacion-icon" style="background-color:  #800080;"
                                onclick="seleccionarColor(' #800080')"></div>
                            <div>Diente sano</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="informacion-item">
                            <div class="informacion-icon" style="background-color: #ff00ff;"
                                onclick="seleccionarColor('#ff00ff')"></div>
                            <div>Diente ausente</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="informacion-item">
                            <div class="informacion-icon" style="background-color:#a52a2a;"
                                onclick="seleccionarColor('#a52a2a')"></div>
                            <div>Corona desadaptada</div>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 19px;">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" id="observaciones" rows="2">
        </textarea>

                    <div class="card-footer text-center">
                        <button class="btn btn-primary" onclick="guardarCambios()">Guardar</button>
                    </div>


                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- Tu código HTML existente -->

    <script>
        let selectedColor = '';
        let arrayDientes = [];

        function marcarDiente(element, numDiente) {

            let informacionIcon = document.querySelector('.informacion-icon[style*="' + selectedColor + '"]');
            if (informacionIcon) {
                let dienteColorElement = element.querySelector('.diente-color');
                if (dienteColorElement) {
                    element.removeChild(dienteColorElement);
                    if (arrayDientes.length > 0) arrayDientes = arrayDientes.filter(e => e.numero != numDiente);
                } else {

                    dienteColorElement = document.createElement('div');
                    dienteColorElement.classList.add('diente-color');
                    dienteColorElement.style.backgroundColor = selectedColor;
                    element.appendChild(dienteColorElement);
                    // agregamos el diente al array
                    arrayDientes.push({
                        numero: numDiente,
                        color: selectedColor
                    });
                }
            }
            console.log(arrayDientes);
        }

        function seleccionarColor(color) {
            selectedColor = color;
        }

        function guardarCambios() {
            let dientes = document.querySelectorAll('.diente');
            let observaciones = document.getElementById('observaciones').value;
            let pacientes = document.getElementById('pacientes').value;
            let doctores = document.getElementById('doctores').value;

            let data = {
                doctores: doctores,
                pacientes: pacientes,
                dientes: arrayDientes,
                observaciones: observaciones
            };

            fetch('/guardar-cambios', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Cambios guardados exitosamente');

                        // Aquí puedes mostrar un mensaje de éxito en la página
                    }
                    location.reload()

                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
    </script>

    <style>
        /* Estilos CSS existentes */
        .diente-color {
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            right: 0;
            border: 2px solid #fff;
        }

        /* Estilos CSS para los elementos del odontograma */
        .diente {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 15px 5px;
            /* Ajusta el margen superior e inferior a 15px */
            position: relative;
        }

        .dientes-fila {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .x-mark {
            position: absolute;
            top: 0;
            right: 0;
        }

        select {
            margin-top: 20px;
            /* Ajusta el margen superior del select a 15px */
        }

        .informacion-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .informacion-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>

    <!-- Agrega un enlace a tu archivo de hoja de estilos de impresión -->
    <link rel="stylesheet" href="{{ asset('public/css/print-styles.css') }}">



@endsection


<script>
    function imprimirPagina() {
        // Agrega los scripts de Highcharts para impresión
        let scripts = document.querySelectorAll('script');
        scripts.forEach(script => {
            if (script.src.includes('highcharts')) {
                let scriptTag = document.createElement('script');
                scriptTag.src = script.src;
                document.body.appendChild(scriptTag);
            }
        });

        // Funcionalidad de impresión
        window.print();
    }
</script>
