@extends('layouts.crearReserva')

@section('modalBodyFooter')
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4 d-flex justify-content-center">
			<div class="card card-default mt-6">
				<div class="card-body text-center p-4">					
					<div class="mb-3 mt-n9">
						<img src="{{ asset('storage/' . $cliente->foto) }}" class="img-fluid rounded-circle" width="100" alt="Foto Cliente">
					</div>
					
					<h5 class="card-title text-dark">{{ $cliente->nombre }} {{ $cliente->apellido }}</h5>

					<div class="row">
						<div class="col-1"></div>
						<div class="col-1"><i class="mdi mdi-account-card-details" aria-hidden="true"></i></div>
						<div class="col d-flex align-self-initial">{{ $cliente->DNI }}</div>
					</div>
					<div class="row">
						<div class="col-1"></div>
						<div class="col-1 d-flex align-self-initial"><i class="mdi mdi-phone" aria-hidden="true"></i></div>
						<div class="col d-flex align-self-initial">{{ $cliente->telefono }}</div>
					</div>						
				</div>
			</div>
		</div>
	</div>
</div> {{-- Fin de modal-body --}}
<div class="modal-footer mt-4 d-flex justify-content-center">
	<a href="{{route('turnos.create.step1')}}" class="btn btn-primary btn-pill mr-2">Atrás</a>
	<form method="POST" action="{{ route('turnos.createStep2', $cliente->id) }}">
		@csrf
		@method('POST')
		<button type="submit" class="btn btn-primary btn-pill m-0">Siguiente</button>
	</form>
</div>
@endsection

@section('scriptsCreate')
	<script>
		$(document).ready(function() {
			$('#progressbar').children()[1].classList.add('active');
		});
	</script>
@endsection