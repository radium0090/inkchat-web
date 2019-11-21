@extends('layouts.auth')


@section('content')
    <div class="col-md-12 d-flex justify-content-center">
        <div class="card shadow-lg bg-light">
            <div class="card-body">
                <h5 class="card-title">{{ ucfirst(config('app.name')) }} @lang('admin.qa_login')</h5>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>@lang('admin.qa_whoops')</strong> @lang('admin.qa_there_were_problems_with_input'):
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal"
                        role="form"
                        method="POST"
                        action="{{ url('/admin/login') }}">
                    <input type="hidden"
                            name="_token"
                            value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="control-label">@lang('admin.qa_email')</label>

                        <div >
                            <input type="email"
                                    class="form-control"
                                    name="email"
                                    value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="ontrol-label">@lang('admin.qa_password')</label>

                        <div>
                            <input type="password"
                                    class="form-control"
                                    name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label>
                                <input type="checkbox"
                                        name="remember"> @lang('admin.qa_remember_me')
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit"
                                    class="btn btn-dark"
                                    style="margin-right: 15px;">
                                @lang('admin.qa_login')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      
    </div>
@endsection
