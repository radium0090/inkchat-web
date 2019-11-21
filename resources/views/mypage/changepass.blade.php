@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        
        <div class="col-md-8 order-md-2">
            <h2>パスワード変更</h2>
            {!! Form::model($user, ['method' => 'POST', 'route' => ['mypage.updatepassword', $user->id], 'files' => true,]) !!}

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

            {!! Form::submit("保存", ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>

        @include('mypage.sidebar')

    </div>
</div>
@endsection
