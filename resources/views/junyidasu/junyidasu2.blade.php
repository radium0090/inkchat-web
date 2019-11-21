@extends('layouts.junyi')

@section('content')

<div class="container">
<form method="POST" action="/api/junyidasu">

    <input type="hidden" name="id" value="2">
    <input type="hidden" name="next" value="3">
    <div class="row mb-1">
        <div class="d-flex justify-content-center mx-4">
            <p class="text-white label2">
            前半にラウンドするホールのPARの数を入れてください。
            例えばINコース（１０番ホール）からスタートする場合１０番ホール＝１番となります
            </p>
        </div>
        
    </div>
    <div class="row mt-3">
        <div class="col">
            <span class="label">１番 PAR数</span>
            {{ Form::select('par1_2', $option3, session('par1_2'), array('id'=>'par1_2','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="label">2番 PAR数</span>

            {{ Form::select('par2_2', $option3, session('par2_2'), array('id'=>'par2_2','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="label">3番 PAR数</span>
            {{ Form::select('par3_2', $option3, session('par3_2'), array('id'=>'par3_2','class' => 'form-control')) }}
        </div>
    </div>
    <div class="row  mt-3">
        <div class="col">
            <span class="label">4番 PAR数</span>
            {{ Form::select('par4_2', $option3, session('par4_2'), array('id'=>'par4_2','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="label">5番 PAR数</span>
            {{ Form::select('par5_2', $option3, session('par5_2'), array('id'=>'par5_2','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="label">6番 PAR数</span>
            {{ Form::select('par6_2', $option3, session('par6_2'), array('id'=>'par6_2','class' => 'form-control')) }}
        </div>
    </div>
    <div class="row  mt-3">
        <div class="col">
            <span class="label">7番 PAR数</span>
            {{ Form::select('par7_2', $option3, session('par7_2'), array('id'=>'par7_2','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="label">8番 PAR数</span>
            {{ Form::select('par8_2', $option3, session('par8_2'), array('id'=>'par8_2','class' => 'form-control')) }}
        </div>

        <div class="col">
            <span class="label">9番 PAR数</span>
            {{ Form::select('par9_2', $option3, session('par9_2'), array('id'=>'par9_2','class' => 'form-control')) }}
            
        </div>
    </div>

    <div class="row  mt-3">
        <div class="col-4 offset-4">
            <span class="label3">前半合計</span>
            <input type="text" class="form-control" id="sum1_2" name="sum1_2" readonly>
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
        $('#sum1_2').val(sum);

        $('select[id^="par"]').change(function() {
            //alert( "Handler for .keyup() called." );
            var sum = 0;
            $('select[id^="par"]').each(function() {
                $v = parseInt($(this).val()) || 0;
                sum = sum + $v;
            });
            console.log(sum);
            $('#sum1_2').val(sum);
        });
    });
</script>


@endsection
