@extends('layouts.app')

@section('content')
<div class="container">
  

    <div class="row justify-content-center">
        @include('front.sidebar')

        <div class="col-md-8 order-md-2">
            <h4>フォロワー一覧</h4>
            <ul class="list-group">
            @foreach ($followers as $user)
                <li>
                    <div class="media">
                        <a href="/u/{{$user->id}}">
                            <img style="max-width:64px;max-height:64px;" src="{{$user->thumbnail}}" class="mr-3" alt="{{$user->name}}のサムネイル">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0">{{$user->name}}</h5>
                            一言一言一言一言一言一言一言一言一言一言一言一言一言一言一言
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>

            
        </div>
    </div>
</div>
@endsection


@section('javascript') 
   
@endsection
