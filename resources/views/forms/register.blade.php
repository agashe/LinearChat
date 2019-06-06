@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center white-box">
            <h1>Register</h1>
            <p id="hint">Register new account</p>

            <br>
            
            @if ($errors->any())
                <div class="alert alert-danger text-left" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>  
            @endif
            
            <br>
            
            <form method="post" action="{{ route('store_user') }}">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="InputName" placeholder="Enter Name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" id="InputConfirm" placeholder="Confirm">
                </div>
                
                Or <a href="{{ route('login') }}">Log In</a>
                <br><br>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn">Go!</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection