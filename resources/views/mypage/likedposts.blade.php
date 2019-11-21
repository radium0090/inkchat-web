@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 order-md-1">
             <ul class="list-group">
              <li class="list-group-item text-center">
                @if(auth()->user()->thumbnail)
                <img  src="{{auth()->user()->thumbnail}}" style="max-height:160px;max-width:160px;" alt="サムネイル">
                @else
                サムネイルまだ設定していません。
                @endif
              </li>
              <li class="list-group-item">{{auth()->user()->name}} さん、ログイン中！</li>
              <li class="list-group-item">{{auth()->user()->email}}</li>
            </ul>


            <ul class="list-group">
              @foreach ($likedposts as $post)
                  <li class="list-group-item"><a href="/p/{{$post->id}}">{{$post->title}}</a></li>
              @endforeach
              
            </ul>

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



var resize = $('#upload-demo').croppie({

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


$('.upload-image').on('click', function (ev) {

  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {

    $.ajax({
      url: "{{route('upload.image')}}",
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
