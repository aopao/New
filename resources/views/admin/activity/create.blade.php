@extends('admin.layouts.iframe_layout')@include('vendor.ueditor.assets')
@section('content')
    <div class="layui-fluid">
        <div class="fly-panel" pad20="" style="padding-top: 5px;">
            <div class="layui-form layui-form-pane">
                <div class="layui-card" style="height: 1500px;">
                    <div class="layui-card-header">
                        <a class="layui-btn layui-btn-normal layui-btn-radius layui-btn-sm" href="{{ route('admin.activity.index') }}">@lang('activity.activity_list')</a>
                        @lang('activity.activity_add')
                    </div>
                    <div class="layui-card-body" pad15="2">
                        <div class="layui-tab layui-tab-brief" lay-filter="user">
                            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                                <div class="layui-tab-item layui-show">
                                    <form class="layui-form layui-form-pane" action="{{ route('admin.activity.store') }}" method="post">

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="Title">@lang('activity.title')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="Title" name="title"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="subtitle">@lang('activity.subtitle')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="SubTitle" name="subtitle"   autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="desc">@lang('activity.desc')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="desc" name="desc"   autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="Thumb">@lang('activity.thumb')</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="ThumbUrl" name="thumb" autocomplete="off" class="layui-input"/>
                                            </div>
                                            <button type="button" class="layui-btn layui-btn-primary" style="width: 190px; border-color: #e6e6e6;" id="UploadThumb">
                                                <i class="layui-icon">&#xe60d; </i>@lang('activity.upload_thumb')
                                            </button>
                                            <button type="button" class="layui-btn layui-btn-primary" style="width: 190px; border-color: #e6e6e6;" id="ViewThumb">
                                                <i class="layui-icon">&#xe60d; </i>@lang('activity.view_thumb')
                                            </button>
                                            <div id="ThumbHtml" style="display: none">
                                                <img src="" id="ThumbHtmlUrl" alt="">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="ThumbTips" style="display: none;color: #00a2d4"></span>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label">@lang('activity.range')</label>
                                            <div class="layui-input-inline">
                                                <input type="text" class="layui-input" name="range" id="range" placeholder=" - ">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="method">@lang('activity.method')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="method" name="method"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="obj">@lang('activity.obj')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="obj" name="obj"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item" pane="">
                                            <label class="layui-form-label">@lang('activity.status')</label>
                                            <div class="layui-input-block">
                                                <input type="radio" name="status" value="1" title="@lang('activity.status_on')" checked="">
                                                <input type="radio" name="status" value="0" title="@lang('activity.status_off')">
                                            </div>
                                        </div>

                                        <div class="layui-form-item layui-form-text" id="content">
                                            <label class="layui-form-label">@lang('activity.content')</label>
                                            <div class="layui-input-block">
                                                <script id="container" type="text/plain"></script>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <button class="layui-btn layui-btn-normal" style="margin-top: 15px;" lay-submit="add_submit"><i class="layui-icon">&#xe609;</i> @lang('activity.add_submit')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('js')
    <script>

        var ue = UE.getEditor('container', {
            toolbars: [
                ['bold',
                    'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist',
                    'insertorderedlist', 'justifyleft', 'justifycenter', 'justifyright', 'link', 'insertimage', 'emotion', //表情
                    'spechars', 'source', //源代码
                    'fullscreen'
                ]
            ],
            elementPathEnabled: false,
            enableContextMenu: false,
            autoClearEmptyNode: true,
            wordCount: false,
            imagePopup: false,
            autoHeightEnabled: true,
            zIndex: 2,
            initialFrameHeight: 400,
            autotypeset: {indent: true, imageBlockLine: 'center'}
        });

        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });

        layui.config({
            base: '/theme/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'form', 'upload', 'laydate'], function () {
            var form = layui.form
                    , $ = layui.jquery
                    , upload = layui.upload
                    , laydate = layui.laydate
                    , index = parent.layer.getFrameIndex(window.name);//获取窗口索引


            //日期范围
            laydate.render({
                elem: '#range'
                ,range: true
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
                , url: '{{ route('admin.activity.thumb.upload') }}' //上传接口
                , done: function (res) {
                    if (res.status_code === 200) {
                        $('#ThumbUrl').val(res.data.image_url);
                        $('#ThumbHtmlUrl').attr('src', res.data.image_url);
                        $('#ThumbTips').html('图片上传成功').show()
                    }
                }
                , error: function () {
                    layer.msg('上传失败!', {offset: '100px', icon: 4, time: 2000});
                }
            });


            @if ($errors->has('title'))
            $('input[name="title"]').focus();
            $('input[name="title"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="title"]').attr('placeholder','{{ $errors->first('title') }}');
            @elseif($errors->has('subtitle'))
            $('input[name="subtitle"]').focus();
            $('input[name="subtitle"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="subtitle"]').attr('placeholder','{{ $errors->first('subtitle') }}');
            @elseif($errors->has('desc'))
            $('input[name="desc"]').focus();
            $('input[name="desc"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="desc"]').attr('placeholder','{{ $errors->first('desc') }}');
            @elseif($errors->has('editorValue'))
            //默认显示内容必须在实例化编辑器之后才能显示
            ue.ready(function() {
                //默认显示内容
                ue.setContent("<p style='color:silver'>{!! $errors->first('editorValue') !!}</p>");
                //文本框获取焦点时清空默认显示的内容
                ue.addListener("focus", function(){
                    ue.setContent('');
                });
                //文本框是去焦点时,若内容为空则显示默认显示的内容
                ue.addListener("blur", function(){
                    if(!ue.getContent()){
                        ue.setContent("<p style='color:silver'>{!! $errors->first('editorValue') !!}</p>");
                    }
                });
            });
            @elseif($errors->has('range'))
            $('input[name="range"]').focus();
            $('input[name="range"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="range"]').attr('placeholder','{{ $errors->first('range') }}');
            @elseif($errors->has('method'))
            $('input[name="method"]').focus();
            $('input[name="method"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="method"]').attr('placeholder','{{ $errors->first('method') }}');
            @elseif($errors->has('obj'))
            $('input[name="obj"]').focus();
            $('input[name="obj"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="obj"]').attr('placeholder','{{ $errors->first('obj') }}');
            @elseif($errors->has('thumb'))
            $('input[name="thumb"]').focus();
            $('input[name="thumb"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="thumb"]').attr('placeholder','{{ $errors->first('thumb') }}');
            @elseif($errors->has('status'))
            $('input[name="status"]').focus();
            $('input[name="status"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="status"]').attr('placeholder','{{ $errors->first('status') }}');

            @endif


            @if(Session::has('message'))
            layer.msg('{{Session::get("message")}}', {offset: '100px', icon: 1, time: 2000});
            setTimeout(function () {
                parent.window.location.reload();
                parent.layer.close(index);
            }, 500);
            @endif

        });
    </script>
@endsection()
