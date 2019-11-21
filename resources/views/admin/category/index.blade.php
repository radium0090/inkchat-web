@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <p>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">カテゴリ追加</a>
    </p>

    <div class="card">
        <div class="card-header">
            カテゴリ一覧
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

                {{ $categories->links() }}
                <!-- table class="table table-bordered table-striped {{ count($categories) > 0 ? 'datatable' : '' }} dt-select " -->
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
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                <tr data-entry-id="{{ $category->id }}">
                                    <td field-key='id'>{{ $category->id }}</td>
                                    <td field-key='name'>{{ $category->name }}</td>
                                    <td field-key='photo1'>@if($category->thumbnail)<img style="margin-top:15px;max-height:80px;" src="{{$category->thumbnail}}"/>@endif</td>
                                    <td>
                                        <a href="{{ route('admin.categories.show',[$category->id]) }}" class="btn btn-xs btn-primary">詳細</a>
                                        <a href="{{ route('admin.categories.edit',[$category->id]) }}" class="btn btn-xs btn-info">編集</a>

                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".'削除してもよろしいでしょうか。'."');",
                                            'route' => ['admin.categories.destroy', $category->id])) !!}
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
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
    </script>
@endsection
