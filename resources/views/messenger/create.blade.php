@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 order-md-1">

                <h1>メッセージ作成</h1>
                <form action="{{ route('messages.store') }}" method="post">
                    {{ csrf_field() }}
                    <!-- Subject Form Input -->
                    <div class="form-group">
                        <label class="control-label">タイトル</label>
                        <input type="text" class="form-control" name="subject" placeholder="タイトル"
                                value="{{ old('subject') }}">
                    </div>

                    <!-- Message Form Input -->
                    <div class="form-group">
                        <label class="control-label">内容</label>
                        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                    </div>

                    <!-- @if($users->count() > 0)
                        <div class="checkbox">
                            <label class="control-label">送信先</label>
                            @foreach($users as $user)
                                @if(request('uid') == $user->id)
                                    <label title="{{ $user->name }}">
                                        <input type="checkbox" name="recipients[]" value="{{ $user->id }}" @if(request('uid') == $user->id) checked @endif readonly>
                                        {!!$user->name!!}
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    @endif -->

                    @if($users->count() > 0)
                        <div class="checkbox">
                            <label class="control-label">送信先:</label>
                            @foreach($users as $user)
                                @if(request('uid') == $user->id)
                                    <label title="{{ $user->name }}">
                                        <input type="checkbox" style="opacity:0; position:absolute;" name="recipients[]" value="{{ $user->id }}" @if(request('uid') == $user->id) checked @endif readonly>
                                        {!!$user->name!!} さん
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    <!-- Submit Form Input -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">送信</button>
                    </div>
                </form>

                
            </div>
            @include('mypage.sidebar')
        </div>
    </div>
@stop
