@extends('turnos/create/create-page')

@section('css')
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
	<form method="POST" action="{{ route('turnos.createStep1') }}">
		@csrf
		@method('POST')
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 text-center">
				<div class="form-group">
					<select name="id" class="custom-select @error('id') is-invalid @enderror" >
						<option value=" " >Seleccione el cliente...</option>
						@foreach ($clientes as $cliente)
							{{$cliente->nombre}}
							<option value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellido}}</option>
						@endforeach
					</select>
					@error('id')
						<span class="invalid-feedback" role="alert">
							<strong>Debe seleccionar un cliente.</strong>
						</span>
					@enderror
				</div>
				<p>o</p>
				<a href="{{route('clientes.create')}}" class="btn btn-primary">Agregar cliente</a>
			</div>
		</div>
</div>
<div class="modal-footer d-flex justify-content-center mt-4">
	<button type="submit" class="btn btn-primary btn-pill m-0">Siguiente</button>
	</form>
</div>
@endsection

