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
                    <div class="layui-card-header">@lang('payRecord.payRecord_list')</div>
                    <div class="layui-card-body">
                        <table class="layui-hide" id="payRecordList" lay-filter="payRecordList"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('js')
    <script>
        let CategoryListUrl = '{{ route('admin.payRecord.payRecordlist') }}';
        layui.config({
            base: '/theme/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'table'], function () {
            var table = layui.table;

            table.render({
                elem: '#payRecordList'
                , url: CategoryListUrl
                , cellMinWidth: 80
                , page: true
                , limit: 30
                , cols: [[
                    {field: 'id', title: 'ID', width: 50, fixed: true}
                    , {field: 'mobile', title: '用户手机号'}
                    , {field: 'title', title: '服务标题'}
                    , {field: 'current_price', title: '服务现价'}
                    , {field: 'price', title: '付款金额'}
                    , {field: 'num', title: '商户单号'}
                    , {field: 'paytime', title: '付款时间', sort: true}
                ]]
            });
        });
    </script>
@endsection()