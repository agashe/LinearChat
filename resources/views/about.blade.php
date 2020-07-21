@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center white-box">
            <h1><span class="red">ABOUT</span> <span class="blue">US</span></h1>
            <p class="hint">
                Do you have some free time? want to try something new,
                say what is in your heart without getting heart then
                you should try LinearChat :)
                
                <br><br>

                LinearChat is a tiny web application that allow users
                to chat together without any limitations , just spell 
                it out!
            </p>

            <div class="row my-3">
                <div class="col-md-6 text-right pr-0">
                    <a href="{{ route('login') }}" class="btn btn-xs btn-circle pr-1">
                        <i class="fa fa-lg fa-facebook"></i>
                    </a>
                </div>
                <div class="col-md-6 text-left pl-0">
                    <a href="{{ route('login') }}" class="btn btn-xs btn-circle pr-1">
                        <i class="fa fa-lg fa-github"></i>
                    </a>
                </div>
            </div>
            
            <div class="row my-3">
                <div class="col-md-12">
                    <a href="{{ route('login') }}" class="btn">OK, let me try</a>
                </div>
            </div>
        </div>
    </div>
@endsection