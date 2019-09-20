@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center white-box">
            <h1><span class="red">LOG</span> <span class="blue">IN</span></h1>
            <p id="hint">Sign In with your account to start chating</p>

            <br>
            
            @if ($errors->any())
                <div class="alert alert-danger text-left" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>  
            @endif
            
            <br>

            <form method="post" action="{{ route('check_user') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Enter Your Password">
                </div>

                <div class="row">
                    <a href="{{ route('register') }}" class="hint blue">Don't have account</a>
                    <br>
                    <a href="{{ route('forget_password') }}" class="hint blue">Forget your password</a>
                    <br><br>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn">OK</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection