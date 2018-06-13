@extends('admin.layouts.iframe_layout')@include('vendor.ueditor.assets')
@section('content')
    <div class="layui-fluid">
        <div class="fly-panel" pad20="" style="padding-top: 5px;">
            <div class="layui-form layui-form-pane">
                <div class="layui-card" style="height: 1500px;">
                    <div class="layui-card-header">
                        <a class="layui-btn layui-btn-normal layui-btn-radius layui-btn-sm" href="{{ route('admin.service.index') }}">@lang('service.service_list')</a>
                        @lang('service.service_add')
                    </div>
                    <div class="layui-card-body" pad15="2">
                        <div class="layui-tab layui-tab-brief" lay-filter="user">
                            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                                <div class="layui-tab-item layui-show">
                                    <form class="layui-form layui-form-pane" action="{{ route('admin.service.store') }}" method="post">

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="Title">@lang('service.title')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="Title" name="title"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="subtitle">@lang('service.subtitle')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="SubTitle" name="subtitle"   autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="desc">@lang('service.desc')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="desc" name="desc"   autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="Pic">@lang('service.pic')</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="PicUrl" name="pic" autocomplete="off" class="layui-input"/>
                                            </div>
                                            <button type="button" class="layui-btn layui-btn-primary" style="width: 190px; border-color: #e6e6e6;" id="UploadPic">
                                                <i class="layui-icon">&#xe60d; </i>@lang('service.upload_pic')
                                            </button>
                                            <button type="button" class="layui-btn layui-btn-primary" style="width: 190px; border-color: #e6e6e6;" id="ViewPic">
                                                <i class="layui-icon">&#xe60d; </i>@lang('service.view_pic')
                                            </button>
                                            <div id="PicHtml" style="display: none">
                                                <img src="" id="PicHtmlUrl" alt="">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="PicTips" style="display: none;color: #00a2d4"></span>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="current_price">@lang('service.current_price')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="current_price" name="current_price"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="original_price">@lang('service.original_price')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="original_price" name="original_price"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="teacher">@lang('service.teacher')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="teacher" name="teacher"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="method">@lang('service.method')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="method" name="method"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="obj">@lang('service.obj')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="obj" name="obj"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item" pane="">
                                            <label class="layui-form-label">@lang('service.status')</label>
                                            <div class="layui-input-block">
                                                <input type="radio" name="status" value="1" title="@lang('service.status_on')" checked="">
                                                <input type="radio" name="status" value="0" title="@lang('service.status_off')">
                                            </div>
                                        </div>

                                        <div class="layui-form-item layui-form-text" id="content">
                                            <label class="layui-form-label">@lang('service.content')</label>
                                            <div class="layui-input-block">
                                                <script id="container" type="text/plain"></script>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <button class="layui-btn layui-btn-normal" style="margin-top: 15px;" lay-submit="add_submit"><i class="layui-icon">&#xe609;</i> @lang('service.add_submit')</button>
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
        }).use(['index', 'form', 'upload'], function () {
            var form = layui.form
                    , $ = layui.jquery
                    , upload = layui.upload
                    , index = parent.layer.getFrameIndex(window.name);//获取窗口索引

            $('#ViewPic').click(function () {
                if ($('#PicHtmlUrl').attr('src') != '') {
                    layer.open({
                        type: 1,
                        shade: false,
                        offset: '200px',
                        title: false, //不显示标题
                        content: $('#PicHtml'),
                    });
                }
            });

            upload.render({
                elem: '#UploadPic' //绑定元素
                , accept: 'images'
                , data: {_token: '{{ csrf_token() }}'}
                , url: '{{ route('admin.service.pic.upload') }}' //上传接口
                , done: function (res) {
                    if (res.status_code === 200) {
                        $('#PicUrl').val(res.data.image_url);
                        $('#PicHtmlUrl').attr('src', res.data.image_url);
                        $('#PicTips').html('图片上传成功').show()
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
            @elseif($errors->has('current_price'))
            $('input[name="current_price"]').focus();
            $('input[name="current_price"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="current_price"]').attr('placeholder','{{ $errors->first('current_price') }}');
            @elseif($errors->has('original_price'))
            $('input[name="original_price"]').focus();
            $('input[name="original_price"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="original_price"]').attr('placeholder','{{ $errors->first('original_price') }}');
            @elseif($errors->has('teacher'))
            $('input[name="teacher"]').focus();
            $('input[name="teacher"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="teacher"]').attr('placeholder','{{ $errors->first('teacher') }}');
            @elseif($errors->has('method'))
            $('input[name="method"]').focus();
            $('input[name="method"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="method"]').attr('placeholder','{{ $errors->first('method') }}');
            @elseif($errors->has('obj'))
            $('input[name="obj"]').focus();
            $('input[name="obj"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="obj"]').attr('placeholder','{{ $errors->first('obj') }}');
            @elseif($errors->has('pic'))
            $('input[name="pic"]').focus();
            $('input[name="pic"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="pic"]').attr('placeholder','{{ $errors->first('pic') }}');
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
