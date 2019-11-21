@extends('layouts.junyi')

@section('content')

<div class="container">
<form method="POST" action="/api/junyidasu">

    <input type="hidden" name="id" value="6">
    <input type="hidden" name="next" value="7">

    <div class="row mt-5 mb-3">
        <div class="col">
            <span class="label3">今日のラウンドは</span>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <span class="label2">{{session('name_4')}}</span>
            <input type="text" class="form-control" id="usr" name="handi_4_confirm" value="@if(session('handi_4')>=100) {{session('handi_4') - session('sum1_2') - session('sum1_3')}} @else {{session('handi_4')}} @endif" readonly>
        </div>
        <div class="col">
            <span class="label2">{{session('name1_4')}}</span>
            <input type="text" class="form-control" id="usr" name="handi1_4_confirm" value="@if(session('handi1_4')>=100) {{session('handi1_4') - session('sum1_2') - session('sum1_3')}} @else {{session('handi1_4')}} @endif" readonly>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <span class="label2">{{session('name2_5')}}</span>
            <input type="text" class="form-control" id="usr" name="handi2_5_confirm" value="@if(session('handi2_5')>=100) {{session('handi2_5') - session('sum1_2') - session('sum1_3')}} @else {{session('handi2_5')}} @endif" readonly>
        </div>
        <div class="col">
            <span class="label2">{{session('name3_5')}}</span>
            <input type="text" class="form-control" id="usr" name="handi3_5_confirm" value="@if(session('handi3_5')>=100) {{session('handi3_5') - session('sum1_2') - session('sum1_3')}} @else {{session('handi3_5')}} @endif" readonly>
        </div>
    </div>

    <div class="row  mt-5">
        <div class="col-6 offset-3">
            <span class="label2">PAR数合計は</span>
            <input type="text" class="form-control" id="usr" name="sum1_2_3" value="{{session('sum1_2') + session('sum1_3')}}" readonly>
        </div>
    </div>
    <div class="row  mt-5">
        <div class="col-6 offset-3">
                <button type="submit"  class="btn btn-danger" name="nextbtn" value="next">ラウンドスタート</button>
        </div>
    </div>
    

    <div class="row fixed-bottom mb-3">
        <div class="col-4 offset-2">
            <button type="submit"  name="backbtn" class="btn btn-primary" value="back">戻る</button>
        </div>
        <div class="col-5 offset-1">
           　
        </div>
    </div>
</form>
</div>

@endsection
