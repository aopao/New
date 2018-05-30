layui.config({
	base: '/theme/' //静态资源所在路径
}).extend({
	index: 'lib/index' //主入口模块
}).use(['index', 'user'],
	function () {
		var $ = layui.$,
			setter = layui.setter,
			admin = layui.admin,
			form = layui.form,
			router = layui.router(),
			search = router.search;

		document.onkeydown = function (e) { // 回车提交表单
			var theEvent = window.event || e;
			var code = theEvent.keyCode || theEvent.which;
			if (code == 13) {
				$("#submit").click();
			}
		};
		form.render();

		form.on('submit(LAY-user-login-submit)',
			function (obj) {
				//请求登入接口
				admin.req({
					url: LoginUrl,
					method: "post",
					data: obj.field,
					done: function (res) {
						if (res.status_code == 200) {
							layer.msg('登入成功', {offset: '15px', icon: 1, time: 1000}, function () {
								location.href = res.data.redirect; //后台主页
							});
						} else {
							layer.msg('登录失败!', {icon: 2, offset: '15px', time: 1000});
						}
					}
				});

			});

	});