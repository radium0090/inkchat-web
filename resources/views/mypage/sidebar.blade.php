<div class="col-md-4 order-md-2 mb-4 pl-1">
    

    <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed"><a href="/mypage/home">マイページTop</a></li>
        <li class="list-group-item d-flex justify-content-between lh-condensed"><a href="/mypage/posts">自分の投稿一覧</a></li>
        <!-- <li class="list-group-item d-flex justify-content-between lh-condensed"><a href="/mypage/likedposts">いいねした投稿</a></li> 
        <li class="list-group-item d-flex justify-content-between lh-condensed"><a href="/mypage/shownotifi">お知らせ</a></li> -->
        <li class="list-group-item d-flex justify-content-between lh-condensed"><a href="/messages">メッセージボックス @include('messenger.unread-count')</a></li>
        <li class="list-group-item d-flex justify-content-between lh-condensed"><a href="/mypage/thumbnail">サムネイル設定</a></li>
        <li class="list-group-item d-flex justify-content-between lh-condensed"><a href="/mypage/profile">基本情報編集</a></li>
        <li class="list-group-item d-flex justify-content-between lh-condensed"><a href="/mypage/password">パスワード変更</a></li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </li>
    </ul>

    

</div>