@extends('layouts.crearReserva')

@section('headCreate')
<link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" />
@endsection

@section('modalBodyFooter')
    <form method="POST" action="{{ route('turnos.store') }}">
		@csrf
		@method('POST')
		<div class="row">
			<div class="col"></div>
			<div class="col-lg-6">
				<div class="card">
					<h5 class="card-header">Detalles de turno</h5>
					<div class="card-body">
						@if ($errors->has('hora'))
    						<h6 class="d-flex justify-content-center mb-3" style="color: red;">{{ $errors->first('hora') }}</h6>
						@endif
						<div class="row">
							<div class="col-5">	
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
							</div>
							<div class="col">
								<div class="row">
									<div class="col-3">
										<div class="input-group-prepend mt-0">
											<span><i class="fas fa-clock ml-2"></i> Hora </span>
										</div>
									</div>
									<div class="col">
										<div class="form-group row mt-0">
											<div class="col">
												<div class="form-group">
													<select class="custom-select @error('hora') is-invalid @enderror w-100 ml-0" name="hora" id="hora">
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
							</div>
						</div>
						<div class="row">
							<div class="col-2 ml-auto">
								<div class="input-group-prepend mt-0">
									<span><i class="fas fa-futbol ml-2 mr-2"></i> Tipo </span>
								</div>
							</div>
							<div class="col-7 mr-auto">
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
			<div class="col-lg-3"></div>
		</div>
</div> {{-- Fin de modal-body --}}
<div class="modal-footer mt-1 d-flex justify-content-center">
	<a href="{{ route('turnos.createStep2', $cliente->id) }}" class="btn btn-primary btn-pill mr-2">Atrás</a>
	<input type="hidden" name="idCliente" value="{{$cliente->id}}"/>
	<button type="submit" class="btn btn-primary btn-pill m-0">Guardar</button>
	</form>
</div>
@endsection

@section('scriptsCreate')
    <script src={{ asset('js/moment.min.js') }}></script>
    <script src={{ asset('js/daterangepicker.js') }}></script>
    <script>
        jQuery(document).ready(function() {
			$('#progressbar').children()[1].classList.add('active');
			$('#progressbar').children()[2].classList.add('active');
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
@endsection