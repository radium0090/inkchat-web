@extends('layouts.junyi')

@section('content')

<div class="container">
<form method="POST" action="/api/junyidasu">

    <input type="hidden" name="id" value="1">
    <input type="hidden" name="next" value="2">
    <div class="row mt-5">
        <div class="col-10 offset-1">
            <span class="label">日付を入力してください</span>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1">
            <input type="date" class="form-control" id="usr" name="date_1" value="{{session('date_1')}}" required>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-10 offset-1">
            <span class="label">ゴルフ場の名前を入力してください</span>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1">
        <input type="text" class="form-control" id="usr" name="golfjyo_1" value="{{session('golfjyo_1')}}" required>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-10 offset-1">
            <span class="label">本日のラウンドは</span>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1 form-inline">
            <input type="radio" 　id="hole18_1" name="hole_1" value=18><label class="label">18ホール</label>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1 form-inline">
            <input type="radio" 　 id="hole9_1" name="hole_1" value=9><label class="label">9ホール</label>
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
