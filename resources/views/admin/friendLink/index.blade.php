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
                    <div class="layui-card-header">@lang('friendLink.friendLink_list')</div>
                    <div class="layui-card-body">
                        <div class="test-table-reload-btn" style="margin-bottom: 10px;">
                            <button class="layui-btn layui-btn-normal" data-type="category_add"><i class="layui-icon">&#xe61f;</i>@lang('friendLink.friendLink_add')</button>
                        </div>
                        <table class="layui-hide" id="friendLinkList" lay-filter="friendLinkList"></table>
                        <script type="text/html" id="friendLinkListOperate">
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
    
    <script type="text/html" id="urlTpl">
        <a href="@{{ d.url }}">@{{ d.url }}</a>
    </script>
    
    <script type="text/html" id="ThumbTpl">
        @{{# if (d.thumb){ }}
        <img style="display: inline-block; height: 50px" src="@{{d.thumb}}">
        @{{# }else{ }}
        <img style="display: inline-block; height: 50px" src="http://d.lanrentuku.com/down/png/1702/50food-and-restaurant/waitress.png">
        @{{# } }}
    </script>
    
    <script type="text/html" id="seatTpl">
        @{{#  if(d.seat == 0){ }}
        <span class="layui-badge layui-bg-blue">栏目页</span>
        @{{#  } else { }}
        <span class="layui-badge layui-bg-blue">全站</span>
        @{{#  } }}
    </script>
    
    <script type="text/html" id="typeTpl">
        @{{#  if(d.type == 1){ }}
        <span class="layui-badge layui-bg-blue">文字</span>
        @{{#  } else { }}
        <span class="layui-badge layui-bg-orange">图片</span>
        @{{#  } }}
    </script>
    
    <script type="text/html" id="statusTpl">
        @{{#  if(d.status == 1){ }}
        <span class="layui-badge layui-bg-blue">显示中</span>
        @{{#  } else { }}
        <span class="layui-badge layui-bg-orange">已关闭</span>
        @{{#  } }}
    </script>
    
    <script type="text/html" id="expireDateTpl">
        @{{#  if(d.expire_date == 0){ }}
        <span class="layui-badge layui-bg-blue">长期</span>
        @{{#  } else { }}
        @{{ d.expire_date }}
        @{{#  } }}
    </script>
    
    <script>
        let friendLinkIndexUrl = '{{ route('admin.friendLink.index') }}';
        let friendLinkListUrl = '{{ route('admin.friendLink.friendLinklist') }}';
        layui.config({
            base: '/theme/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'table'], function () {
            var $ = layui.$
                , admin = layui.admin
                , table = layui.table;

            table.render({
                elem: '#friendLinkList'
                , url: friendLinkListUrl
                , cellMinWidth: 80
                , page: true
                , limit: 30
                , cols: [[
                    {field: 'id', title: 'ID', width: 80, align: 'center', fixed: true, sort: true}
                    , {field: 'title', title: '标题', align: 'center'}
                    , {field: 'thumb', title: '缩略图', width: 80, templet: '#ThumbTpl', align: 'center'}
                    , {field: 'url', title: '地址', align: 'center', templet: '#urlTpl'}
                    , {field: 'seat', title: '位置', align: 'center', templet: '#seatTpl'}
                    , {field: 'type', title: '类型', align: 'center', templet: '#typeTpl'}
                    , {field: 'status', title: '状态', align: 'center', templet: '#statusTpl'}
                    , {field: 'expire_date', title: '过期时间', align: 'center', templet: '#expireDateTpl'}
                    , {field: 'created_at', title: ' 创建时间', align: 'center'}
                    , {align: 'center', title: '操作', fixed: 'right', toolbar: '#friendLinkListOperate'}
                ]]

            });

            active = {
                category_add: function () {
                    layer.open({
                        type: 2
                        , content: '{{ route('admin.friendLink.create') }}'
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
            table.on('tool(friendLinkList)', function (obj) {
                let layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
                let data = obj.data;
                if (layEvent === 'edit') { //编辑
                    layer.open({
                        type: 2
                        , content: friendLinkIndexUrl + '/' + data.id + '/edit'
                        , shadeClose: true
                        , area: admin.screen() < 2 ? ['100%', '80%'] : ['60%', '600px']
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
                            url: friendLinkIndexUrl + '/' + data.id,
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