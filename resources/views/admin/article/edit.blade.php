@extends('admin.layouts.iframe_layout')@include('vendor.ueditor.assets')
@section('content')
    <div class="layui-fluid">
        <div class="fly-panel" pad20="" style="padding-top: 5px;">
            <div class="layui-form layui-form-pane">
                <div class="layui-card" style="height: 1500px;">
                    <div class="layui-card-header">
                        <a class="layui-btn layui-btn-normal layui-btn-radius layui-btn-sm"
                           href="{{ route('admin.article.update',['id'=>$article_info['id']]) }}">@lang('article.article_edit')</a>
                        @lang('article.article_add')
                    </div>
                    <div class="layui-card-body" pad15="2">
                        <div class="layui-tab layui-tab-brief" lay-filter="user">
                            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                                <div class="layui-tab-item layui-show">
                                    <form class="layui-form layui-form-pane"
                                          action="{{ route('admin.article.store') }}" method="post">
                                        <div class="layui-form-item">
                                            <label class="layui-form-label"
                                                   for="CategoryId">@lang('article.category_id')</label>
                                            <div class="layui-input-inline">
                                                @inject("CategoryList","\App\Presenters\CategoryListPresenter")
                                                <select name="category_id" id="CategoryId" lay-verify="required">
                                                    <option value="0"
                                                            disabled="disabled">@lang('article.category')</option>
                                                    {!! $CategoryList->getSelectHtml($category_list) !!}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="Thumb">@lang('article.thumb')</label>
                                            <div class="layui-input-inline">
                                                <input type="text" id="ThumbUrl" name="thumb" autocomplete="off"
                                                       class="layui-input"/>
                                            </div>
                                            <button type="button" class="layui-btn layui-btn-primary"
                                                    style="width: 190px; border-color: #e6e6e6;" id="UploadThumb">
                                                <i class="layui-icon">&#xe60d; </i>@lang('article.thumb')
                                            </button>
                                            <button type="button" class="layui-btn layui-btn-primary"
                                                    style="width: 190px; border-color: #e6e6e6;" id="ViewThumb">
                                                <i class="layui-icon">&#xe60d; </i>@lang('article.view_thumb')
                                            </button>
                                            <div id="ThumbHtml" style="display: none">
                                                <img src="" id="ThumbHtmlUrl" alt="">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="ThumbTips"
                                                                                      style="display: none;color: #00a2d4"></span>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label" for="Title">@lang('article.title')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="Title" name="title" required=""
                                                       lay-verify="required" autocomplete="off" class="layui-input">
                                            </div>
                                        </div>

                                        <div class="layui-form-item" pane="">
                                            <label class="layui-form-label">@lang('article.copy_from')</label>
                                            <div class="layui-input-block">
                                                @inject("CopyFromList","\App\Presenters\CopyFromListPresenter")
                                                {!! $CopyFromList->getRadioHtml($copy_from_list) !!}
                                            </div>
                                        </div>
                                        <div class="layui-form-item" pane="">
                                            <label class="layui-form-label">@lang('article.is_http_url')</label>
                                            <div class="layui-input-block">
                                                <input type="radio" name="is_http_url" lay-filter="is_http_url"
                                                       value="0"
                                                       title="@lang('article.is_http_url.no')" checked="">
                                                <input type="radio" name="is_http_url" value="1"
                                                       lay-filter="is_http_url"
                                                       title="@lang('article.is_http_url.yes')">
                                            </div>
                                        </div>

                                        <div class="layui-form-item" id="HttpUrl" style="display: none;">
                                            <label class="layui-form-label"
                                                   for="HttpUrl">@lang('article.http_url')</label>
                                            <div class="layui-input-block">
                                                <input type="text" id="HttpUrl" name="http_url" autocomplete="off"
                                                       class="layui-input"
                                                       placeholder="@lang('article.is_http_url_tips')">
                                            </div>
                                        </div>

                                        <div class="layui-form-item layui-form-text" id="excerpt">
                                            <label class="layui-form-label">@lang('article.excerpt')</label>
                                            <div class="layui-input-block">
                                                <textarea placeholder="@lang('article.excerpt')" name="excerpt"
                                                          class="layui-textarea"></textarea>
                                            </div>
                                        </div>
                                        <div class="layui-form-item layui-form-text" id="content">
                                            <label class="layui-form-label">@lang('article.content')</label>
                                            <div class="layui-input-block">
                                                <script id="container" type="text/plain"></script>
                                            </div>
                                        </div>
                                        <div class="layui-form-item" pane="">
                                            <label class="layui-form-label">@lang('article.is_top')</label>
                                            <div class="layui-input-block">
                                                <input type="radio" name="is_top" value="0"
                                                       title="@lang('article.is_top.no')" checked="">
                                                <input type="radio" name="is_top" value="1"
                                                       title="@lang('article.is_top.single')">
                                                <input type="radio" name="is_top" value="2"
                                                       title="@lang('article.is_top.global')">
                                            </div>
                                        </div>
                                        <div class="layui-form-item" pane="">
                                            <label class="layui-form-label">@lang('article.is_remark')</label>
                                            <div class="layui-input-block">
                                                <input type="radio" name="is_remark" value="0"
                                                       title="@lang('article.is_remark.no')" checked="">
                                                <input type="radio" name="is_remark" value="1"
                                                       title="@lang('article.is_remark.yes')">
                                            </div>
                                        </div>
                                        <div class="layui-form-item" pane="">
                                            <label class="layui-form-label">@lang('article.status')</label>
                                            <div class="layui-input-block">
                                                <input type="radio" name="status" value="0"
                                                       title="@lang('article.status.publish')" checked="">
                                                <input type="radio" name="status" value="1"
                                                       title="@lang('article.status.draft')">
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <button class="layui-btn layui-btn-normal" style="margin-top: 15px;"
                                                lay-submit=""><i
                                                    class="layui-icon">&#xe609;</i> @lang('article.article_add')
                                        </button>
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
                , index = parent.layer.getFrameIndex(window.name); //获取窗口索引

            form.on('radio(is_http_url)', function (data) {
                if (data.value == 1) {
                    $('#excerpt').hide()
                    $('#content').hide()
                    $('#HttpUrl').show()
                } else {
                    $('#excerpt').show()
                    $('#content').show()
                    $('#HttpUrl').hide()
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
            })

            upload.render({
                elem: '#UploadThumb' //绑定元素
                , accept: 'images'
                , data: {_token: '{{ csrf_token() }}'}
                , url: '{{ route('admin.article.thumb.upload') }}' //上传接口
                , done: function (res) {
                    if (res.status_code === 200) {
                        $('#ThumbUrl').val(res.data.image_url);
                        $('#ThumbHtmlUrl').attr('src', res.data.image_url);
                        $('#ThumbTips').html('缩略图上传成功').show()
                    }
                }
                , error: function () {
                    layer.msg('上传失败!', {offset: '100px', icon: 4, time: 2000});
                }
            });

            @if(Session::has('message'))
            layer.msg('{{Session::get("message")}}', {offset: '100px', icon: 1, time: 2000});
            parent.window.location.reload();
            parent.layer.close(index);
            @endif


        });
    </script>
@endsection()
