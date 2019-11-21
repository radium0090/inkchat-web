@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <p>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">ユーザー管理追加</a>
    </p>

    <div class="card">
        <div class="card-header">
            ユーザー管理一覧
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

                {{ $users->links() }}
                <!-- table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select " -->
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ニックネーム</th>
                            <th>サムネイル</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td field-key='id'>{{ $user->id }}</td>
                                    <td field-key='name'>{{ $user->name }}</td>
                                    <td field-key='photo1'>@if($user->thumbnail)<img style="margin-top:15px;max-height:80px;" src="{{$user->thumbnail}}"/>@endif</td>
                                    <td>
                                        <a href="{{ route('admin.users.show',[$user->id]) }}" class="btn btn-xs btn-primary">詳細</a>
                                        <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">編集</a>

                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".'削除してもよろしいでしょうか。'."');",
                                            'route' => ['admin.users.destroy', $user->id])) !!}
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
    </script>
@endsection
