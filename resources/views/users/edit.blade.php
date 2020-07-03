@extends('adminlte::page')

@section('css')
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/navbarSidebar.css')}}"/>
@endsection

@section('content')
    <div class="row no-gutters">
        <div class="col-lg-5">
            <div class="pt-5 px-5">
                <x-card-user :user="$user"/>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="pt-1">
                <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                            aria-controls="settings" aria-selected="false">Ajustes</a>
                    </li>
                </ul>
                <div class="tab-content px-3 px-xl-5">
                    <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="tab-pane-content mt-5">
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

                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-primary btn-pill">Editar Perfil</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
@endsection