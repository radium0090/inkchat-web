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
              <li class="list-group-item"><span class="bg-info rounded p-1">名前</span> 　　{{auth()->user()->name}} さん、ログイン中！</li>
              <li class="list-group-item"><span class="bg-info rounded p-1">メール</span>　　{{auth()->user()->email}}</li>
              <li class="list-group-item"><span class="bg-info rounded p-1">公開中のマイページを見る</span>　　<a href="/u/{{auth()->user()->id}}" target="_blank"> マイページ </a></li>
            </ul>

            <ul class="list-group mb-3">
                <li class="list-group-item list-group-item-secondary"><a href="/mypage/home"><i class="fas fa-tachometer-alt" aria-hidden="true"></i> マイページTop</a></li>
                <li class="list-group-item list-group-item-secondary"><a href="/mypage/posts"><i class="fas fa-edit" aria-hidden="true"></i> 投稿管理</a></li>
                <li class="list-group-item list-group-item-secondary"><a href="/mypage/likedposts"><i class="far fa-heart" aria-hidden="true"></i> いいねした投稿</a></li>
                <li class="list-group-item list-group-item-secondary"><a href="/mypage/shownotifi"><i class="fas fa-info-circle" aria-hidden="true"></i> お知らせ</a></li>
                <li class="list-group-item list-group-item-secondary"><a href="/messages"><i class="fas fa-envelope" aria-hidden="true"></i> メッセージボックス @include('messenger.unread-count')</a></li>
                <li class="list-group-item list-group-item-secondary"><a href="/mypage/thumbnail"><i class="fas fa-user-alt" aria-hidden="true"></i> サムネイル設定</a></li>
                <li class="list-group-item list-group-item-secondary"><a href="/mypage/profile"><i class="fas fa-list" aria-hidden="true"></i> 基本情報編集</a></li>
                <li class="list-group-item list-group-item-secondary"><a href="/mypage/password"><i class="fas fa-lock" aria-hidden="true"></i> パスワード変更</a></li>
                <li class="list-group-item list-group-item-secondary">
                    
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a>
                </li>
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
