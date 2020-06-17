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

    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="breadcrumb-wrapper d-flex justify-content-between align-items-center">
        <div>
            <h1>Calendario</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.html"><span class="mdi mdi-home"></span></a>
                    </li>
                    <li class="breadcrumb-item">
                        app
                    </li>
                    <li class="breadcrumb-item" aria-current="page">calendario</li>
                </ol>
            </nav>

        </div>

        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-event">
                <i class="mdi mdi-plus mr-1"></i> Agregar Reserva
            </button>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-body p-0">
            <div class="full-calendar">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

        <!-- boton prueba roles  -->
        @can('edit_turno')
            <li><a href="#">Editar Turno</a></li>
        @endcan

        @forelse ($turnos as $turno)  
                <li>
                    {{ $turno->descripcion }}
                    {{ $turno->dia }}
                    {{ $turno->horario }}
                </li>
            @empty
                <p>No hay turnos</p>
            @endforelse


        <!-- Add Event Button  -->
        <div class="modal fade" id="modal-add-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">					
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Reserva</h5>
                		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<div class="modal-body mx-3">
						<form method="POST" action="{{ url('turnos') }}" enctype="multipart/form-data">
							@csrf
							@method('POST')
							<div class="card-deck">
								<div class="card">
									<h5 class="card-header">Información de cliente</h5>
									<div class="card-body">
										<div class="row">
											<div class="col">
												<div class="md-form mt-1">
													<i class="fas fa-user prefix grey-text"></i>
													<input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required autocomplete="off">
													<label for="nombre">Nombre</label>
													@error('nombre')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="col">
												<div class="md-form mt-1">
													<i class="fas fa-user prefix grey-text"></i>
													<input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" autocomplete="off">
													<label for="apellido">Apellido</label>
													@error('apellido')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="md-form mt-1">
													<i class="fas fa-address-card prefix grey-text"></i>
													<input type="text" name="DNI" id="DNI" class="form-control @error('DNI') is-invalid @enderror" value="{{ old('DNI') }}" required autocomplete="off">
													<label for="DNI">DNI</label>
													@error('DNI')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="col">
												<div class="md-form mt-1">
													<i class="fas fa-phone prefix grey-text"></i>
													<input type="text" id="telefono" class="form-control validate" autocomplete="off">
													<label data-error="wrong" data-success="right" for="telefono">Teléfono</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col col-sm-2">
												<div class="input-group-prepend mt-0">
													<span><i class="fas fa-id-badge fa-2x ml-1 mr-2"></i> Foto </span>
												</div>
											</div>
											<div class="col col-sm-10">
												<div class="form-group row mt-0">
													<div class="col">
														<div class="custom-file mb-1">
															<input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" lang="es">
															<label for="foto">Seleccionar archivo...</label>
															@error('foto')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<h5 class="card-header">Detalles de turno</h5>
									<div class="card-body">		
										<div class="md-form mt-1">
											<i class="fas fa-calendar-alt prefix grey-text"></i>
											<label for="dateRange">Día</label>
											<input type="text" class="form-control @error('dateRange') is-invalid @enderror" id="dateRange" name="dateRange" autocomplete="off"/>
											@error('dateRange')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
                                			@enderror
										</div>
										<div class="row">
											<div class="col col-sm-2">
												<div class="input-group-prepend mt-0">
													<span><i class="fas fa-clock ml-2 mr-2"></i> Hora </span>
												</div>
											</div>
											<div class="col col-sm-10">
												<div class="form-group row mt-0">
													<div class="col">
														<div class="form-group">
															<select class="form-control" name="hora" id="hora">
																<option value="12:00:00">12:00</option>
																<option value="13:00:00">13:00</option>
																<option value="14:00:00">14:00</option>
																<option value="15:00:00">15:00</option>
																<option value="16:00:00">16:00</option>
																<option value="17:00:00">17:00</option>
																<option value="18:00:00">18:00</option>
																<option value="19:00:00">19:00</option>
																<option value="20:00:00">20:00</option>
																<option value="21:00:00">21:00</option>
																<option value="22:00:00">22:00</option>
																<option value="23:00:00">23:00</option>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col col-sm-2">
												<div class="input-group-prepend mt-0">
													<span><i class="fas fa-futbol ml-2 mr-2"></i> Tipo </span>
												</div>
											</div>
											<div class="col col-sm-10">
												<div class="form-group row mt-0">
													<div class="col">
														<div class="form-group">
															<select class="form-control" name="tipoTurno" id="tipoTurno" required>
																<option value="femenino">Femenino</option>
																<option value="masculino">Masculino</option>
																<option value="mixto">Mixto</option>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>							
				  					</div>
								</div>	
							</div>
					</div>
					<div class="modal-footer d-flex justify-content-center mt-4">
						<button type="submit" class="btn btn-primary btn-pill m-0">Crear Turno</button>
					</div>
						</form>    
            	</div>
			</div>
		</div>			
@endsection

@section('scripts')
    <!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
    <script src='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/timegrid@4.4.2/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/list@4.4.2/main.min.js'></script>
    <script src="https://unpkg.com/@fullcalendar/bootstrap@4.4.2/main.min.js"></script>
    <script src='js/app.calendar.js'></script>

    <script src="js/moment.min.js"></script>
    <script src="js/daterangepicker.js"></script>
    <script>
    jQuery(document).ready(function() {
        jQuery('input[name="dateRange"]').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
            jQuery(this).val(picker.startDate.format('YYYY-MM-DD'));
        });
        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
            jQuery(this).val('');
        });
    });
    </script>
	<script>
		$('#modal-add-event').on('show.bs.modal', function () {
			document.querySelector("body").style.overflow = 'hidden';
		});
		$('#modal-add-event').on('hidden.bs.modal', function () {
					document.querySelector("body").style.overflow = 'visible';
		});

		$(window).resize(function() {
		if ($(window).width() < 1000) {
			$('#modal-add-event').modal('hide');
		}
		});
	</script>
	@if (count($errors) > 0)
		<script type="text/javascript">
			$('#modal-add-event').modal('show');
		</script>
	@endif
@endsection