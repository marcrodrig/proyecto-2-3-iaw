@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center align-items-center no-gutters" style="height: 90vh">
        <div class="col-4"></div>
        <div class="col-4 mr-auto my-auto">
            <x-card-user :user="$user"/>
			<div class="d-flex justify-content-center mt-3">
				<a href="/users/{{Auth::user()->username}}/edit" class="btn btn-primary btn-pill">Editar Perfil</a>
			</div>
		</div>
	</div>
@endsection