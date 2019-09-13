layui.use(['jquery', 'layer'], function() {
	var $ = layui.$,
		layer = layui.layer;

	var dvs = $('div.item')
	for(var i = 0; i < dvs.length; i++) {
		dvs[i].index = i
		
		dvs[i].onclick = function() {
			layer.open({
				type: 1,
				anim: 5,
				area: ['285px', '530px'],
				shade: 0.4,
				btn: ['关闭', '购买', '加入购物车'],

				btn2: function() {
					layer.confirm('登录后即可购买哟', {
						title: '亲爱哒顾客',
						btn: ['去登录', '取消'], //按钮
						skin: 'layui-layer-lan',
						icon: 6,
						anim: 5
					}, function() {
						location.href = 'login.php'
					});
				},
				btn3: function() {
					layer.confirm('请先登录呢', {
						title: '亲爱哒顾客',
						btn: ['去登录', '取消'], //按钮
						icon: 6,
						anim: 5
					}, function() {
						location.href = 'login.php'
					});

				},
				title: '详细信息',
				content: dvs.eq(this.index)
			})

		}
		
		
		
	}
	
	
	
	//对侧边导航栏的简单css变化
	var btns = $("dl>dd")

	for(var k = 0; k < btns.length; k++) {
		btns[k].index = k
		btns.eq(0).addClass('info')

		btns[k].onmousedown = function() {

			btns.eq(this.index).addClass('info')
			btns.not(this).removeClass('info')
		}

	}

});