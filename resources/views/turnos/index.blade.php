@extends('adminlte::page')

@section('css')
     <!-- GOOGLE FONTS -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    
    <link href='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/timegrid@4.4.2/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/list@4.4.2/main.min.css' rel='stylesheet' />
    <link href="https://unpkg.com/@fullcalendar/bootstrap@4.4.2/main.min.css" rel="stylesheet">
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-6">
          <h1>Calendario</h1>
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="/"><span><i class="fas fa-home mr-1"></i></span>Inicio</a></li>
            <li class="breadcrumb-item">Administración</li>
            <li class="breadcrumb-item active">Calendario</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

    @can('add_turno')
    <div class="row">
        <div class="col">
				<a href="{{route('turnos.create.step1')}}" class="btn btn-primary float-right mb-2">
					<i class="far fa-plus-square mr-1"></i> Agregar Reserva
				</a>
            </div>
        </div>
		@endcan

    <div class="card card-default">
        <div class="card-body p-0">
            <div class="full-calendar">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
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