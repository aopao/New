@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">@lang('copyFrom.copy_from_list')</div>
                    <div class="layui-card-body">
                        <div class="test-table-reload-btn" style="margin-bottom: 10px;">
                            <button class="layui-btn layui-btn-normal" data-type="category_add"><i class="layui-icon">&#xe61f;</i>@lang('copyFrom.copy_from_add')</button>
                        </div>
                        <table class="layui-hide" id="copyFromList" lay-filter="copyFromList"></table>
                        <script type="text/html" id="copyFromListOperate">
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
    <script>
        let CopyFromIndexUrl = '{{ route('admin.copy_from.index') }}';
        let CopyFromListUrl = '{{ route('admin.copy_from.list') }}';
        layui.config({
            base: '/theme/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'table'], function () {
            var $ = layui.$
                , admin = layui.admin
                , table = layui.table;

            table.render({
                elem: '#copyFromList'
                , height: 'full-20'
                , url: CopyFromListUrl
                , cellMinWidth: 80
                , cols: [[
                    {field: 'id', title: 'ID', width: 100, fixed: true}
                    , {field: 'name', title: '来源名称'}
                    , {field: 'desc', title: '来源简介'}
                    , {field: 'created_at', title: ' 创建时间', sort: true}
                    , {align: 'center', title: '操作', fixed: 'right', toolbar: '#copyFromListOperate'}
                ]]
            });

            active = {
                category_add: function () {
                    layer.open({
                        type: 2
                        , content: '{{ route('admin.copy_from.create') }}'
                        , shadeClose: true
                        , area: admin.screen() < 2 ? ['100%', '80%'] : ['50%', '300px']
                        , maxmin: true
                    });
                },
            };

            $('.test-table-reload-btn .layui-btn').on('click', function () {
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });

            //监听工具条
            //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            table.on('tool(copyFromList)', function (obj) {
                let layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
                let data = obj.data;
                if (layEvent === 'edit') { //编辑
                    layer.open({
                        type: 2
                        , content: CopyFromIndexUrl + '/' + data.id + '/edit'
                        , shadeClose: true
                        , area: admin.screen() < 2 ? ['100%', '80%'] : ['50%', '300px']
                        , maxmin: true
                    });
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
                            url: CopyFromIndexUrl + '/' + data.id,
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
                                } else if (data.status_code === 201) {
                                    layer.msg("该栏目有子栏目,请删除子栏目!", {icon: 5});
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
