@extends('layouts.master')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 order-md-1">
            <a href="/messages/create" class="btn btn-success btn-lg active" role="button" aria-pressed="true">メッセージ作成</a>


            @include('messenger.partials.flash')

            @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
        </div>

            @include('mypage.sidebar')
        </div>
    </div>
@stop
