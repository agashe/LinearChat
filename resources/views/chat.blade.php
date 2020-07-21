@extends('layouts.master')

@section('title', $title)

@section('container')
    <div class="row">
        <div class="col-md-6 offset-md-3 chat-board">
            <div class="chat-board-content">
                <!-- Messages -->
            </div>

            <div class="message-box">
                <input type="text" id="send-text" placeholder="Write Something...">
                <i class="fa fa-send-o" id="send-btn" title="SEND!"></i>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('logout') }}" class="btn btn-circle btn-corner" title="Log Out">
                <i class="fa fa-lg fa-sign-out"></i>
            </a>
            <a href="{{ route('edit_user') }}" class="btn btn-circle btn-corner btn-space" title="Settings">
                <i class="fa fa-lg fa-gear"></i>
            </a>
        </div>
    </div>
@endsection
