@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">@lang('friendLink.friendLink_add')</div>
                    <div class="layui-card-body" pad15="2">
                        <form action="{{ route('admin.friendLink.store') }}" method="post" class="layui-form layui-form-pane">
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label">@lang('friendLink.type')</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="type" lay-filter="type" value="1" title="@lang('friendLink.text')" checked="">
                                    <input type="radio" name="type" value="0" lay-filter="type" title="@lang('friendLink.photo')">
                                </div>
                            </div>
                            
                            <div class="layui-form-item" id="Title">
                                <label class="layui-form-label">@lang('friendLink.title')</label>
                                <div class="layui-input-block">
                                    <input lay-verify="type" id="TitleVal" autocomplete="off" class="layui-input" name="title" value="" placeholder="@lang('friendLink.title')" type="text"/>
                                </div>
                            </div>
                            <div id="Thumb" style="display: none;">
                                <div class="layui-form-item" id="Title">
                                    <label class="layui-form-label">@lang('friendLink.title')</label>
                                    <div class="layui-input-block">
                                        <input lay-verify="type" autocomplete="off" class="layui-input" name="thumb_title" value="" placeholder="@lang('friendLink.title')" type="text"/>
                                    </div>
                                </div>
                                
                                <div class="layui-form-item">
                                    
                                    <label class="layui-form-label" for="Thumb">@lang('friendLink.thumb')</label>
                                    <div class="layui-input-inline">
                                        <input lay-verify="type" type="text" id="ThumbUrl" name="thumb" autocomplete="off" class="layui-input"/>
                                    </div>
                                    <button type="button" class="layui-btn layui-btn-primary" style="width: 190px; border-color: #e6e6e6;" id="UploadThumb">
                                        <i class="layui-icon">&#xe60d; </i>@lang('friendLink.thumb')
                                    </button>
                                    <button type="button" class="layui-btn layui-btn-primary" style="width: 190px; border-color: #e6e6e6;" id="ViewThumb">
                                        <i class="layui-icon">&#xe60d; </i>@lang('friendLink.view_thumb')
                                    </button>
                                    <div id="ThumbHtml" style="display: none">
                                        <img src="" id="ThumbHtmlUrl" alt="">
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="ThumbTips" style="display: none;color: #00a2d4"></span>
                                </div>
                            </div>
                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('friendLink.url')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="url" value="" placeholder="@lang('friendLink.url')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('friendLink.seat')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="seat" value="" placeholder="@lang('friendLink.seat')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('friendLink.expire_date')</label>
                                <div class="layui-input-block">
                                    <input type="text" name="expire_date" id="LAY-component-form-group-date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" lay-key="1">
                                </div>
                            
                            </div>
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label">@lang('friendLink.status')</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="status" lay-filter="status" value="1" title="@lang('friendLink.status_on')" checked="">
                                    <input type="radio" name="status" value="0" lay-filter="status" title="@lang('friendLink.status_off')">
                                </div>
                            </div>
                            <div class="layui-form-item" style="text-align: center">
                                {{ csrf_field() }}
                                <button class="layui-btn layui-btn-normal" lay-submit=""><i class="layui-icon">&#xe609;</i> @lang('friendLink.add_submit')</button>
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
        }).use(['index', 'form', 'upload', 'laydate'], function () {
            var form = layui.form
                , $ = layui.jquery
                , upload = layui.upload
                , index = parent.layer.getFrameIndex(window.name) //获取窗口索引
                , laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#LAY-component-form-group-date' //指定元素
            });

            form.on('radio(type)', function (data) {
                if (data.value == 1) {
                    $('#Thumb').hide();
                    $('#ThumbUrl').val('');
                    $('#Title').show();
                } else {
                    $('#Thumb').show();
                    $('#TitleVal').val('');
                    $('#Title').hide();
                }
            });


            $('#ViewThumb').click(function () {
                if ($('#ThumbHtmlUrl').attr('src') != '') {
                    layer.open({
                        type: 1,
                        shade: false,
                        offset: '200px',
                        title: false, //不显示标题
                        content: $('#ThumbHtml'),
                    });
                }
            });

            upload.render({
                elem: '#UploadThumb' //绑定元素
                , accept: 'images'
                , data: {_token: '{{ csrf_token() }}'}
                , url: '{{ route('admin.friendLink.thumb.upload') }}' //上传接口
                , done: function (res) {
                    if (res.status_code === 200) {
                        $('#ThumbUrl').val(res.data.thumb_url);
                        $('#ThumbHtmlUrl').attr('src', res.data.thumb_url);
                        $('#ThumbTips').html('缩略图上传成功').show()
                    }
                }
                , error: function () {
                    layer.msg('上传失败!', {offset: '100px', icon: 4, time: 2000});
                }
            });
            
            
            @if ($errors->has('title'))
            $('input[name="title"]').focus();
            $('input[name="title"]:focus').css({"cssText": "border-color:red !important"});
            $('input[name="title"]').attr('placeholder', '{{ $errors->first('title') }}');
            @elseif($errors->has('thumb'))
            $('input[name="thumb"]').focus();
            $('input[name="thumb"]:focus').css({"cssText": "border-color:red !important"});
            $('input[name="thumb"]').attr('placeholder', '{{ $errors->first('thumb') }}');
            @elseif($errors->has('url'))
            $('input[name="url"]').focus();
            $('input[name="url"]:focus').css({"cssText": "border-color:red !important"});
            $('input[name="url"]').attr('placeholder', '{{ $errors->first('url') }}');
            @endif
            
            
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
