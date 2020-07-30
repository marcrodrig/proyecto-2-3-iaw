@extends('adminlte::page')

@section('adminlte_css')
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/progressBar.css')}}"/>
    @stack('css')
    @yield('css')
@stop

@section('content')
	<div class="modal fade" id="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  		<div class="modal-content">
				<div class="modal-header px-4">
					<h5 class="modal-title">Agregar Reserva</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                @yield('modalBodyFooter')
			</div>
		</div>
	</div>
@endsection

@section('adminlte_js')
	<script src="{{ asset('js/adminlte.min.js') }}"></script>
	<script> var redireccionModalUrl = '{{route('home')}}'; </script>
    <script src="{{ asset('js/modalTurno.js') }}"></script>
    @stack('js')
    @yield('js')
@stop