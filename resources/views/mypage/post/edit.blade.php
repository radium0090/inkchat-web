@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 order-md-1">

                {!! Form::model($post, ['method' => 'PUT', 'route' => ['mypage.posts.update', $post->id], 'files' => true,]) !!}

                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">マイページ情報</h5>

                        <div class="form-group">
                            <h2>サムネイル画像</h2>
                            <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> 選択
                                </a>
                            </span>
                            <input id="thumbnail2" name="thumbnail" class="form-control" type="text" name="filepath" value="{{$post->thumbnail}}">
                            </div>
                            <img id="holder2" style="margin-top:15px;max-height:100px;" src="{{$post->thumbnail}}">
                        </div>

                        <div class="form-group">
                            {!! Form::label('category_id', 'カテゴリ') !!}
                            
                            {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2', 'id' => 'selectall-category' ]) !!}
                            <p class="help-block"></p>
                            @if($errors->has('category_id'))
                                <p class="help-block">
                                    {{ $errors->first('category_id') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('tag', 'Tag') !!}
                            {!! Form::select('tag[]', $tags, old('tag',$post->tags()->pluck('tags.id')), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('permission'))
                                <p class="help-block">
                                    {{ $errors->first('permission') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'タイトル*', ['class' => 'control-label']) !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('title'))
                                <p class="help-block">
                                    {{ $errors->first('title') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', '内容', ['class' => 'control-label']) !!}
                            {!! Form::textarea('body', old('body'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('body'))
                                <p class="help-block">
                                    {{ $errors->first('body') }}
                                </p>
                            @endif
                        </div>
                        
                    </div>
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
            @include('mypage.sidebar')
        </div>
    </div>
    
@stop

@section('javascript')
    @parent

@stop