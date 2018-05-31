@extends('admin.layouts.iframe_layout')@include('vendor.ueditor.assets')
@section('content')
    <div class="layui-fluid">
        <div class="fly-panel" pad20="" style="padding-top: 5px;">
            <div class="layui-form layui-form-pane">
                <div class="layui-card" style="height: 1000px;">
                    <div class="layui-card-header">@lang('category.category_add')</div>
                    <div class="layui-card-body" pad15="2">
                        <div class="layui-tab layui-tab-brief" lay-filter="user">
                            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                                <div class="layui-tab-item layui-show">
                                    <form action="" method="post">
                                        <div class="layui-row layui-col-space15 layui-form-item">
                                            <div class="layui-col-md3">
                                                <label class="layui-form-label">所在专栏</label>
                                                <div class="layui-input-block">
                                                    <select lay-verify="required" name="class" lay-filter="column">
                                                        <option></option>
                                                        <option value="0">提问</option>
                                                        <option value="99">分享</option>
                                                        <option value="100">讨论</option>
                                                        <option value="101">建议</option>
                                                        <option value="168">公告</option>
                                                        <option value="169">动态</option>
                                                    </select>
                                                    <div class="layui-unselect layui-form-select">
                                                        <div class="layui-select-title"><input type="text"
                                                                                               placeholder="请选择"
                                                                                               value="" readonly=""
                                                                                               class="layui-input layui-unselect"><i
                                                                    class="layui-edge"></i></div>
                                                        <dl class="layui-anim layui-anim-upbit" style="">
                                                            <dd lay-value="" class="layui-select-tips">请选择</dd>
                                                            <dd lay-value="0" class="">提问</dd>
                                                            <dd lay-value="99" class="">分享</dd>
                                                            <dd lay-value="100" class="layui-this">讨论</dd>
                                                            <dd lay-value="101" class="">建议</dd>
                                                            <dd
                                                                    lay-value="168" class="">公告
                                                            </dd>
                                                            <dd lay-value="169" class="">动态</dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="layui-col-md9">
                                                <label for="L_title" class="layui-form-label">标题</label>
                                                <div class="layui-input-block">
                                                    <input type="text" id="L_title" name="title" required=""
                                                           lay-verify="required" autocomplete="off" class="layui-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-row layui-col-space15 layui-form-item layui-hide"
                                             id="LAY_quiz">
                                            <div class="layui-col-md3">
                                                <label class="layui-form-label">所属产品</label>
                                                <div class="layui-input-block">
                                                    <select name="project">
                                                        <option></option>
                                                        <option value="layui">layui</option>
                                                        <option value="独立版layer">独立版layer</option>
                                                        <option value="独立版layDate">独立版layDate</option>
                                                        <option value="LayIM">LayIM</option>
                                                        <option value="Fly社区模板">Fly社区模板</option>
                                                    </select>
                                                    <div class="layui-unselect layui-form-select">
                                                        <div class="layui-select-title"><input type="text"
                                                                                               placeholder="请选择"
                                                                                               value="" readonly=""
                                                                                               class="layui-input layui-unselect"><i
                                                                    class="layui-edge"></i></div>
                                                        <dl class="layui-anim layui-anim-upbit">
                                                            <dd lay-value="" class="layui-select-tips">请选择</dd>
                                                            <dd lay-value="layui" class="">layui</dd>
                                                            <dd lay-value="独立版layer" class="">独立版layer</dd>
                                                            <dd lay-value="独立版layDate" class="">独立版layDate</dd>
                                                            <dd lay-value="LayIM"
                                                                class="">LayIM
                                                            </dd>
                                                            <dd
                                                                    lay-value="Fly社区模板" class="">Fly社区模板
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="layui-col-md3">
                                                <label class="layui-form-label" for="L_version">版本号</label>
                                                <div class="layui-input-block">
                                                    <input type="text" id="L_version" value="" name="version"
                                                           autocomplete="off" class="layui-input">
                                                </div>
                                            </div>
                                            <div class="layui-col-md6">
                                                <label class="layui-form-label" for="L_browser">浏览器</label>
                                                <div class="layui-input-block">
                                                    <input type="text" id="L_browser" value="" name="browser"
                                                           placeholder="浏览器名称及版本，如：IE 11" autocomplete="off"
                                                           class="layui-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-form-item" style="height: 200px">
                                            <!-- 编辑器容器 -->
                                            <script id="container" name="content" type="text/plain"></script>
                                            <button class="layui-btn" style="margin-top: 15px;" lay-filter="*"
                                                    lay-submit="">立即发布
                                            </button>
                                        </div>
                                        <div class="layui-form-item">
                                        </div>
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
                , index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            @if(Session::has('message'))
            parent.window.location.reload();
            parent.layer.close(index);
            @endif
        });
    </script>
@endsection()
