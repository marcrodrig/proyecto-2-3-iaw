@extends('turnos/create/create-page')

@section('css')
	<link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" />
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
    <form method="POST" action="{{ route('turnos.store') }}">
		@csrf
		@method('POST')
		<div class="row">
			<div class="col"></div>
			<div class="col-lg-8">
				<x-card-turno-crear-editar/>
			</div>
			<div class="col-lg-2"></div>
		</div>
</div>
<div class="modal-footer mt-1 d-flex justify-content-center">
	<a href="{{ route('turnos.createStep2', $cliente->id) }}" class="btn btn-primary btn-pill mr-2">Atrás</a>
	<input type="hidden" name="idCliente" value="{{$cliente->id}}"/>
	<button type="submit" class="btn btn-primary btn-pill m-0">Guardar</button>
	</form>
</div>
@endsection

@section('js')
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
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