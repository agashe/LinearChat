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
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- [CSS] --}}

    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        @section('container')
        
        @show    

        <div class="row text-center copyrights">
            <div class="col-md-4"></div>
            <div class="col-md-4">&copy; LinearChat 2019</div>
            <div class="col-md-4"></div>
        </div>
    </div>
    
    {{-- [JS] --}}
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-1.10.0.min.js') }}"></script>
        <script src="{{ asset('js/vue.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    {{-- [JS] --}}
</body>
</html>