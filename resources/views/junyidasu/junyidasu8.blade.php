@extends('layouts.junyi')

@section('content')

<div class="container">
<form method="POST" action="/api/junyidasu">
    <input type="hidden" name="id" value="8">
    <input type="hidden" name="next" value="9">

    <div class="row mb-1">
        <div class="col-6 offset-2">
            <span class="label3">現在の順位</span>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-3 offset-1">
            <span class="label3">1位</span>
        </div>
        <div class="col-2">
            <span class="labelbg">{{session('rsum_1')}}</span>
        </div>
        <div class="col-6">
        <span class="labelbg">{{session('rname_1')}}</span>
        <span class="labelbgs">{{session('rhandi_1')}}</span>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-3 offset-1">
            <span class="label3">2位</span>
        </div>
        <div class="col-2">
            <span class="labelbg">{{session('rsum_2')}}</span>
        </div>
        <div class="col-6">
            <span class="labelbg">{{session('rname_2')}}</span>
            <span class="labelbgs">{{session('rhandi_2')}}</span>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-3 offset-1">
            <span class="label3">3位</span>
        </div>
        <div class="col-2">
            <span class="labelbg">{{session('rsum_3')}}</span>
        </div>
        <div class="col-6">
            <span class="labelbg">{{session('rname_3')}}</span>
            <span class="labelbgs">{{session('rhandi_3')}}</span>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-3 offset-1">
            <span class="label3">4位</span>
        </div>
        <div class="col-2">
            <span class="labelbg">{{session('rsum_4')}}</span>
        </div>
        <div class="col-6">
            <span class="labelbg">{{session('rname_4')}}</span>
            <span class="labelbgs">{{session('rhandi_4')}}</span>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <span class="label">入力確認</span>
        </div>
    </div>
    <div class="row">
        @foreach([1,2,3,4,5,6,7,8,9] as $idx)
            <div class="col-1">
            <span class="label">{{$idx}}</span>
            <input type="checkbox" id="usr" name="chk{{$idx}}" @if($ckall[$idx]) checked @endif>
            </div>
        @endforeach
        
    </div>
    <div class="row">
        @foreach([10,11,12,13,14,15,16,17,18] as $idx)
            <div class="col-1">
            <span class="label">{{$idx}}</span>
            <input type="checkbox" id="usr" name="chk{{$idx}}" @if($ckall[$idx]) checked @endif>
        </div>
        @endforeach
    </div>
    
    <div class="row fixed-bottom mb-3">
        <div class="col-4 offset-2">
            <button type="submit"  name="backbtn" class="btn btn-primary" value="back">戻る</button>
        </div>
        <div class="col-5 offset-1">
            <button type="submit"  class="btn btn-danger">最終成績</button>
        </div>
    </div>
</form>
</div>

@endsection
