<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>历史订单</title>
		<link rel="stylesheet" type="text/css" href="../res/static/css/main.css">
		<link rel="stylesheet" type="text/css" href="../res/layui/css/layui.css">
		<script type="text/javascript" src="../res/layui/layui.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	</head>
	<body>

		<div class="site-nav-bg">
			<div class="site-nav w1200">
				<p class="sn-back-home">
					<i class="layui-icon layui-icon-home"></i>
					<a href="index.php">
						首页
					</a>
				</p>
				<div class="sn-quick-menu">
					<div class="login">

						<div class="login">
							<a href="" style="color: #009E94;">
								在线
							</a>
						</div>
					</div>
					<div class="sp-cart" >
						<a href="shopcart.php">
							购物车
						</a>
					</div>
					<div class="history">
						<a href="history.php" style="color: red;font-size: 20px;">
							<span>历史订单</span>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="header">
			<div class="headerLayout w1200">
				<div class="headerCon">
					<h1 class="mallLogo">
					<a href="src.php" title="母婴商城">
						<img src="../res/static/img/logo.png">
					</a></h1>
					<div class="mallSearch">
						<form action="ChirdPage/search.php" class="layui-form" method="post">
							<input type="text" name="title" required  lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入需要的商品">
							<button class="layui-btn" type="submit" name="submit">
							<i class="layui-icon layui-icon-search"></i>
							</button>
							<!--							<input  type="submit" name="submit" value="搜索">
							-->
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="content content-nav-base shopcart-content">
			<div class="main-nav">
				<div class="inner-cont0">
					<div class="inner-cont1 w1200">
						<div class="inner-cont2">
							<a href="index.php">
								所有商品
							</a>
							<a href="buytoday.php">
								今日团购
							</a>
							<a href="information.php">
								母婴资讯
							</a>
							<a href="about.php">
								关于我们
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="cart w1100">
				<div class="cart-table-th">
					<div class="th th-chk">
						<div class="select-all">
							<div class="cart-checkbox">

							</div>
							<label></label>
						</div>
					</div>
					<div class="th th-item">
						<div class="th-inner">
							商品
						</div>
					</div>
					<div class="th th-price">
						<div class="th-inner">
							单价
						</div>
					</div>
					<div class="th th-amount">
						<div class="th-inner">
							购买数量
						</div>
					</div>
					<div class="th th-sum">
						<div class="th-inner">
							总额
						</div>
					</div>
					<div class="th th-op">
						<div class="th-inner">
							操作
						</div>
					</div>
					<div class="th th-op">
						<div class="th-inner">
							购买
						</div>
					</div>
				</div>

				<?php require('Handler/conn.php');
$sql="select id from  tb_history";
$result=mysqli_query($db, $sql);
$RecordCount=mysqli_num_rows($result);
//mysqli_free_result($result);
$result=mysqli_query($db, "select * from tb_history" );
for ($i=0;$i < $RecordCount;$i++) {
$row=mysqli_fetch_assoc($result);
if($row) {
?>
<div class="OrderList">
<div class="order-content" id="list-cont">
<ul class="item-content layui-clear">
<li class="th th-chk">
<div class="select-all">
<div class="cart-checkbox">
<input class="CheckBoxShop check" id="check" type="hidden" num="all" name="select-all" value="<?php echo $row['id']; ?>">
</div>
</div>
</li>
<li class="th th-item">
<div class="item-cont">
<a href="javascript:;"><img src="<?php echo $row['picture']; ?>" alt=""></a>
<div class="text">
<div class="title"><?php echo $row['title']; ?></div>
<!--<p><span>粉色</span>  <span>130</span>cm</p>-->
</div>
</div>
</li>
<li class="th th-price">
<span class="th-su"><?php echo substr($row['aprice'], 0); ?></span>
</li>
<li class="th th-amount">
<div class="box-btn layui-clear">

<input class="Quantity-inputs" type="" name="" value="<?php echo $row['acount']?>" disabled="disabled">

</div>
</li>
<li class="th th-sum">
<span class="sum"><?php echo substr($row['allprice'], 0); ?></span>
</li>
<li class="th th-op">
<span class="dele-btn">删除</span>
</li>
<li class="th th-op">
<span class="buy-btn">再次购买</span>
</li>

</ul>

</div>
</div>

<?php
}
}
				?>

				<div class="FloatBarHolder layui-clear">
					<div class="th th-chk">
						<div class="select-all">
							<div class="cart-checkbox">

							</div>
							<label></label>
						</div>
					</div>
					<div class="th batch-deletion">

					</div>
					<div class="th Settlement">
						<button class="layui-btn" id="del">
						删除所有
						</button>
					</div>
					<div class="th total">
						<p>
							总金额:<span class="pieces-total">0</span>
						</p>
					</div>
				</div>

			</div>
		</div>
		<script type="text/javascript">layui.use(['layer', 'jquery'], function() {

	layer = layui.layer, $ = layui.$;

	$(document).ready(function() {

		var prices = 0
		var uls = $('#list-cont ul').length; //每一行
		for(var i = 0; i < uls; i++) {
			prices += parseFloat($("span.sum").eq(i).text())
		}
		$("span.pieces-total").text(prices.toFixed(2))

		$('span.buy-btn').click(function() {
			var index = $(this).parents(".OrderList").index(".OrderList")
			var title = $('div.title').eq(index).text()
			
			var price = '￥'+$('span.th-su').eq(index).text()
			var pictureUrl = document.getElementsByTagName("img")[index + 1].src
			$.ajax({
				type: "post",
				url: "Handler/todayprice-buying.php",

				data: {
					'title': title,
					'todayprice': price,
					//'price': price,
					'pictureUrl': pictureUrl
				},
				success: function(x) {
					//var x=JSON.parse(d)
					if(x == '2') {
						layer.msg("已加入购物车", {
							time: 1000,
							anim:2
						})
					} else if(x == '1') {
						layer.msg("您刚刚添加过了呢", {
							anim: 6
						}, {
							time: 1000
						})
					}
				}

			});
		})

		//单个删除按钮
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
					url: "Handler/history-del.php",
					data: 'id=' + $("input#check").eq(index).val(),
					success: function() {

						history.go(0)

					}
				});
			});
		})

		//删除所有按钮
		$("button#del").click(function() {
			if(prices == '0') {
				layer.msg("您还没有购买商品", {
					icon: 6,
					anim: 1,
					time: 1000
				})
			} else {
				var arr1 = []

				for(var s = 0; s < uls; s++) {
					var sh1 = $("div.title").eq(s).text()

					arr1.push(sh1)

				}
				/*console.log(arr1)
				console.log(arr2)
				console.log(arr3)
				console.log(arr4)*/
				var datas1 = JSON.stringify(arr1)

				layer.prompt({
					title: '输入支付密码验证身份',
					formType: 1
				}, function(pass, index) {
					layer.close(index);

					$.ajax({
						type: "post",
						url: "Handler/history-alldel.php",
						data: {
							datas1: datas1
						},
						success: function() {
							layer.msg("删除成功", {
								icon: 6,
								time: 900
							}, function() {
								history.go(0)
							})

						}

					});
				});
			}

		})

	})

})</script>
	</body>
</html>