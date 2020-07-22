@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center white-box">
            <h1><span class="red">Update</span> <span class="blue">Password</span></h1>            
            @if ($errors->any())
                <div class="alert alert-danger text-left" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>  
            @endif
            
            <form method="post" action="{{ route('save_password') }}">
                {{ csrf_field() }}

                <div class="form-group text-left mt-5">
                    <input type="password" name="oldPassword" class="form-control" id="InputOldPassword" placeholder="Enter Current Password" value="" autocomplete="false" required>
                </div>
                <div class="form-group text-left">
                    <input type="password" name="password" class="form-control" id="InputNewPassword" placeholder="Enter New Password" required>
                    <span style="display:none;font-weight:bold;" id="pass-strength">Text</span>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" id="InputConfirm" placeholder="Confirm" required>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-sm" title="Save Changes">OK!</button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('edit_user') }}" class="btn btn-sm" title="Next Time, Thank you">CANCEL</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection