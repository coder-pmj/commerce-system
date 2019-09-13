layui.use(['layer', 'jquery'], function() {

	layer = layui.layer, $ = layui.$;

	$(document).ready(function() {

		var prices = 0
		var uls = $('#list-cont ul').length; //每一行
		for(var i = 0; i < uls; i++) {
			prices += parseFloat($("span.sum").eq(i).text())
		}
		$("span.pieces-total").text(prices.toFixed(2))
		//加数量
		$("div#add").click(function() {
			var index = $(this).parents(".OrderList").index(".OrderList")

			var unitprice = parseFloat($("span.th-su").eq(index).text())
			var count = parseInt($("input.Quantity-input").eq(index).val()) + 1
			var SubTotal = parseFloat(unitprice * count)

			$("input.Quantity-input").eq(index).val(count)
			$("span.sum").eq(index).text(SubTotal.toFixed(2))

			var prices = 0
			var uls = $('#list-cont ul').length; //每一行
			for(var i = 0; i < uls; i++) {
				prices += parseFloat($("span.sum").eq(i).text())
			}
			$("span.pieces-total").text(prices.toFixed(2))

		})
		//减数量
		$("div#less").click(function() {
			var index = $(this).parents(".OrderList").index(".OrderList")

			var unitprice = parseFloat($("span.th-su").eq(index).text())
			var count = parseInt($("input.Quantity-input").eq(index).val()) - 1
			var SubTotal = parseFloat(unitprice * count)

			/*var SubTotal1 = parseFloat(parseFloat($("span.th-su").eq(index-1).text())*parseInt($("input.Quantity-input").eq(index-1).val()))

			var allprice=SubTotal+SubTotal1*/
			//$("span.pieces-total").text(SubTotal.toFixed(2))
			if(count == 0) {
				layer.msg("人家也是有底线的", {
					icon: 5,
					time: 900
				})
			} else {
				$("input.Quantity-input").eq(index).val(count)
				$("span.sum").eq(index).text(SubTotal.toFixed(2))

			}

			var prices = 0
			var uls = $('#list-cont ul').length; //每一行
			for(var i = 0; i < uls; i++) {
				prices -= parseFloat($("span.sum").eq(i).text())
				var lessprice = prices * (-1)
			}
			$("span.pieces-total").text(lessprice.toFixed(2))

		})

		//结算按钮
		$("button#success").click(function() {
            if(prices=='0'){
            	layer.msg("您还没有购买商品",{
            		icon:6,
            		anim:1,
            		time:1000
            	})
            }else{
            	var arr1=[]
            	var arr2=[]
            	var arr3=[]
            	var arr4=[]
            	var arr5=[]
            	for(var s=0;s<uls;s++){
            		var sh1=$("div.title").eq(s).text()
            		var sh2=$("span.th-su").eq(s).text()
            		var sh3=$("input.Quantity-input").eq(s).val()
            		var sh4=$("span.sum").eq(s).text()
            		var sh5=document.getElementsByTagName("img")[s + 1].src
            		
            		arr1.push(sh1)
            		arr2.push(sh2)
            		arr3.push(sh3)
            		arr4.push(sh4)
            		arr5.push(sh5)
            	}
            	/*console.log(arr1)
            	console.log(arr2)
            	console.log(arr3)
            	console.log(arr4)*/
             var datas1=JSON.stringify(arr1)
             var datas2=JSON.stringify(arr2)
             var datas3=JSON.stringify(arr3)
             var datas4=JSON.stringify(arr4)
             var datas5=JSON.stringify(arr5)
			layer.prompt({
				title: '输入支付密码',
				formType: 1
			}, function(pass, index) {
				layer.close(index);
				
				$.ajax({
					type: "post",
					url: "Handler/del.php",
					data:{datas1:datas1,
					datas2:datas2,
					datas3:datas3,
					datas4:datas4,
					datas5:datas5},
					success:function(){
						layer.msg("购买成功",{
							icon:6,
							time:900
						},function(){
							history.go(0)
						})
						
						
					}
					
				});
			});
			}

		})

		$("span.dele-btn").click(function() {

			//var index = $(this).index()
			var index = $(this).parents(".OrderList").index(".OrderList")

			//var id=$("input#check").eq(index).val()
			//var price=$("span.th-su").eq(index).text()

			layer.confirm('您确定删除吗？', {
				btn: ['确定', '再想想'] //按钮
			}, function() {
				//layer.msg('已删除', {icon: 1,time:800});
				$.ajax({
					type: "post",
					url: "Handler/car-dele.php",
					data: 'id=' + $("input#check").eq(index).val(),
					success: function() {

						history.go(0)

					}
				});
			});
		})

	})

})