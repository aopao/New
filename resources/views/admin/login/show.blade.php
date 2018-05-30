@extends('admin.layouts.iframe_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset("theme/style/login.css") }}" media="all">
@endsection()
@section('content')
    <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">
        <div class="layadmin-user-login-main">
            <div class="layadmin-user-login-box layadmin-user-login-header">
                <h2>{{ $config["web_name"] }}</h2>
            </div>
            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-account"></label>
                    <input type="text" name="account" id="LAY-user-login-account" lay-verify="required" placeholder="@lang('login.account')" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                    <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="@lang('login.password')" class="layui-input">
                </div>
                <div class="layui-form-item" style="margin-bottom: 20px;">
                    <input type="checkbox" name="remember" lay-skin="primary" title="@lang('login.remember')">
                    <a href="forget.html" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">@lang('login.forget')</a>
                </div>
                <div class="layui-form-item">
                    {{ csrf_field() }}
                    <button class="layui-btn layui-btn-fluid" id="submit" lay-submit lay-filter="LAY-user-login-submit">@lang('login.login')</button>
                </div>
            </div>
        </div>
        <div class="layui-trans layadmin-user-login-footer">
            <p>{{ $config["copyright"] }}</p>
        </div>
    </div>
@endsection()

@section('js')
    <script>
        let LoginUrl = "/{{config('admin.admin_prefix')}}/login"
    </script>
    <script src="{{ asset("theme/js/login.js") }}"></script>
@endsection()