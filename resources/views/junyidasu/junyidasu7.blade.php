@extends('layouts.junyi')

@section('content')

<div class="container">
<form method="POST" action="/api/junyidasu">
    <input type="hidden" name="id" value="7">
    <input type="hidden" name="next" value="7">
    <input type="hidden" name="curhole" value="{{$curhole}}">

    <div class="row mt-5 mb-3">
        <div class="col-4 offset-2">
            <span class="label2">{{$curhole}}番ホール</span>
        </div>
        <div class="col-4">
            <span class="label2">打数</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-4 offset-2">
        <span class="labelbg">{{session('name_4')}}</span>
        <span class="labelbgs">{{session('handi_4_confirm')}}</span>
        </div>
        <div class="col-4">
        {{ Form::select('result_'.$curhole, $option15,session('result_'.$curhole), array('id'=>'result_','class' => 'form-control')) }}
        
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4 offset-2">
            <span class="labelbg">{{session('name1_4')}}</span>
            <span class="labelbgs">{{session('handi1_4_confirm')}}</span>
        </div>
        <div class="col-4">
        {{ Form::select('result1_'.$curhole, $option15,session('result1_'.$curhole), array('id'=>'result1_','class' => 'form-control')) }}
        </div>
        
    </div>
    <div class="row mt-5">
        <div class="col-4 offset-2">
            <span class="labelbg">{{session('name2_5')}}</span>
            <span class="labelbgs">{{session('handi2_5_confirm')}}</span>
        </div>
        <div class="col-4">
        {{ Form::select('result2_'.$curhole, $option15,session('result2_'.$curhole), array('id'=>'result2_','class' => 'form-control')) }}
        </div>
        
    </div>
    <div class="row mt-5">
        <div class="col-4 offset-2">
            <span class="labelbg">{{session('name3_5')}}</span>
            <span class="labelbgs">{{session('handi3_5_confirm')}}</span>
        </div>
        <div class="col-4">
        {{ Form::select('result3_'.$curhole, $option15,session('result3_'.$curhole), array('id'=>'result3_','class' => 'form-control')) }}
        </div>
       
    </div>

    <div class="row  mt-5">
        <div class="col-4 offset-3">
            <button type="submit"  class="btn btn-danger" name="checknow" value="1"> 今の順位を見る </button>
            <!-- <a class="btn btn-danger" href="/api/junyidasu?next=8" role="button">今の順位を見る</a> -->
        </div>
    </div>
    

    <div class="row fixed-bottom mb-3">
        <div class="col-4 offset-2">
            <button type="submit"  name="backbtn" class="btn btn-primary" value="back">戻る</button>
        </div>
        <div class="col-5 offset-1">
            @if($curhole == 18)
            <button type="submit"  class="btn btn-danger" name="checknow" value="1"> ラウンド終了 </button>
            @else
            <button type="submit"  class="btn btn-danger" name="nextbtn" value="next">次へ</button>
            @endif
        </div>
    </div>
</form>
</div>

@endsection
