@extends('layouts.crearReserva')

@section('modalBodyFooter')
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<x-card-cliente :cliente="$cliente"/>
		</div>
		<div class="col-lg-3"></div>
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