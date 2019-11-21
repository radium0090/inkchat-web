@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('content')
    <p>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success">投稿追加</a>
    </p>

    <div class="card">
        <div class="card-header">
            投稿一覧
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

                {{ $posts->links() }}
                <!-- table class="table table-bordered table-striped {{ count($posts) > 0 ? 'datatable' : '' }} dt-select " -->
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>タイトル</th>
                            <th>サムネイル</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @if (count($posts) > 0)
                            @foreach ($posts as $coupon)
                                <tr data-entry-id="{{ $coupon->id }}">
                                    <td field-key='id'>{{ $coupon->id }}</td>
                                    <td field-key='title'>{{ $coupon->title }}</td>
                                    <td field-key='photo1'>@if($coupon->thumbnail)<img style="margin-top:15px;max-height:80px;" src="{{$coupon->thumbnail}}"/>@endif</td>
                                    <td>
                                        <a href="{{ route('admin.posts.show',[$coupon->id]) }}" class="btn btn-xs btn-primary">@lang('admin.qa_view')</a>
                                        <a href="{{ route('admin.posts.edit',[$coupon->id]) }}" class="btn btn-xs btn-info">@lang('admin.qa_edit')</a>

                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("admin.qa_are_you_sure")."');",
                                            'route' => ['admin.posts.destroy', $coupon->id])) !!}
                                        {!! Form::submit(trans('admin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="13">@lang('admin.qa_no_entries_in_table')</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
    </script>
@endsection
