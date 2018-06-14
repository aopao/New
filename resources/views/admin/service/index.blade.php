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
                    <div class="layui-card-header">@lang('service.service_list')</div>
                    <div class="layui-card-body">
                        <div class="test-table-reload-btn" style="margin-bottom: 10px;">
                            <a class="layui-btn layui-btn-normal" href="{{ route('admin.service.create') }}"><i class="layui-icon">&#xe61f;</i>@lang('service.service_add')</a>
                        </div>
                        <div class="pagenormal">
                            <table class="layui-hide" id="serviceList" lay-filter="serviceList"></table>
                        </div>
                        <script type="text/html" id="serviceListOperate">
                            <button class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">编辑</button>
                            <button class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</button>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('js')
    <script type="text/html" id="ThumbTpl">
        @{{# if (d.thumb){ }}
        <img style="display: inline-block; height: 50px" src="@{{d.thumb}}">
        @{{# }else{ }}
        <img style="display: inline-block; height: 50px"
             src="/errorimg/error.jpg">
        @{{# } }}
    </script>
    <script type="text/html" id="StatusTpl">
        @{{# if (d.status==0){ }}
        <span class="layui-badge layui-bg-orange">未发布</span>
        @{{# }else if (d.status==1){ }}
        <span class="layui-badge layui-bg-blue">已发布</span>
        @{{# } }}
    </script>
    <script>
        let ServiceIndexUrl = '{{ route('admin.service.index') }}';
        let ServiceListUrl = '{{ route('admin.service.servicelist') }}';
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
                    , {field: 'title', title: '标题', width: 350}
                    , {field: 'subtitle', title: '副标题', width: 350}
                    , {field: 'current_price', title: '现价', width: 150}
                    , {field: 'original_price', title: '原价', width: 150}
                    , {field: 'teacher', title: '师资', width: 350}
                    , {field: 'method', title: '方式', width: 350}
                    , {field: 'obj', title: '对象', width: 350}
                    , {field: 'thumb', title: '图片', width: 80, templet: '#ThumbTpl', align: 'center'}
                    , {field: 'status', title: '状态', align: 'center', templet: '#StatusTpl'}
                    , {field: 'created_at', title: ' 创建时间', sort: true, align: 'center', width: 200}
                    , {align: 'center', title: '操作', width: 120, fixed: 'right', toolbar: '#serviceListOperate'}
                ]]
            });

            //监听工具条
            //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            table.on('tool(serviceList)', function (obj) {
                let layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
                let data = obj.data;
                if (layEvent === 'edit') { //编辑
                    let EditUrl = ServiceIndexUrl + '/' + data.id + '/edit';
                    window.location.href = EditUrl;

                } else if (layEvent === 'del') { //删除
                    layer.confirm('真的删除么?', function (index) {
                        layer.close(index);
                        //向服务端发送删除指令
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: ServiceIndexUrl + '/' + data.id,
                            type: "DELETE",
                            data: {"id": data.id},
                            dataType: "json",
                            success: function (data) {
                                if (data.status_code === 200) {
                                    //删除这一行
                                    obj.del();
                                    //关闭弹框
                                    layer.close(index);
                                    layer.msg("删除成功", {icon: 6});
                                } else {
                                    layer.msg("删除失败", {icon: 5});
                                }
                            }
                        });
                    });
                }
            });
        });
    </script>
@endsection()
