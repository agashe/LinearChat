@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center white-box">
            <h1><span class="red">LOG</span> <span class="blue">IN</span></h1>
            <p id="hint">Sign In with your account to start chating</p>
            
            @if ($errors->any())
                <div class="alert alert-danger text-left" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>  
            @endif

            <form method="post" action="{{ route('check_user') }}" class="my-3">
                {{ csrf_field() }}

                <div class="form-group mt-3">
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Enter Your Password" required>
                </div>

                <div class="text-center">
                    <p class="mb-0"><a href="{{ route('register') }}" class="hint blue">Don't have account</a></p>
                    <p class="mb-4"><a href="{{ route('forget_password') }}" class="hint blue">Forget your password</a></p>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn">OK</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection