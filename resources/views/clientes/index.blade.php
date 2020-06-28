@extends('layouts.sleek')

@section('content')
    <div class="breadcrumb-wrapper d-flex justify-content-between align-items-center">
        <div>
            <h1>Clientes</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="/"><span class="mdi mdi-home"></span></a>
                    </li>
                    <li class="breadcrumb-item">
                        app
                    </li>
                    <li class="breadcrumb-item" aria-current="page">clientes</li>
                </ol>
            </nav>
        </div>
        @can('add_turno') {{-- Cambiar por add_cliente --}}
			<div>
				<a href="{{route('turnos.create.step1')}}" class="btn btn-primary">
					<i class="mdi mdi-account-plus mr-1"></i> Agregar cliente
				</a>
			</div>
		@endcan
    </div>
    <div class="row">
        @foreach ($clientes as $cliente)
        <div class="col-lg-4">
            <x-card-cliente :cliente="$cliente">
                <x-slot name="footer">
                    <div class="card-footer">
                        <div class="row">
                            <div class="col text-right">
                                <a href="/clientes/{{$cliente->id}}/edit" class="btn btn-primary btn-pill m-0">
                                    <i class="mdi mdi-account-edit"></i>  Editar
                                </a>
                            </div>
                            <div class="col text-left">
                                <form method="POST" action="{{ route('clientes.destroy', $cliente->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" for class="btn btn-primary btn-pill m-0"><i class="mdi mdi-account-remove"></i>  Borrar</button>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.sub-menu').find('li')[0].classList.remove('active');
            $('.sub-menu').find('li')[1].classList.add('active');
        });
    </script>
@endsection