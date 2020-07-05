<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>{{ config('adminlte.title', 'AdminLTE 3') }}</title>

    <!-- FAVICON -->
    <link href="{{ asset('images/mr-icon.png') }}" rel="shortcut icon" />

    {{-- Custom stylesheets (pre AdminLTE) --}}
    <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">
    @yield('adminlte_css_pre')

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/fontawesome.min.css" integrity="sha256-80fAXabaQMIQSB79XD5pFt2eVZuI12D3yF6/FAkbO8E=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css" integrity="sha256-EykeDBUB7g2D5PjMR0Ql9SdPsPNB5ASVQl89hxWRiL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/regular.min.css" integrity="sha256-9JN6GUreivUUdA+JsWia8lyR9nO1U6PsjqB31r7LhZw=" crossorigin="anonymous" />
   
    {{-- Base Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('adminlte_css')

</head>

<body class="@yield('classes_body')" @yield('body_data')>
    <div class="preloader"></div>
    {{-- Body Content --}}
    @yield('body')

    {{-- Base Scripts --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $(window).on('load', function() {
            $('.preloader').fadeOut('slow');
         });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    {{-- Custom Scripts --}}
    @yield('adminlte_js')

</body>

</html>
