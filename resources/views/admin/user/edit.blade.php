@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">@lang('user.user_edit')</div>
                    <div class="layui-card-body" pad15="2">
                        <form action="{{ route('admin.user.update',['id'=>$user_info['id']]) }}" method="post" class="layui-form layui-form-pane">
                            <div class="layui-form-item" id="pic">
                                <label class="layui-form-label" for="Thumb">@lang('user.avatar')</label>
                                <div class="layui-input-inline">
                                    <input lay-verify="type" type="text" id="PicUrl" name="avatar" value="{{$user_info['avatar']}}" autocomplete="off" class="layui-input"/>
                                </div>
                                <button type="button" class="layui-btn layui-btn-primary" style="width: 190px; border-color: #e6e6e6;" id="UploadPic">
                                    <i class="layui-icon">&#xe60d; </i>@lang('user.avatar')
                                </button>
                                <button type="button" class="layui-btn layui-btn-primary" style="width: 190px; border-color: #e6e6e6;" id="ViewPic">
                                    <i class="layui-icon">&#xe60d; </i>@lang('user.view_avatar')
                                </button>
                                <div id="PicHtml" style="display: none">
                                    <img src="{{$user_info['avatar']}}" id="PicHtmlUrl" alt="">
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="PicTips" style="display: none;color: #00a2d4"></span>
                            </div>
                            <div class="layui-form-item" id="title">
                                <label class="layui-form-label">@lang('user.account')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="account" value="{{$user_info['account']}}" readonly="readonly" placeholder="@lang('user.account')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('user.nickname')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="nickname" value="{{$user_info['nickname']}}" placeholder="@lang('user.nickname')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('user.mobile')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="mobile" value="{{$user_info['mobile']}}" readonly="readonly" placeholder="@lang('user.mobile')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('user.email')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="email" value="{{$user_info['email']}}" placeholder="@lang('user.email')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">@lang('user.qq')</label>
                                <div class="layui-input-block">
                                    <input autocomplete="off" class="layui-input" name="qq" value="{{$user_info['qq']}}" placeholder="@lang('user.qq')" type="text"/>
                                </div>
                            </div>
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label">@lang('user.status')</label>
                                <div class="layui-input-block">
                                    @if($user_info['status'] ==1)
                                        <input type="radio" name="status" lay-filter="status" value="1" title="@lang('user.status_on')" checked="">
                                        <input type="radio" name="status" value="0" lay-filter="status" title="@lang('user.status_off')">
                                    @else
                                        <input type="radio" name="status" lay-filter="status" value="1" title="@lang('user.status_on')">
                                        <input type="radio" name="status" value="0" lay-filter="status" title="@lang('user.status_off')" checked="">
                                    @endif
                                </div>
                            </div>
                            <div class="layui-form-item" style="text-align: center">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <input type="hidden" name="id" value="{{ $user_info['id'] }}">
                                <button class="layui-btn layui-btn-normal" lay-submit=""><i class="layui-icon">&#xe609;</i> @lang('user.edit_submit')</button>
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
                , url: '{{ route('admin.user.avatar.upload') }}' //上传接口
                , done: function (res) {
                    if (res.status_code === 200) {
                        $('#PicUrl').val(res.data.image_url);
                        $('#PicHtmlUrl').attr('src', res.data.image_url);
                        $('#PicTips').html('头像上传成功').show()
                    }
                }
                , error: function () {
                    layer.msg('上传失败!', {offset: '100px', icon: 4, time: 2000});
                }
            });
            
            
            @if ($errors->has('account'))
            $('input[name="account"]').focus();
            $('input[name="account"]:focus').css({"cssText": "border-color:red !important"});
            $('input[name="account"]').attr('placeholder', '{{ $errors->first('account') }}');
            @elseif($errors->has('mobile'))
            $('input[name="mobile"]').focus();
            $('input[name="mobile"]:focus').css({"cssText": "border-color:red !important"});
            $('input[name="mobile"]').attr('placeholder', '{{ $errors->first('mobile') }}');
            @elseif($errors->has('email'))
            $('input[name="email"]').focus();
            $('input[name="email"]:focus').css({"cssText": "border-color:red !important"});
            $('input[name="email"]').attr('placeholder', '{{ $errors->first('email') }}');
            @elseif($errors->has('qq'))
            $('input[name="qq"]').focus();
            $('input[name="qq"]:focus').css({"cssText": "border-color:red !important"});
            $('input[name="qq"]').attr('placeholder', '{{ $errors->first('qq') }}');
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
