@extends('layouts.sleek')

@section('head')
	@yield('headCreate');
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/progressBar.css')}}"/>
@endsection

@section('content')
	<div class="modal fade" id="modal-add-event" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">					
				<div class="modal-header px-4">
					<h5 class="modal-title">Agregar Reserva</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-3">
					<!-- progressbar -->
					<ul id="progressbar">
						<li class="active">Seleccionar cliente</li>  
						<li>Verificar cliente</li> 
						<li>Detalles turno</li>
					</ul>
					@yield('modalBodyFooter')
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
	@yield('scriptsCreate')
	<script>
        $(document).ready(function() {
			$('body').css('overflow','hidden');
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