@extends('admin.layouts.iframe_layout')
@section('content')
    <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">@lang('friendLink.friendLink_add')</div>
                <div class="layui-card-body" pad15="2">
                    {{--<form action="{{ route('admin.friendLink.store') }}" method="post" class="layui-form layui-form-pane">--}}
                    <form class="layui-form layui-form-pane">
                        <div class="layui-form-item">
                            <label class="layui-form-label">@lang('friendLink.type')</label>
                            <div class="layui-input-block">
                                <input lay-verify="type" type="checkbox" name="type" lay-filter="type" lay-skin="_switch" lay-text="内容|图片" checked  >
                            </div>
                        </div>
                        <div class="layui-form-item" id="title">
                            <label class="layui-form-label">@lang('friendLink.title')</label>
                            <div class="layui-input-block">
                                <input  autocomplete="off" class="layui-input"  name="title" value="" placeholder="@lang('friendLink.title')" type="text"/>
                            </div>
                        </div>
                         <div class="layui-form-item" id="pic" style="display: none;">
                            <label class="layui-form-label">@lang('friendLink.pic')</label>
                             <div class="layui-input-inline">
                                 <input name="pic"  id="LAY_avatarSrc" placeholder="图片地址" value="" class="layui-input">
                             </div>
                             <div class="layui-input-inline layui-btn-container" style="width: auto;">
                                 <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUpload">
                                     <i class="layui-icon">&#xe67c;</i>上传图片
                                 </button>
                                 <input type="button"  class="layui-btn layui-btn-primary"  layadmin-event="avartatPreview" value="查看图片"  />
                             </div>

                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">@lang('friendLink.url')</label>
                            <div class="layui-input-block">
                                <input lay-verify="url" autocomplete="off" class="layui-input" name="url" value="" placeholder="@lang('friendLink.url')" type="text"/>
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
                                <input type="text" name="expire_date" id="LAY-component-form-group-date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" lay-key="1">
                            </div>

                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">@lang('friendLink.status')</label>
                            <div class="layui-input-block">
                                <input type="checkbox" name="status" lay-skin="_switch" lay-text="开启|关闭" checked>
                            </div>
                        </div>
                        <div class="layui-form-item" style="text-align: center">
                            {{ csrf_field() }}
                            {{--<input id="submit" class="layui-btn" type="submit" value="@lang('friendLink.submit')" />--}}
                            <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
	}).use(['index', 'form','laydate','set'], function () {
		var form = layui.form
            , $ = layui.jquery
			, index = parent.layer.getFrameIndex(window.name)//获取窗口索引
            ,laydate = layui.laydate;
        //执行一个laydate实例
        laydate.render({
            elem: '#LAY-component-form-group-date' //指定元素
        });

        {{--@if(Session::has('message'))--}}
        {{--layer.msg('{{Session::get("message")}}', {offset: '100px', icon: 1, time: 1000});--}}
        {{--setTimeout(function(){--}}
            {{--parent.window.location.reload();--}}
            {{--parent.layer.close(index);--}}
        {{--},500);--}}
        {{--@endif--}}

        form.on('switch(type)', function(data){
//            alert(data.value);
//            console.log(data.elem); //得到checkbox原始DOM对象
//            console.log(data.elem.checked); //开关是否开启，true或者false
//            console.log(data.value); //开关value值，也可以通过data.elem.value得到
//            console.log(data.othis); //得到美化后的DOM对象
              if(data.elem.checked)
              {
                  $('#pic').css('display','none');
                  $('#title').css('display','block');
                  $('#LAY_avatarSrc').val('');
              }
              else
              {
                  $('#pic').css('display','block');
                  $('#title').css('display','none');
                  $("input[name='title']").val('');

              }




        });

        form.verify({
            type:function(){
//                console.log($("input[name='type']").is(':checked'));
                if($("input[name='type']").is(':checked'))
                {
                    if($("input[name='title']").val() == '')
                    {
                        layer.msg('请填写链接内容', {icon: 5,anim:6},{time:1000});
                        $("input[name='title']").focus()
                    }
                }
                else
                {
                    if($("input[name='pic']").val() == '')
                    {
                        layer.msg('请选择链接图片', {icon: 5,anim:6},{time:1000});
                        $("input[name='pic']").focus()
                    }
                }
            }


        });

        form.on('submit(*)', function(data){

            if($("input[name='type']").is(':checked'))
            {
                var type = 1;
            }
            else
            {
                var type = 0;
            }


            if($("input[name='status']").is(':checked'))
            {
                var status = 1;
            }
            else
            {
                var status = 0;
            }






            var expire_date = $("input[name='expire_date']").val();
            var pic = $("input[name='pic']").val();
            var seat = $("input[name='seat']").val();
            var title = $("input[name='title']").val();
            var url = $("input[name='url']").val();
//            console.log(expire_date);

            $.ajax({
                url:"{{ route('admin.friendLink.store')}}",    //请求的url地址
                dataType:"json",   //返回格式为json
                async:false,//请求是否异步，默认为异步，这也是ajax重要特性
                data:{_token:"{{csrf_token()}}",title:title,pic:pic,expire_date:expire_date,seat:seat,status:status,type:type,url:url},    //参数值
                type:"POST",   //请求方式
                beforeSend:function(){
                    //请求前的处理
                },
                success:function(req){
                    //请求成功时处理
                },
                complete:function(res){
                    //请求完成的处理
//                    console.log(res);
                    if(res.responseJSON.code ==1)
                    {
                        layer.msg(res.responseJSON.msg,{icon:res.responseJSON.icon},{time:1000});
                        setTimeout(function(){
                        parent.window.location.reload();
                        parent.layer.close(index);
                        },500);
                    }
                    else
                    {
                        layer.msg(res.responseJSON.msg,{icon:res.responseJSON.icon},{time:1000});
                    }
                },
                error:function(){
                    //请求出错处理
                }
            });



//            console.log(data.elem) //被执行事件的元素DOM对象，一般为button对象
//            console.log(data.form) //被执行提交的form对象，一般在存在form标签时才会返回
//            console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });




    });


    </script>
@endsection()
