layui.use(['jquery', 'layer'], function() {
	var $ = layui.$,
		layer = layui.layer;

	var dvs = $('div.item')
	for(var i = 0; i < dvs.length; i++) {
		dvs[i].index = i
		dvs[i].onclick = function() {
			var title = $('p.title').eq(this.index).text()
			var price = $('span.pri').eq(this.index).text()
			var personals = $('span.nub').eq(this.index).text()
			var pictureUrl = document.getElementsByTagName("img")[this.index + 1].src
			var br = "<br>"

			layer.open({
				type: 1,
				anim: 5,
				area: ['285px', '530px'],
				shade: 0.4,
				btn: ['关闭', '购买', '加入购物车'],

				btn2: function() {
					layer.prompt({
						title: '请输入支付密码',
						formType: 1
					}, function(pass, index) {
						layer.close(index);

						$.ajax({
							type: "post",
							url: "Handler/buy.php",
							data: {
								'title': title,
								'aprice': price,
								'picture': pictureUrl
							},
							success: function() {
								layer.msg('购买成功', {
									icon: 6,
									time: 1000
								})
							}
						});

					})
				},
				btn3: function() {
					$.ajax({
						type: "post",
						url: "Handler/todayprice-buying-index.php",
						data: {
							'title': title,
							'aprice': price,
							'picture': pictureUrl
						},
						success: function(x) {
							x = JSON.parse(x)
							if(x[0] == '2') {

								layer.msg("在购物车中等亲哦", {
									time: 1000
								},function(){
									history.go(0)
								})
							} else if(x[0] == '1') {
								layer.msg("你已经添加过了", {
									time: 1000,
									anim:6
								})
							}
						}
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