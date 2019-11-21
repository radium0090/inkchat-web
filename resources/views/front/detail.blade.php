@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="row justify-content-center">
        @include('front.sidebar')

        <div class="col-md-8 order-md-2">
            
            <div class="media">
                <a href="/u/{{$post->user->id}}">
                    <img style="max-width:64px;max-height:64px;" src="{{$post->user->thumbnail}}" class="mr-3" alt="{{$post->user->name}}のサムネイル">
                </a>
                <div class="media-body">
                    <h5 class="mt-0">{{$post->user->name}}</h5>
                </div>
            </div>

            <div class="card mb-3">
                <img src="{{$post->thumbnail}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{!! $post->body !!}</p>
                    <p class="card-text"><small class="text-muted">{{$post->created_at}}</small></p>

                    

                </div>   
                     
            </div>

            @foreach ($post->comments()->get() as $c)
                <div class="media mb-2">
                    <a href="/u/{{$c->user->id}}"> <img src="{{$c->user->thumbnail}}" class="mr-3" alt="..." style="max-width:32px;"></a>
                    <span>{{$c->user->name}}
                    <div class="media-body">
                            {{$c->body}}
                    </div>
                </div>
            @endforeach
    

            {!! Form::open(['url' => url('/p/' . $post->id), 'method' => 'post', 'files' => true]) !!}
            <div class="form-group">
                <label for="comment">コメント:</label>
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                <button class="btn btn-primary">投稿</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection



@section('javascript') 
    <script>
        $(document).ready(function() {

            //セレクトボックスが切り替わったら発動
            $('#likebtn').click(function() {
            
                //選択したvalue値を変数に格納
                var v = $('#likebtn').val();
                var url = "/posts/{{$post->id}}/like"
                if(v == 'liked'){
                    url = "/posts/{{$post->id}}/unlike"
                }

                $.ajax({
                        url: url,
                        type:'POST',
                        dataType: 'json',
                        data : {_token: '{{ csrf_token() }}'},
                        timeout:3000,
                    }).done(function(data) {
                        
                        $('#likebtn').val(data.result);
                        $('#likecount').text(data.count);
                        console.log(data.result);
                        console.log(data.count);
                        console.log('OK');
                    }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("error");
                    })
                });
        });
    </script>
@endsection
