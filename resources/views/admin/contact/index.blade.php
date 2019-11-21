@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <p>
        <a href="{{ route('admin.contacts.create') }}" class="btn btn-success">お問い合わせ管理追加</a>
    </p>

    <div class="card">
        <div class="card-header">
            お問い合わせ管理一覧
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

                {{ $contacts->links() }}
                <!-- table class="table table-bordered table-striped {{ count($contacts) > 0 ? 'datatable' : '' }} dt-select " -->
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>問い合わせ内容</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>電話番号</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @if (count($contacts) > 0)
                            @foreach ($contacts as $contact)
                                <tr data-entry-id="{{ $contact->id }}">
                                    <td field-key='id'>{{ $contact->id }}</td>
                                    <td field-key='body'>{{ $contact->body }}</td>
                                    <td field-key='name'>{{ $contact->name }}</td>
                                    <td field-key='email'>{{ $contact->email }}</td>
                                    <td field-key='tel'>{{ $contact->tel }}</td>
                                    <td>
                                        <a href="{{ route('admin.contacts.show',[$contact->id]) }}" class="btn btn-xs btn-primary">詳細</a>
                                        <a href="{{ route('admin.contacts.edit',[$contact->id]) }}" class="btn btn-xs btn-info">編集</a>

                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".'削除してもよろしいでしょうか。'."');",
                                            'route' => ['admin.contacts.destroy', $contact->id])) !!}
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
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
    </script>
@endsection
