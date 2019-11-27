@extends('layouts.admin')

@section('content')    
    {!! Form::model($contact, ['method' => 'PUT', 'route' => ['admin.contacts.update', $contact->id], 'files' => true,]) !!}

    <div class="card">

        <div class="card-body">
            <h5 class="card-title">お問い合わせ管理編集</h5>

            <!-- <div class="form-group">
                <h2>サムネイル画像</h2>
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> 選択
                    </a>
                </span>
                <input id="thumbnail2" name="thumbnail" class="form-control" type="text" name="filepath" value="{{$contact->thumbnail}}">
                </div>
                <img id="holder2" style="margin-top:15px;max-height:100px;" src="{{$contact->thumbnail}}">
            </div> -->

            <div class="form-group">
                {!! Form::label('body', '問い合わせ内容*', ['class' => 'control-label']) !!}
                {!! Form::text('body', old('body'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('body'))
                    <p class="help-block">
                        {{ $errors->first('body') }}
                    </p>
                @endif
            </div>

            <!--
            <div class="form-group">
                Form::label('xxxxx_id', '検索エリア', ['class' => 'control-label']) 
                
                Form::select('xxxxx_id', $searchlocations, old('xxxxx_id',optional($xxxxx)->xxxxx_id), ['class' => 'form-control', 'id' => 'selectall-category' ]) 
                <p class="help-block"></p>
                @if($errors->has('searchlocation_id'))
                    <p class="help-block">
                        {{ $errors->first('searchlocation_id') }}
                    </p>
                @endif
            </div>
            -->
            
        </div>
    </div>

    {!! Form::submit('更新', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script>
    </script>
@stop