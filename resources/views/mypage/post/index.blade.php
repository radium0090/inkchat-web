@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 order-md-1">

                <p>
                    <a href="{{ route('mypage.posts.create') }}" class="btn btn-success">投稿追加</a>
                </p>

                <div class="card">
                    <div class="card-header">
                        自分の投稿一覧
                    </div>



                    <div class="card-body">

                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">タイトル</th>
                            <th scope="col">投稿時刻</th>
                            <th scope="col">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $coupon)
                                <tr>
                                <th scope="row">{{ $coupon->id }}</th>
                                <td><a href="/p/{{$coupon->id}}" target="_blank"> {{ $coupon->title }} </a> </td>
                                <td>{{ $coupon->created_at }}</td>
                                <td>
                                     {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("admin.qa_are_you_sure")."');",
                                        'route' => ['mypage.posts.destroy', $coupon->id])) !!}
                                    {!! Form::submit(trans('admin.qa_delete'), array('class' => 'btn btn-sm btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                                </tr>
                            @endforeach
                           　
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('mypage.sidebar')
        </div>
    </div>
@stop

@section('javascript') 
    <script>
    </script>
@endsection