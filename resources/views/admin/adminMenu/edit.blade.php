@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">@lang('adminMenu.adminMenu_add')</div>
                    <div class="layui-card-body" pad15="2">
                        <form action="{{ route('admin.menu.update',['id'=>$admin_menu_info['id']]) }}" method="post" class="layui-form layui-form-pane">
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('adminMenu.parent_id')</label>
                                <div class="layui-input-block">
                                    @inject("AdminMenuList","\App\Presenters\AdminMenuListPresenter")
                                    <select name="parent_id" lay-verify="required">
                                        <option value="0">@lang('adminMenu.top')</option>
                                        {!! $AdminMenuList->getSelectHtml($admin_menu_list,$admin_menu_info['id']) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('adminMenu.display_name')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" lay-verify="required" name="display_name" value="{{ $admin_menu_info['display_name'] }}" placeholder="@lang('adminMenu.display_name')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('adminMenu.url')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="url" value="{{ $admin_menu_info['url'] }}" placeholder="@lang('adminMenu.url')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('adminMenu.icon')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="icon" value="{{ $admin_menu_info['icon'] }}" placeholder="@lang('adminMenu.icon')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('adminMenu.desc')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="desc" value="{{ $admin_menu_info['desc'] }}" placeholder="@lang('adminMenu.desc')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item" style="text-align: center">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <input type="hidden" name="id" value="{{ $admin_menu_info['id'] }}">
                                <button class="layui-btn layui-btn-normal" lay-submit=""><i class="layui-icon">&#xe609;</i> @lang('adminMenu.edit_submit')</button>
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
