@extends('layouts.sleek')

@section('head')
<link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" />
<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
@endsection

@section('content')
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
						<form id='formAdd' method="POST" action="{{ url('turnos') }}" enctype="multipart/form-data">
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
													<input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" autocomplete="off">
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
													<input type="text" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" autocomplete="off">
													<label for="telefono">Teléfono</label>
													@error('telefono')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
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
															<input type="file" class="custom-file-input @error('foto') is-invalid @enderror" name="foto" id="foto" lang="es">
															<label class="custom-file-label" for="foto" style="text-transform: none;">Seleccionar archivo...</label>
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
											<label for="dia">Día</label>
											<input type="text" class="form-control @error('dia') is-invalid @enderror" id="dia" name="dia" value="{{ old('dia') }}" autocomplete="off"/>
											@error('dia')
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
																<option value="12:00:00" {{ old('hora') == '12:00:00' ? 'selected' : '' }}>12:00</option>
																<option value="13:00:00" {{ old('hora') == '13:00:00' ? 'selected' : '' }}>13:00</option>
																<option value="14:00:00" {{ old('hora') == '14:00:00' ? 'selected' : '' }}>14:00</option>
																<option value="15:00:00" {{ old('hora') == '15:00:00' ? 'selected' : '' }}>15:00</option>
																<option value="16:00:00" {{ old('hora') == '16:00:00' ? 'selected' : '' }}>16:00</option>
																<option value="17:00:00" {{ old('hora') == '17:00:00' ? 'selected' : '' }}>17:00</option>
																<option value="18:00:00" {{ old('hora') == '18:00:00' ? 'selected' : '' }}>18:00</option>
																<option value="19:00:00" {{ old('hora') == '19:00:00' ? 'selected' : '' }}>19:00</option>
																<option value="20:00:00" {{ old('hora') == '20:00:00' ? 'selected' : '' }}>20:00</option>
																<option value="21:00:00" {{ old('hora') == '21:00:00' ? 'selected' : '' }}>21:00</option>
																<option value="22:00:00" {{ old('hora') == '22:00:00' ? 'selected' : '' }}>22:00</option>
																<option value="23:00:00" {{ old('hora') == '23:00:00' ? 'selected' : '' }}>23:00</option>
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
																<option value="femenino" {{ old('tipoTurno') == 'femenino' ? 'selected' : '' }}>Femenino</option>
																<option value="masculino" {{ old('tipoTurno') == 'masculino' ? 'selected' : '' }}>Masculino</option>
																<option value="mixto" {{ old('tipoTurno') == 'mixto' ? 'selected' : '' }}>Mixto</option>
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
    <script src={{ asset('js/moment.min.js') }}></script>
    <script src={{ asset('js/daterangepicker.js') }}></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dia"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    format: 'YYYY-MM-DD',
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dia"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('YYYY-MM-DD'));
            });
            jQuery('input[name="dia"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
	</script>
	@if ($errors->has('dia'))
		<script>
			$(document).ready(function() {
				var dia = moment(new Date()).format("YYYY-MM-DD");
				$('#dia').data('daterangepicker').setStartDate(dia);
				$('#dia').data('daterangepicker').setEndDate(dia);
			});
		</script>
	@endif
    <script>
        $(document).ready(function() {
            $('#modal-add-event').modal();
        });
		$('#modal-add-event').on('hidden.bs.modal', function () {	
            window.location.replace('{{route('home')}}');
		});
		$(window).resize(function() {
			if ($(window).width() < 1000) {
				$('#modal-add-event').modal('hide');
			}
        });       
    </script>
@endsection