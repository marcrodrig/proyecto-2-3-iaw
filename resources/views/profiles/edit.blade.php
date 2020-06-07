@extends('layouts.sleek')

@section('content')
<div class="bg-white border rounded">
    <div class="row no-gutters">
        <div class="col-lg-4 col-xl-3">
            <div class="profile-content-left profile-left-spacing pt-5 pb-3 px-3 px-xl-5">
                <div class="card text-center widget-profile px-0 border-0">
                    <div class="card-img mx-auto rounded-circle">
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" width="100" alt="user image">
                    </div>
                    <div class="card-body">
                        <h4 class="py-2 text-dark">{{$user->name}}</h4>
                        <p>{{$user->username}}</p>
                    </div>
                </div>
                <hr class="w-100">
                <div class="contact-info pt-4">
                    <h5 class="text-dark mb-1">Información de contacto</h5>
                    <p class="text-dark font-weight-medium pt-4 mb-2">{{ __('E-Mail Address') }}</p>
                    <p>{{$user -> email}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-9">
            <div class="profile-content-right profile-right-spacing py-5">
                <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                            aria-controls="settings" aria-selected="false">Settings</a>
                    </li>
                </ul>
                <div class="tab-content px-3 px-xl-5">
                    <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="tab-pane-content mt-5">
                            <form method="POST" action="{{ $user->path }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user-> name }}" autocomplete="name">
                                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                <div class="form-group mb-4">
                                    <label for="username" style="text-transform: none;">Nombre de usuario</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user-> username }}">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>El campo nombre de usuario es inválido</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user-> email }}">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password" style="text-transform: none;">Nueva contraseña</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password-confirm" style="text-transform: none;">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="coverImage" class="col-form-label">Avatar</label>
                                            <input type="file" class="form-control" id="avatar">
                                            <label class="border" for="avatar"></label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>

                                <div class="d-flex justify-content-end mt-5">
                                    <button type="submit" class="btn btn-primary mb-2 btn-pill">Update Profile</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection