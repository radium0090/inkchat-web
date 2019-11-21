@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 order-md-1">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">サムネイル編集 ({{auth()->user()->name}})</div>
                <div class="card-body border text-center">
                    <div id="preview-crop-image" >
                        @if(auth()->user()->thumbnail)
                          <img src="{{auth()->user()->thumbnail}}" alt="プロフィールサムネイル" class="img-thumbnail">
                        @else
                          <p>サムネイルまだ設定していません。</p>
                        @endif
                    </div>
                </div>
                <div class="card-body border">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-info" role="alert">
                              サムネイル画像を選択して、アップロードボタンを押してください。
                            </div>
                            <input type="file" id="image">
                            <button id="upload-image" class="btn btn-primary"><i class="fas fa-arrow-circle-up"></i>画像アップロード</button>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col">
                            <div id="upload-preview"></div>
                        </div>
                    </div>
                    
                </div>

            </div>

            <!--------------------------->
        </div>

        @include('mypage.sidebar')
    </div>
</div>

@endsection


@section('javascript') 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>

<script type="text/javascript">

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


var resize = $('#upload-preview').croppie({

    enableExif: true,
    enableOrientation: true,    
    viewport: { 
        width: 200,
        height: 200,
        type: 'circle'
    },

    boundary: {
        width: 300,
        height: 300
    }

});


$('#image').on('change', function () { 
  console.log('image_onchange_called');
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});


$('#upload-image').on('click', function (ev) {

  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {

    $.ajax({
      url: "{{route('mypage.uploadthumbnail')}}",
      type: "POST",
      data: {"image":img},
      success: function (data) {
        html = '<img src="' + img + '" />';
        $("#preview-crop-image").html(html);
      }
    });
  });
});

</script>
    
@endsection
