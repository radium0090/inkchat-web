@extends('layouts.admin')

@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['admin.tags.store'], 'files' => true,]) !!}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">タグ作成</h5>

            <div class="form-group">
                <h6>サムネイル画像</h6>
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> 選択
                    </a>
                </span>
                <input id="thumbnail2" name="thumbnail" class="form-control" type="text" name="filepath">
                </div>
                <img id="holder2" style="margin-top:15px;max-height:100px;">
            </div>

            <div class="form-group">
                {!! Form::label('name', '名称*', ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('body', 'XXXXX', ['class' => 'control-label']) !!}
                {!! Form::textarea('xxxxx', old('xxxxx'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('xxxxx'))
                    <p class="help-block">
                        {{ $errors->first('xxxxx') }}
                    </p>
                @endif
            </div>

            <!--
            <div class="form-group">
                Form::label('xxxxx_id', 'XXXXX', ['class' => 'control-label']) 
                Form::select('xxxxx_id', $xxxxxs, old('xxxxx_id'), ['class' => 'form-control select2', 'id' => 'selectall-category' ])  
                @if($errors->has('searchlocation_id'))
                    <p class="help-block">
                        {{ $errors->first('xxxxx_id') }}
                    </p>
                @endif
            </div>
            -->

        </div>
    </div>

    {!! Form::submit("保存", ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script>
       
    </script>
@stop