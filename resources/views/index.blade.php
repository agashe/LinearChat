@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            @if (Session::has('success'))
                <div class="text-center grey-box" id="alert-msg">
                    <p id="hint">
                        {{ Session::get('success') }}
                        
                        <span id="close">&times;</span>
                    </p>
                    
                </div>
            @endif
            
            <div class="white-box">
                <img src="{{ asset('image/logo.gif') }}" alt="Logo">
                <p id="hint">The best solution to chat, just jungle in mongle :)</p>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('login') }}" class="btn">Start Chating</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('about') }}" class="btn">What is this?</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection