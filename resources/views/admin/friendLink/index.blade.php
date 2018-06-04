@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">@lang('link.link')</div>
                    <div class="layui-card-body" pad15="2">
                    <form action="{{ route('admin.config.update') }}" method="post" class="layui-form layui-form-pane">
                       
                        <div class="layui-form-item">
                            <label class="layui-form-label">@lang('config.web_name')</label>
                            <div class="layui-input-block">
                                <input autocomplete="off" class="layui-input" lay-verify="required" name="web_name" value="{{ $configInfo["web_name"] }}" placeholder="@lang('config.web_name')" type="text"/>
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">@lang('config.web_url')</label>
                            <div class="layui-input-block">
                                <input autocomplete="off" class="layui-input" name="web_url" value="{{ $configInfo["web_url"] }}" placeholder="@lang('config.web_url')" type="text"/>
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">@lang('config.seo_index')</label>
                            <div class="layui-input-block">
                                <input autocomplete="off" class="layui-input" name="seo_index" value="{{ $configInfo["seo_index"] }}" placeholder="@lang('config.seo_index')" type="text"/>
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">@lang('config.seo_keywords')</label>
                            <div class="layui-input-block">
                                <input autocomplete="off" class="layui-input" name="seo_keywords" value="{{ $configInfo["seo_keywords"] }}" placeholder="@lang('config.seo_keywords')" type="text"/>
                            </div>
                        </div>
                        
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">@lang('config.seo_description')</label>
                            <div class="layui-input-block">
                                <textarea class="layui-textarea" name="seo_description" placeholder="@lang('config.seo_description')">{{ $configInfo["seo_description"] }}</textarea>
                            </div>
                        </div>
                        
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">@lang('config.analyze_code')</label>
                            <div class="layui-input-block">
                                <textarea class="layui-textarea" name="analyze_code" placeholder="@lang('config.analyze_code')">{{ $configInfo["analyze_code"] }}</textarea>
                            </div>
                        </div>
                        
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">@lang('config.copyright')</label>
                            <div class="layui-input-block">
                                <textarea class="layui-textarea" name="copyright" placeholder="@lang('config.copyright')">{{ $configInfo["copyright"] }}</textarea>
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            {{ csrf_field() }}
                            <button class="layui-btn" lay-submit="">@lang('config.submit')</button>
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
	}).use(['index', 'set'],function () {
        @if(Session::has('message'))
		layer.msg('{{Session::get("message")}}', {offset: '300px', icon: 1, time: 1000});
        @endif
	});
</script>
@endsection()
