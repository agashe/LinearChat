@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center white-box">
            <h1><span class="red">FORGOT</span> <span class="blue">PASSWORD</span></h1>
            <p id="hint">Enter your Email , and you will recieve an email with a new password.</p>
            
            @if ($errors->any())
                <div class="alert alert-danger text-left" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>  
            @endif

            <form method="post" action="{{ route('reset_password') }}">
                {{ csrf_field() }}

                <div class="form-group my-4">
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Your Email">
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