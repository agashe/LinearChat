@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center white-box">
            <h1>What is this?</h1>
            <p id="hint">
                Do you have some free time? want to try something new,
                say what is in your heart without getting heart then
                you should try LinearChat :)
                
                <br><br>

                LinearChat is a tiny web application that allow users
                to chat together without any limitations , just spell 
                it out!
            </p>

            <br>

            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('index') }}" class="btn">OK, let me try</a>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection