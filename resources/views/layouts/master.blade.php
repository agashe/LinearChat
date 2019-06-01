<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- [Favicon] --}}
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/png">
    {{-- [Favicon] --}}
    
    {{-- [CSS] --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.3.1/bootstrap.min.css') }}">
    {{-- [CSS] --}}

    <title>@yield('title')</title>
</head>
<body>
    @section('container')
        
    @show
    
    {{-- [JS] --}}
        <script src="{{ asset('js/jquery-1.10.0.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-4.3.1/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/vue.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    {{-- [JS] --}}
</body>
</html>