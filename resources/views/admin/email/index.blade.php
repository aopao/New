@extends('admin.layouts.iframe_layout')
@section('css')
    <style>
        .layui-table-cell {
            height: 50px;
            line-height: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">@lang('email.email_list')</div>
                    <div class="layui-card-body">
                        <div class="test-table-reload-btn" style="margin-bottom: 10px;">
                            <a class="layui-btn layui-btn-normal" href="{{ route('admin.email.send') }}"><i class="layui-icon">&#xe61f;</i>@lang('email.email_send')</a>
                        </div>
                        <div class="pagenormal">
                            <table class="layui-hide" id="serviceList" lay-filter="serviceList"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('js')
    <script>
        let ServiceIndexUrl = '{{ route('admin.email.index') }}';
        let ServiceListUrl = '{{ route('admin.email.list') }}';
        layui.config({
            base: '/theme/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'table', 'laytpl'], function () {
            var $ = layui.$
                , admin = layui.admin
                , table = layui.table;

            table.render({
                elem: '#serviceList'
                , url: ServiceListUrl
                , cellMinWidth: 80
                , page: true
                , limit: 30
                , cols: [[
                    {field: 'id', title: 'ID', width: 50, fixed: true}
                    , {field: 'mobile', title: '手机号', width: 150}
                    , {field: 'email', title: '邮箱', width: 200}
                    , {field: 'fromaddr', title: '发件人邮箱', width: 200}
                    , {field: 'title', title: '邮件标题', width: 150}
                    , {field: 'content', title: '邮件内容', width: 300}
                    , {field: 'created_at', title: ' 发送时间', sort: true, align: 'center', width: 200}
//                    , {align: 'center', title: '操作', width: 120, fixed: 'right', toolbar: '#categorListOperate'}
                ]]
            });

        });
    </script>
@endsection()
