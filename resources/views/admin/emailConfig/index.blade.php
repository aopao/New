@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">@lang('emailConfig.config')</div>
                    <div class="layui-card-body" pad15="2">
                        <form action="{{ route('admin.emailConfig.update') }}" method="post" class="layui-form layui-form-pane">

                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('emailConfig.MAIL_DRIVER')</label>
                                <div class="layui-input-block">
                                    @if($emailConfigInfo["MAIL_DRIVER"] =='smtp')
                                    <input type="radio" name="MAIL_DRIVER" lay-filter="MAIL_DRIVER" value="smtp" title="@lang('emailConfig.smtp')" checked="">
                                    <input type="radio" name="MAIL_DRIVER" value="sendcloud" lay-filter="MAIL_DRIVER" title="@lang('emailConfig.sendcloud')">
                                    @else
                                    <input type="radio" name="MAIL_DRIVER" lay-filter="MAIL_DRIVER" value="smtp" title="@lang('emailConfig.smtp')" >
                                    <input type="radio" name="MAIL_DRIVER" value="sendcloud" lay-filter="MAIL_DRIVER" title="@lang('emailConfig.sendcloud')" checked="">
                                    @endif
                                </div>
                            </div>

                                <div class="layui-form-item" id="MAIL_HOST">
                                    <label class="layui-form-label">@lang('emailConfig.MAIL_HOST')</label>
                                    <div class="layui-input-block">
                                        <input autocomplete="off" class="layui-input" lay-verify="required" name="MAIL_HOST" value="{{ $emailConfigInfo["MAIL_HOST"] }}" placeholder="@lang('emailConfig.MAIL_HOST')" type="text"/>
                                    </div>
                                </div>
                                <div class="layui-form-item" id="SEND_CLOUD_USER" >
                                    <label class="layui-form-label">@lang('emailConfig.SEND_CLOUD_USER')</label>
                                    <div class="layui-input-block">
                                        <input autocomplete="off" class="layui-input" lay-verify="required" name="SEND_CLOUD_USER" value="{{ $emailConfigInfo["SEND_CLOUD_USER"] }}" placeholder="@lang('emailConfig.SEND_CLOUD_USER')" type="text"/>
                                    </div>
                                </div>

                                <div class="layui-form-item" id="SEND_CLOUD_KEY" >
                                    <label class="layui-form-label">@lang('emailConfig.SEND_CLOUD_KEY')</label>
                                    <div class="layui-input-block">
                                        <input autocomplete="off" class="layui-input" lay-verify="required" name="SEND_CLOUD_KEY" value="{{ $emailConfigInfo["SEND_CLOUD_KEY"] }}" placeholder="@lang('emailConfig.SEND_CLOUD_KEY')" type="text"/>
                                    </div>
                                </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('emailConfig.MAIL_USERNAME')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" lay-verify="required" name="MAIL_USERNAME" value="{{ $emailConfigInfo["MAIL_USERNAME"] }}" placeholder="@lang('emailConfig.MAIL_USERNAME')" type="text"/>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('emailConfig.MAIL_PASSWORD')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" lay-verify="required" name="MAIL_PASSWORD" value="{{ $emailConfigInfo["MAIL_PASSWORD"] }}" placeholder="@lang('emailConfig.MAIL_PASSWORD')" type="text"/>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('emailConfig.MAIL_FROM_ADDRESS')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" lay-verify="required" name="MAIL_FROM_ADDRESS" value="{{ $emailConfigInfo["MAIL_FROM_ADDRESS"] }}" placeholder="@lang('emailConfig.MAIL_FROM_ADDRESS')" type="text"/>
                                </div>
                            </div>


                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('emailConfig.MAIL_FROM_NAME')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" lay-verify="required" name="MAIL_FROM_NAME" value="{{ $emailConfigInfo["MAIL_FROM_NAME"] }}" placeholder="@lang('emailConfig.MAIL_FROM_NAME')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <button class="layui-btn layui-btn-normal" lay-submit=""><i class="layui-icon">&#xe609;</i> @lang('emailConfig.submit')</button>
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
        }).use(['index', 'set', 'form'], function () {

            var form = layui.form
                    , $ = layui.jquery;


            if($("input[name='MAIL_DRIVER']").is(':checked'))
            {
                $('#MAIL_HOST').show();
                $('#SEND_CLOUD_USER').hide();
                $('#SEND_CLOUD_KEY').hide();
            }
            else
            {
                $('#MAIL_HOST').hide();
                $('#SEND_CLOUD_USER').show();
                $('#SEND_CLOUD_KEY').show();

            }


            form.on('radio(MAIL_DRIVER)', function (data) {

                if (data.value == 'smtp') {
                    $('#MAIL_HOST').show();
                    $('#SEND_CLOUD_USER').hide();
                    $('#SEND_CLOUD_KEY').hide();
                } else {
                    $('#MAIL_HOST').hide();
                    $('#SEND_CLOUD_USER').show();
                    $('#SEND_CLOUD_KEY').show();
                }
            });


            @if(Session::has('message'))
            layer.msg('{{Session::get("message")}}', {offset: '300px', icon: 1, time: 1000});
            @endif
        });
    </script>
@endsection()
