@extends('layouts.app')

@section('content')

<div class="proot">
    <div class="row justify-content-center">
    @include('front.sidebar')

        @foreach ($posts as $p)
        <div class="pitem col-md-5 order-md-2" style="border:1px solid silver;">
            <div class="row justify-content-center">
                <a href="/p/{{$p->id}}" class="card-link">
                    <img src="{{$p->thumbnail}}" class="card-img" alt="...">
                </a>
            </div>
            <div class="row justify-content-center">
                <h4 class="card-title rounded" style="">{{$p->title}}</h4>
            </div>
            <div class="puserInfo">
                <div class="media">
                    <a href="/u/{{$p->user->id}}">
                        <img style="max-width:64px;max-height:64px;" height="42" width="42" src="{{$p->user->thumbnail}}" class="pavatar mr-2" alt="{{$p->user->name}}のサムネイル">
                    </a>
                    <div class="media-body">
                        <h6 class="mt-0">{{$p->user->name}}</h6>
                        <small class="text-muted">投稿時刻：{{$p->created_at}}</small>
                    </div>
                </div>    
            </div>
        </div>
        @endforeach
    </div>

    <div id="mybutton" style="position: fixed;bottom:20px;right: 20px;">
        <a class="btn btn-success btn-circle btn-circle-lg m-1" href="/mypage/posts/create" role="button"><i class="fas fa-plus"></i></a>
    </div>

</div>
@endsection
