@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 order-md-1">
                <h1>{{ $thread->subject }}</h1>
                @each('messenger.partials.messages', $thread->messages, 'message')

                @include('messenger.partials.form-message')
            </div>
            @include('mypage.sidebar')
        </div>
        
    </div>

@stop
