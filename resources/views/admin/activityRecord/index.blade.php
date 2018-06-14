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
                    <div class="layui-card-header">@lang('activityRecord.activityRecord_list')</div>
                    <div class="layui-card-body">
                        <table class="layui-hide" id="activityRecordList" lay-filter="activityRecordList"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('js')
    <script type="text/html" id="UserTpl">
        @{{#  if(d.user.nickanem){ }}
        @{{ d.user.nickname }}
        @{{#  } else { }}
        @{{ d.user.account }}
        @{{#  } }}
    </script>
    
    <script type="text/html" id="MobileTpl">
        @{{ d.user.mobile }}
    </script>
    
    <script type="text/html" id="ActivityTpl">
        <a href="">@{{ d.activity.title }}</a>
    </script>
    
    <script>
        let activityRecordListUrl = '{{ route('admin.activityRecord.activityRecordlist') }}';
        layui.config({
            base: '/theme/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'table'], function () {
            var table = layui.table;
            table.render({
                elem: '#activityRecordList'
                , url: activityRecordListUrl
                , cellMinWidth: 80
                , page: true
                , limit: 30
                , cols: [[
                    {field: 'id', title: 'ID', width: 50, fixed: true}
                    , {field: 'user', title: '报名人', align: 'center', templet: '#UserTpl'}
                    , {field: 'mobile', title: '手机号', align: 'center', templet: '#MobileTpl'}
                    , {field: 'activity', title: '活动标题', align: 'center', templet: '#ActivityTpl'}
                    , {field: 'created_at', title: '报名时间', sort: true}
                ]]
            });
        });
    </script>
@endsection()