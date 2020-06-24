@extends('layouts.sleek')

@section('head')
<link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" />
<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
@endsection

@section('content')
@can('edit_turno')
<div class="modal fade" id="modal-edit-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">					
            <div class="modal-header px-4">
			<h5 class="modal-title" id="exampleModalCenterTitle">Reserva ({{$turno->cliente->nombre}}  {{$turno->cliente->apellido}} {{$turno->dia}} {{$turno->hora}})</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
				<div class="row no-gutters">
					<div class="col-lg-4">
						<div class="profile-content-left profile-left-spacing px-3">
							<div class="card text-center widget-profile border-0">
								<div class="card-img mx-auto rounded-circle">
									<img src="{{ asset('storage/' . $turno->cliente->foto) }}" width="100" alt="Foto Cliente">
								</div>
								<div class="card-body">
									<h4 class="text-dark">{{$turno->cliente->nombre}} {{$turno->cliente->apellido}}</h4>
								</div>
							</div>
							<hr class="w-100 m-0">
							<div class="contact-info mt-2">
								<h5 class="text-dark mb-1">Información de contacto</h5>
								<p class="text-dark font-weight-medium pt-2 mb-2">Teléfono</p>
								<p>{{$turno->cliente->telefono}}</p>
								<p class="text-dark font-weight-medium pt-2 mb-2">DNI</p>
								<p>{{$turno->cliente->DNI}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
                        <form method="POST" action="{{ route('turnos.update', $turno->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="card">
                                <h5 class="card-header">Detalles de turno</h5>
                                <div class="card-body">
                                    <div class="md-form mt-1">
                                        <i class="fas fa-calendar-alt prefix grey-text"></i>
                                        <label for="dia">Día</label>
                                        <input type="text" class="form-control @error('dia') is-invalid @enderror" id="dia" name="dia" value="{{ old('dia', $turno->dia) }}" autocomplete="off"/>
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
                                                        <select class="form-control" name="hora" id="horaBM">
                                                            <option value="12:00:00" {{ old('hora',$turno->hora) == '12:00:00' ? 'selected' : '' }}>12:00</option>
                                                            <option value="13:00:00" {{ old('hora',$turno->hora) == '13:00:00' ? 'selected' : '' }}>13:00</option>
                                                            <option value="14:00:00" {{ old('hora',$turno->hora) == '14:00:00' ? 'selected' : '' }}>14:00</option>
                                                            <option value="15:00:00" {{ old('hora',$turno->hora) == '15:00:00' ? 'selected' : '' }}>15:00</option>
                                                            <option value="16:00:00" {{ old('hora',$turno->hora) == '16:00:00' ? 'selected' : '' }}>16:00</option>
                                                            <option value="17:00:00" {{ old('hora',$turno->hora) == '17:00:00' ? 'selected' : '' }}>17:00</option>
                                                            <option value="18:00:00" {{ old('hora',$turno->hora) == '18:00:00' ? 'selected' : '' }}>18:00</option>
                                                            <option value="19:00:00" {{ old('hora',$turno->hora) == '19:00:00' ? 'selected' : '' }}>19:00</option>
                                                            <option value="20:00:00" {{ old('hora',$turno->hora) == '20:00:00' ? 'selected' : '' }}>20:00</option>
                                                            <option value="21:00:00" {{ old('hora',$turno->hora) == '21:00:00' ? 'selected' : '' }}>21:00</option>
                                                            <option value="22:00:00" {{ old('hora',$turno->hora) == '22:00:00' ? 'selected' : '' }}>22:00</option>
                                                            <option value="23:00:00" {{ old('hora',$turno->hora) == '23:00:00' ? 'selected' : '' }}>23:00</option>
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
                                                        <select class="form-control" name="tipoTurno" id="tipoTurnoBM" required>
                                                            <option value="femenino" {{ old('tipoTurno',$turno->tipoTurno) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                                            <option value="masculino" {{ old('tipoTurno',$turno->tipoTurno) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                                            <option value="mixto" {{ old('tipoTurno',$turno->tipoTurno) == 'mixto' ? 'selected' : '' }}>Mixto</option>
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
			</div>
            <div class="modal-footer d-flex justify-content-center mt-4">
				<button type="submit" for class="btn btn-primary btn-pill m-0">Editar Turno</button>
				</form>
				<form method="POST" action="{{ route('turnos.destroy', $turno->id) }}">
					@csrf
					@method('DELETE')
					<button type="submit" for class="btn btn-primary btn-pill m-0">Borrar Turno</button>
				</form>
            </div>
                
    	</div>
	</div>
</div>
@endcan
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
	@else
		<script>       
			$(document).ready(function() {
				var dia = $('#dia').val();
				$('#dia').data('daterangepicker').setStartDate(dia);
				$('#dia').data('daterangepicker').setEndDate(dia);
			});
		</script>
	@endif

    <script>
		$('#modal-edit-event').on('hidden.bs.modal', function () {
			window.location.replace('{{route('home')}}');
		});
        $(document).ready(function() {
            $('#modal-edit-event').modal();
        });
    </script>
@endsection