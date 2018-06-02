@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">@lang('copyFrom.copy_from_add')</div>
                    <div class="layui-card-body" pad15="2">
                        <form action="{{ route('admin.copy_from.update',['id'=>$copy_from_info['id']]) }}" method="post"
                              class="layui-form layui-form-pane">
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('copyFrom.name')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" lay-verify="required" name="name"
                                           value="{{ $copy_from_info['name'] }}" placeholder="@lang('copyFrom.name')"
                                           type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('copyFrom.desc')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="desc"
                                           value="{{ $copy_from_info['desc'] }}"
                                           placeholder="@lang('copyFrom.desc')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item" style="text-align: center">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <input type="hidden" name="id" value="{{ $copy_from_info['id'] }}">
                                <button class="layui-btn layui-btn-normal" lay-submit=""><i class="layui-icon">&#xe609;</i> @lang('copyFrom.edit')</button>
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
        }).use(['index', 'form'], function () {
            var form = layui.form
                , index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            @if(Session::has('message'))
            layer.msg('{{Session::get("message")}}', {offset: '100px', icon: 1, time: 1000});
            setTimeout(function () {
                parent.window.location.reload();
                parent.layer.close(index);
            }, 500);
            @endif
        });
    </script>
@endsection()
