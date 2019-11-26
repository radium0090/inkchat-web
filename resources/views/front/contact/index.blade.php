@extends('layouts.app')

@section('content')
<div class="container">
  

    <div class="row justify-content-center">
        
        @include('front.sidebar')

        <div class="col-md-8 order-md-2">
            {!! Form::open(['method' => 'POST', 'route' => ['front.contact.addcontact'], 'files' => true,]) !!}

            <div class="form-group">
                {!! Form::label('name', 'お名前*', ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name' , 'required' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'メールアドレス*', ['class' => 'control-label']) !!}
                {!! Form::text('email', old('email'), ['class' => 'form-control', 'id' => 'email' , 'required' => '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tel', '電話番号', ['class' => 'control-label']) !!}
                {!! Form::text('tel', old('tel'), ['class' => 'form-control', 'id' => 'tel' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'お問い合わせ内容*', ['class' => 'control-label']) !!}
                {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'id' => 'body' , 'required' => '']) !!}
            </div>

            <div><h6>「*」必須項目</h6></div>
            {!! Form::submit("送信", ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
