@extends('layouts.admin')

@section('content')    

    <div class="card">

        <div class="card-body">
            <h5 class="card-title mb-5">パスワード変更</h5>

            {!! Form::model($user, ['method' => 'POST', 'route' => ['admin.updatepassword', $user->id], 'files' => true,]) !!}

            <div class="form-group">
                {!! Form::label('current-password', '旧パスワード*', ['class' => 'control-label']) !!}
                {{Form::password('current-password',["class"=>"form-control",'id' => 'current-password',"required" => "required"])}}
            </div>

            <div class="form-group">
                {!! Form::label('new-password', '新パスワード*', ['class' => 'control-label']) !!}
                {{Form::password('new-password',["class"=>"form-control",'id' => 'new-password',"required" => "required"])}}
            </div>

            <div class="form-group">
                {!! Form::label('new-password_confirmation', '新パスワード再入力*', ['class' => 'control-label']) !!}
                {{Form::password('new-password_confirmation',["class"=>"form-control",'id' => 'new-password_confirmation',"required" => "required"])}}
            </div>

            {!! Form::submit("更新", ['class' => 'btn btn-danger mt-5']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>

     
@stop

@section('javascript')
    @parent

    <script>
    </script>
@stop