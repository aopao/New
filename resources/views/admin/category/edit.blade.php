@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">@lang('category.category_edit')</div>
                <div class="layui-card-body" pad15="2">
                    <form action="{{ route('admin.category.update',['id'=>$category_info['id']]) }}" method="post" class="layui-form layui-form-pane">
                        <div class="layui-form-item">
                            <label class="layui-form-label">@lang('category.parent_id')</label>
                            <div class="layui-input-block">
                                @inject("CategoryList","\App\Presenters\CategoryListPresenter")
                                <select name="parent_id" lay-verify="required">
                                    <option value="0">@lang('category.top')</option>
                                    {!! $CategoryList->getSelectHtml($category_list,$category_info['id']) !!}
                                 </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">@lang('category.name')</label>
                            <div class="layui-input-block">
                                <input autocomplete="off" class="layui-input" lay-verify="required" name="name" value="{{ $category_info['name'] }}" placeholder="@lang('category.name')" type="text"/>
                            </div>
                        </div>
                         <div class="layui-form-item">
                            <label class="layui-form-label">@lang('category.desc')</label>
                            <div class="layui-input-block">
                                <input autocomplete="off" class="layui-input" name="desc" value="{{ $category_info['desc'] }}" placeholder="@lang('category.desc')" type="text"/>
                            </div>
                        </div>
                        <div class="layui-form-item" style="text-align: center">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <input type="hidden" name="id" value="{{ $category_info['id'] }}">
                            <button class="layui-btn" lay-submit="">@lang('category.edit')</button>
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
		    setTimeout(function(){
				parent.window.location.reload();
				parent.layer.close(index);
            },500);
        @endif
	});
</script>
@endsection()
