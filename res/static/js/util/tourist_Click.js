layui.use(['jquery', 'layer'], function() {

	var layer = layui.layer,
		$ = layui.$;

	$("div.sp-cart").click(function() {
		layer.confirm('购物车功能需登录', {
			title:'亲爱哒顾客',
			btn: ['去登录', '取消'],//按钮
			skin:'layui-layer-lan',
			icon:5,
			anim:6
		}, function() {
			location.href='login.php'
		});
	})
})