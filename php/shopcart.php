<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>购物车</title>
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
						<a href="shopcart.php" style="color: red;font-size: 20px;">
							购物车
						</a>
					</div>
					<div class="history">
						<a href="history.php">
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
			<div class="banner-bg w1200">
				<h3>夏季清仓</h3>
				<p>
					宝宝被子、宝宝衣服3折起
				</p>
			</div>

			<div class="cart w1200">
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
							数量
						</div>
					</div>
					<div class="th th-sum">
						<div class="th-inner">
							小计
						</div>
					</div>
					<div class="th th-op">
						<div class="th-inner">
							操作
						</div>
					</div>
				</div>

				<?php require('Handler/conn.php');
$sql="select id from  tb_todayprice";
$result=mysqli_query($db, $sql);
$RecordCount=mysqli_num_rows($result);
//mysqli_free_result($result);
$result=mysqli_query($db, "select * from tb_buying" );
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
<span class="th-su"><?php echo substr($row['price'], 3); ?></span>
</li>
<li class="th th-amount">
<div class="box-btn layui-clear">
<div class="less layui-btn" id="less">-</div>
<input class="Quantity-input" type="" name="" value="1">
<div class="add layui-btn" id="add">+</div>
</div>
</li>
<li class="th th-sum">
<span class="sum"><?php echo substr($row['price'], 3); ?></span>
</li>
<li class="th th-op">
<span class="dele-btn">删除</span>
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
						<button class="layui-btn" id="success">
						结算
						</button>
					</div>
					<div class="th total">
						<p>
							应付：<span class="pieces-total">0</span>
						</p>
					</div>
				</div>
			</div>
		</div>
		<script src="../res/static/js/util/Click2.js"></script>
		<script type="text/javascript">layui.config({
	base: '../res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
}).use(['jquery', 'element', 'layer'], function() {
	var $ = layui.$,
		element = layui.element;
	//car.init()

});</script>
	</body>
</html>