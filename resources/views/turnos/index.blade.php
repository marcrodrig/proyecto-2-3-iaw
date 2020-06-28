@extends('layouts.sleek')

@section('head')
     <!-- GOOGLE FONTS -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    
    <link href='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/timegrid@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/list@4.4.2/main.min.css' rel='stylesheet' />
    <link href="https://unpkg.com/@fullcalendar/bootstrap@4.4.2/main.min.css" rel="stylesheet">

	<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
    <link href="{{ asset('css/fullcalendar-personalizado.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="breadcrumb-wrapper d-flex justify-content-between align-items-center">
        <div>
            <h1>Calendario</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="/"><span class="mdi mdi-home"></span></a>
                    </li>
                    <li class="breadcrumb-item">
                        app
                    </li>
                    <li class="breadcrumb-item" aria-current="page">calendario</li>
                </ol>
            </nav>
		</div>
		@can('add_turno')
			<div>
				<a href="{{route('turnos.create.step1')}}" class="btn btn-primary">
					<i class="mdi mdi-plus mr-1"></i> Agregar Reserva
				</a>
			</div>
		@endcan
    </div>

    <div class="card card-default">
        <div class="card-body p-0">
            <div class="full-calendar">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/timegrid@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/list@4.4.2/main.min.js'></script>
    <script src="https://unpkg.com/@fullcalendar/bootstrap@4.4.2/main.min.js"></script>
    <script src={{ asset('js/app.calendar.js') }}></script>
	<script src={{ asset('js/moment.min.js') }}></script>
	<script>
		$(document).ready(function() {
			$events = [];

			@foreach($turnos as $turno)
				$event = [];
				$event['id'] = {{$turno->id}};
				$event['title'] = '{{$turno->cliente->nombre . ' ' . $turno->cliente->apellido}}';
				$event['start'] ='{{$turno->dia . ' ' . $turno->hora}}';
				$event['tipoTurno'] = "{{ $turno->tipoTurno }}";
				$event['nombreCliente'] = '{{ $turno->cliente->nombre }}'
				$event['apellidoCliente'] = '{{ $turno->cliente->apellido }}'
				$event['DNIcliente'] = '{{ $turno->cliente->DNI }}'
				$event['telefonoCliente'] = '{{ $turno->cliente->telefono }}'
				$event['url'] = 'turnos/{{$turno->id}}/edit'
				$events[{{ $loop->index }}] = $event;
			@endforeach

			calendar.addEventSource($events);
		});
	</script>
	
@endsection