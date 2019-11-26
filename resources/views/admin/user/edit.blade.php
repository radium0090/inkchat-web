@extends('layouts.admin')

@section('content')    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id], 'files' => true,]) !!}

    <div class="card">

        <div class="card-body">
            <h5 class="card-title">ユーザー管理編集</h5>

            <!-- <div class="form-group">
                <h2>サムネイル画像</h2>
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> 選択
                    </a>
                </span>
                <input id="thumbnail2" name="thumbnail" class="form-control" type="text" name="filepath" value="{{$user->thumbnail}}">
                </div>
                <img id="holder2" style="margin-top:15px;max-height:100px;" src="{{$user->thumbnail}}">
            </div> -->

            <div class="form-group">
                <h2>サムネイル画像</h2>
                <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> 選択
                    </a>
                </span>
                <input id="thumbnail2" name="thumbnail" class="form-control" type="text" name="filepath" value="{{$user->thumbnail}}">
                </div>
                <img id="holder2" style="margin-top:15px;max-height:100px;" src="{{$user->thumbnail}}">
            </div>

            <div class="form-group">
                {!! Form::label('name', 'ニックネーム*', ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
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

    <!-- <script>
    </script> -->

    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
        $('#lfm2').filemanager('file', {prefix: route_prefix});
    </script>

    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        $('textarea[name=body]').ckeditor({
        height: 300,
        filebrowserImageBrowseUrl: route_prefix + '?type=Files',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>



@stop