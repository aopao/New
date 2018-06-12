@extends('admin.layouts.iframe_layout')@include('vendor.ueditor.assets')
@section('content')
    <div class="layui-fluid">
        <div class="fly-panel" pad20="" style="padding-top: 5px;">
            <div class="layui-form layui-form-pane">
                <div class="layui-card" style="height: 1500px;">
                    <div class="layui-card-header">
                        <a class="layui-btn layui-btn-normal layui-btn-radius layui-btn-sm" href="{{ route('admin.email.index') }}">@lang('email.email_list')</a>
                        @lang('email.email_send')
                    </div>
                    <div class="layui-card-body" pad15="2">
                        <div class="layui-tab layui-tab-brief" lay-filter="user">
                            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                                <div class="layui-tab-item layui-show">
                                    <form class="layui-form layui-form-pane" action="{{ route('admin.email.store') }}" method="post">
                                        <div class="layui-form-item" >
                                            <label class="layui-form-label">@lang('email.uidlist')</label>
                                            <div class="layui-input-block">
                                                @inject("EmailList","\App\Presenters\EmailListPresenter")
                                                {!! $EmailList->getSelectHtml($uid_list) !!}
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="Title">@lang('email.title')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="email" name="title"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item layui-form-text" id="content">
                                            <label class="layui-form-label">@lang('service.content')</label>
                                            <div class="layui-input-block">
                                                <script id="container" type="text/plain"></script>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <button class="layui-btn layui-btn-normal" style="margin-top: 15px;" lay-submit="send_submit"><i class="layui-icon">&#xe609;</i> @lang('email.send_submit')</button>
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
        }).use(['index', 'form'], function () {
            var form = layui.form
                    , $ = layui.jquery
                    , index = parent.layer.getFrameIndex(window.name);//获取窗口索引





            @if ($errors->has('uidlist'))
            $('input[name="uidlist"]').focus();
            $('input[name="uidlist"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="uidlist"]').attr('placeholder','{{ $errors->first('uidlist') }}');
            @elseif($errors->has('fromaddr'))
            $('input[name="fromaddr"]').focus();
            $('input[name="fromaddr"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="fromaddr"]').attr('placeholder','{{ $errors->first('fromaddr') }}');
            @elseif($errors->has('title'))
            $('input[name="title"]').focus();
            $('input[name="title"]:focus').css({ "cssText": "border-color:red !important" });
            $('input[name="title"]').attr('placeholder','{{ $errors->first('title') }}');
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
