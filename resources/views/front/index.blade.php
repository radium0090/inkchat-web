@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @include('front.sidebar')

        <div class="col-md-8 order-md-2">
            @foreach ($posts as $p)
            <div class="media">
                <a href="/u/{{$p->user->id}}">
                    <img style="max-width:64px;max-height:64px;" src="{{$p->user->thumbnail}}" class="mr-3" alt="{{$p->user->name}}のサムネイル">
                </a>
                <div class="media-body">
                    <h5 class="mt-0">{{$p->user->name}}</h5>
                    <small class="text-muted">{{$p->created_at}}</small>
                </div>
            </div>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="{{$p->thumbnail}}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        
                        <div class="card-body">
                            <h5 class="card-title rounded" style="">{{$p->title}}</h5>
                            <p class="card-text">{{ $p->body_plain }}</p>
                        </div>
                        <div class="card-body">
                            @foreach ($p->tags as $tag)
                                <span class="badge badge-info display-4">{{$tag->name}}</span>
                            @endforeach
                        </div>
                        <div class="card-body">
                            <a href="/p/{{$p->id}}" class="card-link">詳細・コメント</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <div id="mybutton" style="position: fixed;bottom:20px;right: 20px;">
        <a class="btn btn-success btn-circle btn-circle-lg m-1" href="/mypage/posts/create" role="button"><i class="fas fa-plus"></i></a>
    </div>

</div>
@endsection
