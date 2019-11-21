@extends('layouts.admin')

@section('content')
    <h3 class="page-title">ユーザー管理詳細</h3>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ニックネーム</th>
                    <td field-key='name'>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>内容</th>
                    <td field-key='introduction'>{!! $user->body !!}</td>
                </tr>
                <tr>
                    <th>サムネイル</th>
                    <td field-key='price'><img id="holder2" style="margin-top:15px;max-height:180px;" src="{{$user->thumbnail}}"></td>
                </tr>
                
            </table>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">戻る</a>
        </div>
    </div>
@stop


