@extends('adminlte::page')

@section('css')
	<link rel="stylesheet" href="{{asset('css/cardCliente.css')}}"/>
@endsection

@section('content')
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-3">
				<div class="col-sm-6">
					<h1>Clientes</h1>
					<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item"><a href="/"><span><i class="fas fa-home mr-1"></i></span>Inicio</a></li>
						<li class="breadcrumb-item">Administración</li>
						<li class="breadcrumb-item active">Clientes</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
        
	@can('add_turno') {{-- Cambiar por add_cliente --}}
		<div class="text-center pb-5">
			<a href="{{route('clientes.create')}}" class="btn btn-primary">
				<i class="fas fa-user-plus mr-1"></i></i> Agregar Cliente
			</a>
		</div>
	@endcan
		
	<div class="container">
    <div class="row text-center">
    	@foreach ($clientes as $cliente)
			<div class="col-lg-4 d-flex justify-content-center">
				<x-card-cliente :cliente="$cliente">
					<x-slot name="footer">
						<div class="card-footer">
							<div class="row">
								<div class="col text-right">
									<a href="/clientes/{{$cliente->id}}/edit" class="btn btn-primary btn-pill m-0">
									<span><i class="fas fa-user-edit"></i></span>  Editar
									</a>
								</div>
								<div class="col text-left">
									<form method="POST" action="{{ route('clientes.destroy', $cliente->id) }}">
										@csrf
										@method('DELETE')
										<button type="submit" for class="btn btn-primary btn-pill m-0"><i class="fas fa-user-minus"></i>  Borrar</button>
									</form>
								</div>
							</div>
						</div>
					</x-slot>
				</x-card-cliente>
			</div>
        @endforeach
	</div>
	</div>
@endsection