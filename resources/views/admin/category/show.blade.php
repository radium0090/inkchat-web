@extends('layouts.admin')

@section('content')
    <h3 class="page-title">カテゴリ詳細</h3>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>名称</th>
                    <td field-key='name'>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>内容</th>
                    <td field-key='introduction'>{!! $category->body !!}</td>
                </tr>
                <tr>
                    <th>サムネイル</th>
                    <td field-key='price'><img id="holder2" style="margin-top:15px;max-height:180px;" src="{{$category->thumbnail}}"></td>
                </tr>
                
            </table>

            <p>&nbsp;</p>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-default">戻る</a>
        </div>
    </div>
@stop


