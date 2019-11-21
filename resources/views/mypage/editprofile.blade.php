@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        
        <div class="col-md-8 order-md-2">
            <h2>プロフィール編集</h2>
            {!! Form::model($user, ['method' => 'POST', 'route' => ['mypage.updateprofile', $user->id], 'files' => true,]) !!}

            <div class="form-group">
                {!! Form::label('name', 'ニックネーム※', ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name' , 'required' => '']) !!}
            </div>

            <div class="form-row">
                <div class="col-2">  
                    {!! Form::label('lastname', '姓', ['class' => 'control-label']) !!}
                    {!! Form::text('lastname', old('lastname'), ['class' => 'form-control', 'id' => 'name' ]) !!}
                </div>
                <div class="col-2">  
                    {!! Form::label('firstname', '名', ['class' => 'control-label']) !!}
                    {!! Form::text('firstname', old('firstname'), ['class' => 'form-control', 'id' => 'name' ]) !!}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('sexid', '性別※') }}
                
                {{ Form::select('sexid', $sexes, old('sexid'), ['class' => 'form-control', 'id' => 'selectall-category','placeholder' => '性別選択','required' => '' ]) }}
                <p class="help-block"></p>
                @if($errors->has('sexid'))
                    <p class="help-block">
                        {{ $errors->first('sexid') }}
                    </p>
                @endif
            </div>

            <div class="form-row">
                <div class="col"> 
                    {!! Form::label('birthday', '誕生日※', ['class' => 'control-label']) !!} 
                    {{ Form::select('birth_y', $years, old('birth_y'), [  'placeholder' => '----','required' => '' ]) }} 
                    {{ Form::select('birth_m', $months, old('birth_m'), [ 'placeholder' => '--','required' => '' ]) }} 
                    {{ Form::select('birth_d', $days, old('birth_d'), [ 'placeholder' => '--','required' => '' ]) }}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('tel', '電話番号', ['class' => 'control-label']) !!}
                {!! Form::text('tel', old('tel'), ['class' => 'form-control', 'id' => 'tel']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('email', 'メール(非公開・ログインID)※', ['class' => 'control-label']) !!}
                {!! Form::text('email', old('email'), ['class' => 'form-control', 'id' => 'email' , 'required' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('zip', '郵便番号', ['class' => 'control-label']) !!}
                {!! Form::text('zip', old('zip'), ['class' => 'form-control', 'id' => 'zip']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address', '住所', ['class' => 'control-label']) !!}
                {!! Form::text('address', old('address'), ['class' => 'form-control', 'id' => 'address' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('memo', 'メモ', ['class' => 'control-label']) !!}
                {!! Form::text('memo', old('memo'), ['class' => 'form-control', 'id' => 'memo']) !!}
            </div>

            {!! Form::submit("保存", ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
        @include('mypage.sidebar')
    </div>
</div>
@endsection
