@extends('adminlte::page')

@section('css')
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
			<h5 class="modal-title" id="exampleModalCenterTitle">Cliente: ({{$cliente->nombre}}  {{$cliente->apellido}})</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form method="POST" action="{{ route('clientes.update', $cliente->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <x-card-cliente-crear-editar :cliente="$cliente"/>
			</div>
            <div class="modal-footer d-flex justify-content-center mt-4">
				<button type="submit" for class="btn btn-primary btn-pill m-0">Editar Cliente</button>
				</form>
            </div>
                
    	</div>
	</div>
</div>
@endcan
@endsection

@section('js')
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
    <script>
		$('#modal-edit-event').on('hidden.bs.modal', function () {
			window.location.replace('{{route('clientes')}}');
		});
        $(document).ready(function() {
            $('#modal-edit-event').modal();
        });
    </script>
@endsection