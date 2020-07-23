@extends('emails.layouts.master')

@section('content')
    Dear User,
    
    <br>
    
    <h3>Please click the link below to confirm your account:</h3>
    <a href="{{ $link }}">CONFIRM</a>

    <br>

    <h5>Thank you for choosing LinearChat</h5>
@endsection