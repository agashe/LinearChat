@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center white-box">
            <h1><span class="red">SETT</span><span class="blue">INGS</span></h1>
            <p id="hint">Update Your profile.</p>
            
            @if ($errors->any())
                <br>    
                <div class="alert alert-danger text-left" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>  
            @endif
            
            <br>
            
            <form method="post" action="{{ route('update_user') }}">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <img src="{{ asset('image/avatar.jpg') }}" class="settings-img" />
                </div>

                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="InputName" placeholder="Type Your Name" value="{{ Auth::user()->name }}">
                </div>

                <div class="form-group">
                    <textarea name="bio" class="form-control" id="InputBio" placeholder="Write Something About Yourself" cols="30" rows="2">{{ Auth::user()->bio }}</textarea>
                </div>
                
                <div class="form-group text-left">
                    <input type="file" name="avatar" class="form-control" id="InputAvatar">
                </div>

                {{-- <div class="form-group text-left">
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Enter Password">
                    <span style="display:none;font-weight:bold;" id="pass-strength">Text</span>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" id="InputConfirm" placeholder="Confirm">
                </div> --}}

                <br>

                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-sm" title="Save Changes">SAVE!</button>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-sm" title="Update Your Password">PASSWORD</button>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('chat') }}" class="btn btn-sm" title="Nothing, Thank you">CANCEL</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection