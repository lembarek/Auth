@extends('auth::layout.master')

@section('title')

@stop

@section('content')

@include('core::partials.errors')

<form method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label class="col-md-4 control-label">{{ Lang::get('form.email')}}</label>
        <div class="col-md-6">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">{{ Lang::get('form.password')}}</label>
        <div class="col-md-6">
        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="{{ Lang::get('form.login') }}" class="btn btn-primary" />
    </div>
    <a href="{{ route('auth::reset.showEmail') }}">forget your password</a>
</form>
@stop

