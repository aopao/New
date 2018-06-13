@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">@lang('config.email')</div>
                    <div class="layui-card-body">
                        <form action="{{ route('admin.config.update') }}" method="post" class="layui-form layui-form-pane">
                            <div class="layui-tab layui-tab-brief" lay-filter="component-tabs-brief">
                                <ul class="layui-tab-title">
                                    <li class="layui-this">系统发送</li>
                                    <li>SendCloud</li>
                                </ul>
                                <div class="layui-tab-content">
                                    <div class="layui-tab-item layui-show">
                                        <div class="layui-form-item" id="MAIL_HOST">
                                            <label class="layui-form-label">@lang('config.email_smtp')</label>
                                            <div class="layui-input-block">
                                                <input autocomplete="off" class="layui-input" lay-verify="required" name="email_smtp" value="{{ $configInfo["email_smtp"] or '未设置' }}" placeholder="@lang('config.email_smtp')" type="text"/>
                                            </div>
                                        </div>
                                        
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">@lang('config.email_port')</label>
                                            <div class="layui-input-block">
                                                <input autocomplete="off" class="layui-input" lay-verify="required" name="email_port" value="{{ $configInfo["email_port"] or '未设置' }}" placeholder="@lang('config.email_port')" type="text"/>
                                            </div>
                                        </div>
                                        
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">@lang('config.email_from')</label>
                                            <div class="layui-input-block">
                                                <input autocomplete="off" class="layui-input" lay-verify="required" name="email_from" value="{{ $configInfo["email_from"] or '未设置' }}" placeholder="@lang('config.email_from')" type="text"/>
                                            </div>
                                        </div>
                                        
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">@lang('config.email_user')</label>
                                            <div class="layui-input-block">
                                                <input autocomplete="off" class="layui-input" lay-verify="required" name="email_user" value="{{ $configInfo["email_user"] or '未设置' }}" placeholder="@lang('config.email_user')" type="text"/>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">@lang('config.email_password')</label>
                                            <div class="layui-input-block">
                                                <input autocomplete="off" class="layui-input" lay-verify="required" name="email_password" value="{{ $configInfo["email_password"] or '未设置' }}" placeholder="@lang('config.email_password')" type="text"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-tab-item">
                                    
                                    </div>
                                    <div class="layui-form-item">
                                        {{ csrf_field() }}
                                        <button class="layui-btn layui-btn-normal" lay-submit=""><i class="layui-icon">&#xe609;</i> @lang('config.submit')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('js')
    <script>
        layui.config({
            base: '/theme/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'set'], function () {
            @if(Session::has('message'))
            layer.msg('{{Session::get("message")}}', {offset: '300px', icon: 1, time: 1000});
            @endif
        });
    </script>
@endsection()
