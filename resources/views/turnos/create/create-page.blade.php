@extends('adminlte::page')

@section('adminlte_css')
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/progressBar.css')}}"/>
    @stack('css')
    @yield('css')
@stop

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
                @yield('modalBodyFooter')
			</div>
		</div>
	</div>
@endsection

@section('adminlte_js')
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
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
    @stack('js')
    @yield('js')
@stop