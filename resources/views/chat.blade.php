@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 chat-board">
            @for ($i = 0;$i < 5;$i++)
                <div class="white-box message">
                    <img src="{{ asset('image/avatar.jpg') }}" /> Username
                    <h5>25/8/2019 - 12:05:23 PM</h5>
                    <article>
                        test testtest testtest testtest testtest testtest test
                        test testtest testtest testtest testtest testtest test
                        test testtest testtest testtest testtest testtest test
                        test testtest testtest testtest testtest testtest test
                        test testtest testtest testtest testtest testtest test
                    </article>
                </div>
            @endfor
        </div>
        <div class="col-md-3">
            <a href="{{ route('logout') }}" class="btn btn-circle icon icon-signout" title="Log Out"></a>
            <a href="{{ route('edit_user') }}" class="btn btn-circle icon icon-cog" title="Setting" style="right:60px;"></a>
        </div>
    </div>
@endsection
