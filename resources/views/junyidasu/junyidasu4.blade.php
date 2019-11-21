@extends('layouts.junyi')

@section('content')

<div class="container">
<form method="POST" action="/api/junyidasu">

    <input type="hidden" name="id" value="4">
    <input type="hidden" name="next" value="5">

    <div class="row mt-5 mb-3">
        <div class="col-10 offset-1">
            <span class="label">あなたの名前を入れてください</span>
        <input type="text" class="form-control" id="name_4" name="name_4" value="{{session('name_4')}}" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-10 offset-1">
            <span class="label">ハンデダスで計算したハンデを入れてください。</span>
            <input  type="tel" pattern="^[0-9]+$" class="form-control" id="handi_4" name="handi_4"  value="{{session('handi_4')}}" required>
        </div>
    </div>

    <div class="border border-white mt-5">
    <div class="row mt-1">
        <div class="col-10 offset-1">
            <span class="label">同伴者１の名前</span>
            <input  type="text"  class="form-control" id="name1_4" name="name1_4" value="{{session('name1_4')}}">
        </div>
    </div>
    <div class="row  mt-3 mb-1">
        <div class="col-10 offset-1">
                <span class="label">ハンデダスで計算したハンデを入れてください。</span>
            <input type="tel" pattern="^[0-9]+$" class="form-control" id="handi1_4" name="handi1_4"  value="{{session('handi1_4')}}">
        </div>
    </div>
</div>
    <div class="row  mt-3">
        <div class="col-8 offset-2">
            <span class="label">同伴者空欄でも次に進みます</span>
            
        </div>
    </div>
    

    <div class="row fixed-bottom mb-3">
        <div class="col-4 offset-2">
            <button type="submit"  name="backbtn" class="btn btn-primary" value="back">戻る</button>
        </div>
        <div class="col-5 offset-1">
            <button type="submit"  class="btn btn-danger" name="nextbtn" value="next">次へ</button>
        </div>
    </div>
</form>
</div>

@endsection
