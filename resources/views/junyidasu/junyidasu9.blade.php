@extends('layouts.junyi')

@section('content')

<div class="container">
<form method="POST" action="/api/junyidasu">
    <input type="hidden" name="id" value="7">
    <input type="hidden" name="next" value="8">
    <input type="hidden" name="flush" value="1">

    <div class="row mt-1 mb-1">
        <div class="col-6 offset-3">
            <span class="label">最終成績発表</span>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
        <span class="label2">{{session('date_1')}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
            <span class="label3">{{session('golfjyo_1')}}</span>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4 offset-1">
            <span class="label3">優勝</span>
        </div>
        <div class="col-2">
            <span class="labelbg">{{session('rsum_1')}}</span>
        </div>
        <div class="col-5">
            <span class="labelbg">{{session('rname_1')}}</span>
            <span class="labelbgs">{{session('rhandi_1')}}</span>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4 offset-1">
            <span class="label3">準優勝</span>
        </div>
        <div class="col-2">
            <span class="labelbg">{{session('rsum_2')}}</span>
        </div>
        <div class="col-5">
            <span class="labelbg">{{session('rname_2')}}</span>
            <span class="labelbgs">{{session('rhandi_2')}}</span>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4 offset-1">
            <span class="label3">3位</span>
        </div>
        <div class="col-2">
            <span class="labelbg">{{session('rsum_3')}}</span>
        </div>
        <div class="col-5">
            <span class="labelbg">{{session('rname_3')}}</span>
            <span class="labelbgs">{{session('rhandi_3')}}</span>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4 offset-1">
            <span class="label3">4位</span>
        </div>
        <div class="col-2">
            <span class="labelbg">{{session('rsum_4')}}</span>
        </div>
        <div class="col-5">
            <span class="labelbg">{{session('rname_4')}}</span>
            <span class="labelbgs">{{session('rhandi_4')}}</span>
        </div>
    </div>
    
    <div class="row fixed-bottom mb-3 ml-3">
        <div class="col-4">
            <a class="btn btn-primary" href="/api/junyidasu" role="button">最初へ戻る</a>
        </div>

        <div class="col-8">
            <button type="submit"  name="backbtn" class="btn btn-danger" value="back">データを消去して最初から</button>
        </div>
    </div>
</form>
</div>

@endsection
