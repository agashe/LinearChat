@extends('emails.layouts.master')

@section('content')
    Dear User,
    
    <br>
    
    <h3>Your password has been reset , and your new password is : {{ $newPassword }}</h3>
    <h5>For Security reasons , please change your password once you logged in !!</h5>

    <br>

    <h5>Thank you for choosing LinearChat</h5>
@endsection