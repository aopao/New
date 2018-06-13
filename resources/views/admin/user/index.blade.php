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
                    <div class="layui-card-header">@lang('user.user_list')</div>
                    <div class="layui-card-body">
                        <div class="test-table-reload-btn" style="margin-bottom: 10px;">
                            <button class="layui-btn layui-btn-normal" data-type="category_add">@lang('user.user_add')</button>
                        </div>
                        <table class="layui-hide" id="categorList" lay-filter="categorList"></table>
                        <script type="text/html" id="statusTpl">
                            @{{#  if(d.status == 1){ }}
                            <span class="layui-badge layui-bg-green">正常</span>
                            @{{#  } else { }}
                            <span class="layui-badge layui-bg-orange">禁封</span>
                            @{{#  } }}
                        </script>
                        <script type="text/html" id="ThumbTpl">
                            @{{# if (d.avatar){ }}
                            <img style="display: inline-block; height: 50px" src="@{{d.avatar}}">
                            @{{# }else{ }}
                            <img style="display: inline-block; height: 50px"
                                 src="/errorimg/error.jpg">
                            @{{# } }}
                        </script>
                        <script type="text/html" id="categorListOperate">
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
        let CategoryIndexUrl = '{{ route('admin.user.index') }}';
        let CategoryListUrl = '{{ route('admin.user.userlist') }}';
        layui.config({
            base: '/theme/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'table'], function () {
            var $ = layui.$
                , admin = layui.admin
                , table = layui.table
            ;




            table.render({
                elem: '#categorList'
                , url: CategoryListUrl
                , cellMinWidth: 80
                , page: true
                , limit: 30
                , cols: [[
                    {field: 'id', title: 'ID', width: 50, fixed: true}
                    {{--, {field: 'title', title: '链接内容'}--}}
                    , {field: 'avatar', title: '头像',width: 100,templet:'#ThumbTpl'}
                    , {field: 'account', title: '账号',width: 100}
                    , {field: 'nickname', title: '昵称',width: 100}
                    , {field: 'mobile', title: '手机号',width: 150}
                    , {field: 'email', title: '邮箱'}
                    , {field: 'created_at', title: ' 创建时间', sort: true}
                    , {field: 'status', title: '状态',width: 90,templet: '#statusTpl'}
                    , {align: 'center',title:'操作', fixed: 'right',width: 120, toolbar: '#categorListOperate'}

                ]]

            });


            active = {
                category_add: function () {
                    layer.open({
                        type: 2
                        , content: '{{ route('admin.user.create') }}'
                        , shadeClose: true
                        , area: admin.screen() < 2 ? ['100%', '80%'] : ['80%', '500px']
                        , maxmin: true
                    });
                }
            };

            $('.test-table-reload-btn .layui-btn').on('click', function () {
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });

            //监听工具条
            //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            table.on('tool(categorList)', function (obj) {
                let layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
                let data = obj.data;
                if (layEvent === 'edit') { //编辑
                    layer.open({
                        type: 2
                        , content: CategoryIndexUrl + '/' + data.id + '/edit'
                        , shadeClose: true
                        , area: admin.screen() < 2 ? ['100%', '80%'] : ['50%', '500px']
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
                            url: CategoryIndexUrl + '/' + data.id,
                            type: "DELETE",
                            data: {"id": data.id},
                            dataType: "json",
                            success: function (data)	 {
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