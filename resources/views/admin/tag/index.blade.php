@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <p>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-success">タグ追加</a>
    </p>

    <div class="card">
        <div class="card-header">
            タグ一覧
        </div>

        <div class="card-body">
            <div class="table-responsive">
                {!! Form::open(['name' => '','url' => '/', 'method' => 'post']) !!}
                <table class="table table-bordered table-striped dt-select bg-secondary">
                    <tr>
                        <th>ＩＤ</th><td><input name="id" class="form-control" style="width:16em;display:inline-block;" value=""></td>
                        <th>名称</th><td><input name="name" class="form-control" style="width:16em;display:inline-block;" value=""></td>
                    </tr>
                </table>
                <button type="submit" name="submit" class="btn btn-dark float-right">検索</button>
                {!! Form::close() !!}

                {{ $tags->links() }}
                <!-- table class="table table-bordered table-striped {{ count($tags) > 0 ? 'datatable' : '' }} dt-select " -->
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名称</th>
                            <th>サムネイル</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @if (count($tags) > 0)
                            @foreach ($tags as $tag)
                                <tr data-entry-id="{{ $tag->id }}">
                                    <td field-key='id'>{{ $tag->id }}</td>
                                    <td field-key='name'>{{ $tag->name }}</td>
                                    <td field-key='photo1'>@if($tag->thumbnail)<img style="margin-top:15px;max-height:80px;" src="{{$tag->thumbnail}}"/>@endif</td>
                                    <td>
                                        <a href="{{ route('admin.tags.show',[$tag->id]) }}" class="btn btn-xs btn-primary">詳細</a>
                                        <a href="{{ route('admin.tags.edit',[$tag->id]) }}" class="btn btn-xs btn-info">編集</a>

                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".'削除してもよろしいでしょうか。'."');",
                                            'route' => ['admin.tags.destroy', $tag->id])) !!}
                                        {!! Form::submit('削除', array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="13">検索結果がありません</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $tags->links() }}
            </div>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
    </script>
@endsection
