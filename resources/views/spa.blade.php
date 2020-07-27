<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     {{-- Title --}}
     <title>{{ config('adminlte.title', 'AdminLTE 3') }}</title>
     <!-- FAVICON -->
     <link href="{{ asset('images/mr-icon.png') }}" rel="shortcut icon" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/fontawesome.min.css" integrity="sha256-80fAXabaQMIQSB79XD5pFt2eVZuI12D3yF6/FAkbO8E=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css" integrity="sha256-EykeDBUB7g2D5PjMR0Ql9SdPsPNB5ASVQl89hxWRiL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/regular.min.css" integrity="sha256-9JN6GUreivUUdA+JsWia8lyR9nO1U6PsjqB31r7LhZw=" crossorigin="anonymous" />
    {{-- Base Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
 
</head>
<body>
    <div id="index"></div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>