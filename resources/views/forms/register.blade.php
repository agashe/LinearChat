@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center white-box">
            <h1><span class="red">SIGN</span> <span class="blue">UP</span></h1>
            <p id="hint">Register new account</p>

            @if ($errors->any())
                <div class="alert alert-danger text-left" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>  
            @endif
            
            <form method="post" action="{{ route('store_user') }}">
                {{ csrf_field() }}
                
                <div class="form-group mt-1">
                    <input type="text" name="name" class="form-control" id="InputName" placeholder="Enter Name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group text-left">
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Enter Password" required>
                    <span style="display:none;font-weight:bold;" id="pass-strength">Text</span>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" id="InputConfirm" placeholder="Confirm" required>
                </div>
                
                <p>Or <a href="{{ route('login') }}" class="hint blue">Log In</a></p>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn">Go!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection