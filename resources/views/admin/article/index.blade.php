@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">@lang('article.article_list')</div>
                    <div class="layui-card-body">
                        <div class="test-table-reload-btn" style="margin-bottom: 10px;">
                            <a class="layui-btn layui-btn-normal" href="{{ route('admin.article.create') }}"><i
                                        class="layui-icon">&#xe61f;</i>@lang('article.article_add')</a>
                        </div>
                        <table class="layui-hide" id="articleList" lay-filter="articleList"></table>
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
        let ArticleIndexUrl = '{{ route('admin.article.index') }}';
        let ArticleListUrl = '{{ route('admin.article.list') }}';
        layui.config({
            base: '/theme/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'table'], function () {
            var $ = layui.$
                , admin = layui.admin
                , table = layui.table;

            table.render({
                elem: '#articleList'
                , url: ArticleListUrl
                , cellMinWidth: 80
                , page: true
                , cols: [[
                    {field: 'id', title: 'ID', width: 100, fixed: true}
                    , {field: 'title', title: '分类名称'}
                    , {field: 'category_id', title: '分类简介'}
                    , {field: 'created_at', title: ' 创建时间', sort: true}
                    , {align: 'center', title: '操作', fixed: 'right', toolbar: '#categorListOperate'}
                ]]
            });

            $('.test-table-reload-btn .layui-btn').on('click', function () {
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });

            //监听工具条
            //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            table.on('tool(articleList)', function (obj) {
                let layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
                let data = obj.data;
                if (layEvent === 'edit') { //编辑
                    layer.open({
                        type: 2
                        , content: ArticleIndexUrl + '/' + data.id + '/edit'
                        , shadeClose: true
                        , area: admin.screen() < 2 ? ['100%', '80%'] : ['50%', '355px']
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
                            url: ArticleIndexUrl + '/' + data.id,
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
