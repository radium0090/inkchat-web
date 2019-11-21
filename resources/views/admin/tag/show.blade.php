@extends('layouts.admin')

@section('content')
    <h3 class="page-title">タグ詳細</h3>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>名称</th>
                    <td field-key='name'>{{ $tag->name }}</td>
                </tr>
                <tr>
                    <th>内容</th>
                    <td field-key='introduction'>{!! $tag->body !!}</td>
                </tr>
                <tr>
                    <th>サムネイル</th>
                    <td field-key='price'><img id="holder2" style="margin-top:15px;max-height:180px;" src="{{$tag->thumbnail}}"></td>
                </tr>
                
            </table>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tags.index') }}" class="btn btn-default">戻る</a>
        </div>
    </div>
@stop


