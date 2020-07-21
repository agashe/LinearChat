@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 chat-board">
            <div class="chat-board-content">
                <!-- Messages -->
            </div>

            <div class="message-box">
                <input type="text" id="send-text" placeholder="Write Something...">
                <i class="icon icon-play" id="send-btn" title="SEND!"></i>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('logout') }}" class="btn btn-circle icon icon-signout" title="Log Out"></a>
            <a href="{{ route('edit_user') }}" class="btn btn-circle btn-space icon icon-cog" title="Settings"></a>
        </div>
    </div>
@endsection
