@extends('layouts.admin')

@section('content')
    <h3 class="page-title">お問い合わせ管理詳細</h3>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>問い合わせ内容</th>
                    <td field-key='body'>{{ $contact->body }}</td>
                </tr>
                <tr>
                    <th>内容</th>
                    <td field-key='introduction'>{!! $contact->body !!}</td>
                </tr>
                <tr>
                    <th>サムネイル</th>
                    <td field-key='price'><img id="holder2" style="margin-top:15px;max-height:180px;" src="{{$contact->thumbnail}}"></td>
                </tr>
                
            </table>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contacts.index') }}" class="btn btn-default">戻る</a>
        </div>
    </div>
@stop


