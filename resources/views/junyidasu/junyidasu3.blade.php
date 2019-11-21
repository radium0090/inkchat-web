@extends('layouts.junyi')

@section('content')

<div class="container">
<form method="POST" action="/api/junyidasu">

    <input type="hidden" name="id" value="3">
    <input type="hidden" name="next" value="4">
    <div class="row mt-5 mb-3">
        <div class="col-8 offset-2">
            <span class="label2">後半にラウンドするホールのPARの数を入れてください</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <span class="labely">10番 PAR数</span>
            {{ Form::select('par10_3', $option3, session('par10_3'), array('id'=>'par10_3','class' => 'form-control')) }}
            
        </div>

        <div class="col">
            <span class="labely">11番 PAR数</span>
            {{ Form::select('par11_3', $option3,  session('par11_3'), array('id'=>'par11_3','class' => 'form-control')) }}
            
        </div>

        <div class="col">
            <span class="labely">12番 PAR数</span>
            {{ Form::select('par12_3', $option3,  session('par12_3'), array('id'=>'par12_3','class' => 'form-control')) }}
        </div>
    </div>
    <div class="row  mt-3">
        <div class="col">
            <span class="labely">13番 PAR数</span>
            {{ Form::select('par13_3', $option3,  session('par13_3'), array('id'=>'par13_3','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="labely">14番 PAR数</span>
            {{ Form::select('par14_3', $option3,  session('par14_3'), array('id'=>'par14_3','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="labely">15番 PAR数</span>
            {{ Form::select('par15_3', $option3,  session('par15_3'), array('id'=>'par15_3','class' => 'form-control')) }}
        </div>
    </div>
    <div class="row  mt-3">
        <div class="col">
            <span class="labely">16番 PAR数</span>
            {{ Form::select('par16_3', $option3,  session('par16_3'), array('id'=>'par16_3','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="labely">17番 PAR数</span>
            {{ Form::select('par17_3', $option3,  session('par17_3'), array('id'=>'par17_3','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="labely">18番 PAR数</span>
            {{ Form::select('par18_3', $option3,  session('par18_3'), array('id'=>'par18_3','class' => 'form-control')) }}
        </div>
    </div>
    <div class="row  mt-3">
        <div class="col-4 offset-4">
            <span class="label3">後半合計</span>
            <input type="text" class="form-control" id="sum1_3" name="sum1_3" readonly>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var sum = 0;
        $('select[id^="par"]').each(function() {
            $v = parseInt($(this).val()) || 0;
            sum = sum + $v;
        });
        console.log(sum);
        $('#sum1_3').val(sum);

        $('select[id^="par"]').change(function() {
            //alert( "Handler for .keyup() called." );
            var sum = 0;
            $('select[id^="par"]').each(function() {
                $v = parseInt($(this).val()) || 0;
                sum = sum + $v;
            });
            console.log(sum);
            $('#sum1_3').val(sum);
        });
    });
</script>

@endsection
