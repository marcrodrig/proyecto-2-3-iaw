@extends('adminlte::page')

@section('css')
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/navbarSidebar.css')}}"/>
@endsection

@section('content')
@can('modificacionPerfil')
<div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">					
            <div class="modal-header px-4">
			<h5 class="modal-title" id="exampleModalCenterTitle">Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form method="POST" action="{{ route('users.update', Auth::user()) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

					<div class="form-group">
						<label for="username" style="text-transform: none;">Nombre de usuario</label>
						<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}" required>
						@error('username')
							<span class="invalid-feedback" role="alert">
								<strong>El campo nombre de usuario es inválido</strong>
							</span>
						@enderror
					</div>

					<div class="form-group">
						<label for="email" style="text-transform: none;">{{ __('E-Mail Address') }}</label>
						<input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
					</div>

					<div class="form-group mb-2">
							<label class="col-form-label">Avatar</label>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" name="avatar" id="avatar" lang="es">
						<label class="custom-file-label" for="avatar">Seleccionar archivo...</label>
						@error('avatar')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
			</div>
            <div class="modal-footer d-flex justify-content-center mt-4">
				<button type="submit" for class="btn btn-primary btn-pill m-0">Editar Perfil</button>
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
		$('#modal-edit-user').on('hidden.bs.modal', function () {
			window.location.replace('{{route('users.show',Auth::user())}}');
		});
        $(document).ready(function() {
            $('#modal-edit-user').modal();
        });
    </script>
@endsection