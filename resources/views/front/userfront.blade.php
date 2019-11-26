@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('front.sidebar')

        <div class="col-md-8 order-md-2">
            <div class="media mb-4">
                <img style="max-width:64px;max-height:64px;" src="{{$user->thumbnail}}" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-1">{{$user->name}}</h5>
                    
                    @if (auth()->check()) 
                        @if($user->id == auth()->user()->id)
                            <span class="badge badge-secondary mt-0 p-2">自分へ送信不可</span>
                        @else
                            <a href="/messages/create?uid={{$user->id}}" class="btn btn-danger btn-sm active mt-2" role="button" aria-pressed="true">メッセージ送信</a>

                        @endif     
                    @else
                    @endif

                    
                </div>
            </div>

            <ul class="list-group">
                @foreach ($user->posts()->get() as $p)
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="{{$p->thumbnail}}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$p->title}}</h5>
                                    <p class="card-text">{{ $p->body_plain }}</p>
                                    <p class="card-text"><small class="text-muted">{{$p->created_at}}</small></p>
                                
                                </div>
                                <div class="card-body">
                                    @foreach ($p->tags as $tag)
                                        <span class="badge badge-secondary display-1">{{$tag->name}}</span>
                                    @endforeach
                                </div>
                                <div class="card-body">
                                    <a href="/p/{{$p->id}}" class="card-link">詳細見る</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>

            

        </div>
    </div>
</div>
@endsection


@section('javascript') 
    <script>
        $(document).ready(function() {

            //セレクトボックスが切り替わったら発動
            $('#followbtn').click(function() {
            
                //選択したvalue値を変数に格納
                var uid = {{$user->id}};
                var v = $('#followbtn').val();
                url = "/follow";
                if(v == "followed"){
                    url = "/unfollow";
                }

                $.ajax({
                        url: url,
                        type:'POST',
                        dataType: 'json',
                        data : {uid: uid, _token: '{{ csrf_token() }}'},
                        timeout:3000,
                    }).done(function(data) {
                        
                        $('#followbtn').val(data.result);
                        console.log(data.result);
                        console.log('OK');
                    }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("error");
                    })
                });
        });
    </script>
@endsection
