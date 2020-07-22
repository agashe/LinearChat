@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center white-box">
            <h1><span class="red">SETT</span><span class="blue">INGS</span></h1>
            
            @if ($errors->any())   
                <div class="alert alert-danger text-left" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>  
            @endif
            
            <form method="post" action="{{ route('update_user') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="InputAvatar">
                        <img src="{{ url('storage/'.Auth::user()->image) }}" class="settings-img" />
                    </label>
                </div>

                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="InputName" placeholder="Type Your Name" value="{{ Auth::user()->name }}" required>
                </div>

                <div class="form-group">
                    <textarea name="bio" class="form-control" id="InputBio" placeholder="Write Something About Yourself" cols="30" rows="2">{{ Auth::user()->bio }}</textarea>
                </div>
                
                <div class="form-group text-left">
                    <input type="file" name="avatar" class="form-control" id="InputAvatar">
                </div>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-sm" title="Save Changes">SAVE!</button>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('update_password') }}" class="btn btn-sm" title="Update Your Password">PASSWORD</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('chat') }}" class="btn btn-sm" title="Nothing, Thank you">CANCEL</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection