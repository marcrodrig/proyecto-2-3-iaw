<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MR Fútbol 5</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- FAVICON -->
        <link href="{{ asset('images/mr-icon.png') }}" rel="shortcut icon" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Segoe UI', sans-serif;
                font-weight: 300;
                height: 100vh;
                margin: 0;
            }

            .title {
                font-size: 45px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .card {
                min-width: 450px;
                min-height: 350px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid h-100">
            <nav class="navbar navbar-expand navbar-white navbar-light">

				<div class="navbar-nav">
					<img src="{{ asset('images/mr-icon.png') }}" width="50" alt="Logo MR">
				</div>
		
				<ul class="navbar-nav ml-auto">
					@if (Route::has('login'))
						<div class="top-right links">
                            <a href="{{route('spa')}}" class="btn btn-primary"><div class="text-white">SPA</div></a>
							@auth
								<a href="{{ url('/home') }}">Home</a>
								<a href="{{ url('/logout') }}">{{ __('Logout') }}</a>
								@else
								<a href="{{ route('login') }}">{{ __('Login') }}</a>

								@if (Route::has('register'))
									<a href="{{ route('register') }}">{{ __('Register') }}</a>
								@endif
							@endauth
						</div>
					@endif
				</ul>
			</nav>
			<div class="row h-75">
				<div class="col-12 align-self-center">
					<div class="card text-center card-block w-25 mx-auto" style="border: none;">
						<img class="card-img-top" src="{{ asset('images/3.png') }}" alt="Foto cancha">
						<div class="title">MR Fútbol 5</div>
										   Administración de turnos
					</div>
				</div>
			</div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>