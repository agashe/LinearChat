@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center white-box">
            <h1>Log In</h1>
            <p id="hint">Sign In with your account to start chating</p>

            <br>

            <form method="post" action="">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Enter Your Password">
                </div>

                <div class="row">
                    <a href="{{ route('register') }}">Don't have account</a>
                    <br>
                    <a href="{{ route('index') }}">Forget your password</a>
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