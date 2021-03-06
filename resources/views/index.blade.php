@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <div class="white-box">
                <h1 class="logo">
                    <span class="red">LINEAR</span><span class="blue">CHAT</span>
                </h1>

                <p class="hint py-4">The best solution to chat, just jungle in mongle :)</p>

                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ Auth::user()? route('chat') : route('login') }}" class="btn">Start Chating</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('about') }}" class="btn">What is this?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection