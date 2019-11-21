@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 order-md-1">

                {!! Form::open(['method' => 'POST', 'route' => ['mypage.posts.store'], 'files' => true,]) !!}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">新規投稿</h5>

                    
                        <!--
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
                        -->
                        

                        <!--
                        <div class="form-group">
                            {!! Form::label('tag', 'Tag') !!}
                            {!! Form::select('tag[]', $tags, old('tag'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('permission'))
                                <p class="help-block">
                                    {{ $errors->first('permission') }}
                                </p>
                            @endif
                        </div>
                        -->


                        <div class="form-group">
                            {!! Form::label('title', 'タイトル※', ['class' => 'control-label']) !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('title'))
                                <p class="help-block">
                                    {{ $errors->first('title') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', '紹介文※', ['class' => 'control-label']) !!}
                            {!! Form::textarea('body', old('body'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('body'))
                                <p class="help-block">
                                    {{ $errors->first('body') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('newtag', 'タグ', ['class' => 'control-label']) !!}
                           <input name="newtag" type="text" data-role="tagsinput" value="">
                        </div>

                        <div class="form-group">
                            <h6>画像</h6>
                            <div class="input-group">
                                {!! Form::file('file') !!}<br />
                                <input id="thumbnail2" name="thumbnail" class="form-control" type="hidden" name="filepath">
                            </div>
                            <img id="holder2" style="margin-top:15px;max-height:100px;">
                        </div>

                    </div>
                </div>

                {!! Form::submit("保存", ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
            @include('mypage.sidebar')
        </div>
    </div>
@stop



@section('javascript')
    @parent

@stop