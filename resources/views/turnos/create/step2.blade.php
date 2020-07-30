@extends('turnos/create/create-page')

@section('css')
	<link rel="stylesheet" href="{{asset('css/cardCliente.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/navbarSidebar.css')}}"/>
@endsection

@section('modalBodyFooter')
<div class="modal-body mx-3">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Seleccionar cliente</li>  
		<li>Verificar cliente</li> 
		<li>Detalles turno</li>
	</ul>
	<div class="row text-center no-gutters">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 d-flex justify-content-center">
			<x-card-cliente :cliente="$cliente"/>
		</div>
		<div class="col-lg-3"></div>
	</div>
</div>
<div class="modal-footer mt-4 d-flex justify-content-center">
	<a href="{{route('turnos.create.step1')}}" class="btn btn-primary btn-pill mr-2">Atrás</a>
	<form method="POST" action="{{ route('turnos.createStep2', $cliente->id) }}">
		@csrf
		@method('POST')
		<button type="submit" class="btn btn-primary btn-pill m-0">Siguiente</button>
	</form>
</div>
@endsection

@section('js')
	<script>
		$(document).ready(function() {
			$('#progressbar').children()[1].classList.add('active');
		});
	</script>
@endsection