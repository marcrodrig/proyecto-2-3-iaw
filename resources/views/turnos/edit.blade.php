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
					<div class="col-lg-4 ml-auto">
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
					<div class="col-lg-6 mr-auto my-auto">
                        <form method="POST" action="{{ route('turnos.update', $turno->id) }}">
                            @csrf
                            @method('PATCH')
                            <x-card-turno-crear-editar :turno="$turno"/>
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