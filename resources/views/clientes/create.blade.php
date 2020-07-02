@extends('adminlte::page')

@section('css')
	<link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" />
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/navbarSidebar.css')}}"/>
@endsection

@section('content')
        <div class="modal fade" id="modal-add-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">					
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Cliente</h5>
                		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					<div class="modal-body mx-3">
						<form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
							@csrf
							@method('POST')
							<x-card-cliente-crear-editar/>
					</div>
					<div class="modal-footer d-flex justify-content-center mt-4">
						<button type="submit" class="btn btn-primary btn-pill m-0">Crear Cliente</button>
					</div>
						</form>    
            	</div>
			</div>
		</div>
    @endsection

@section('js')
	<!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
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