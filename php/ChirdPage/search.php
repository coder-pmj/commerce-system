<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>母婴系统-搜索</title>
		<link rel="stylesheet" type="text/css" href="../../res/static/css/main.css">
		<link rel="stylesheet" type="text/css" href="../../res/layui/css/layui.css">
		<script type="text/javascript" src="../../res/layui/layui.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	</head>
	<body>

		<div class="site-nav-bg">
			<div class="site-nav w1200">
				<p class="sn-back-home">
					<i class="layui-icon layui-icon-home"></i>
					<a href="../index.php">
						首页
					</a>
				</p>
				<div class="sn-quick-menu">
					<div class="login"><?php

					if (!($_SESSION['user'])) {
						header('Location:search-tourist.php');

					} else {

						$user = $_SESSION['user'];

						echo '<div class="login"><a href="">在线：' . $user . '</a></div>';
					}
					?></div>

					<div class="sp-cart">
						<a href="../shopcart.php">
							购物车
						</a><span>
							<?php
							require ('../Handler/conn.php');
							$sql = "select * from tb_buying";
							$result = mysqli_query($db, $sql);
							$row = mysqli_fetch_assoc($result);

							if ($row) {
								$acount = mysqli_num_rows($result);
								echo $acount;
							} else {
								echo "";
							}
        		?>
							
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="header">
			<div class="headerLayout w1200">
				<div class="headerCon">
					<h1 class="mallLogo">
					<a href="#" title="母婴商城">
						<img src="../../res/static/img/logo.png">
					</a></h1>
					<div class="mallSearch">
						<form action="" class="layui-form" method="post">
							<input type="text" name="title" required  lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入需要的商品">
							<button class="layui-btn" type="submit" name="submit">
							<i class="layui-icon layui-icon-search"></i>
							</button>
<!--							<input  type="submit" name="submit" value="搜索">
-->						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="content content-nav-base buytoday-content">
			<div id="list-cont">
				<div class="main-nav">
					<div class="inner-cont0">
						<div class="inner-cont1 w1200">
							<div class="inner-cont2">
								<a href="../index.php">
									所有商品
								</a>
								<a href="../buytoday.php">
									今日团购
								</a>
								<a href="../information.php">
									母婴资讯
								</a>
								<a href="../about.php">
									关于我们
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="banner-box">
				</div>
				<div class="product-list-box">
					<div class="product-list w1200">
						<div class="tab-title">
													</div>
						<div class="list-cont" cont = 'tuangou'>
							<div class="item-box layui-clear">
								<?php 
								if(isset($_POST['submit'])){
								$txt=$_POST['title'];

							require ('../Handler/conn.php');
//mysqli_free_result($result);
$result=mysqli_query($db, "select * from tb_product where price like'%$txt%' or title like '%$txt%'");

$RecordCount=mysqli_num_rows($result);

for ($i=0;$i < $RecordCount;$i++) {
$row=mysqli_fetch_assoc($result);

	//$arr = array();
	if($row){

?><div class="item">
	<img src="../<?php echo $row['picture']; ?>" alt="">
		<div class="text-box">
			<p class="title"><?php echo $row['title']; ?></p>
			<p class="plic">
				<span class="ciur-pic"><?php echo $row['price']; ?></span>
				<span class="Ori-pic"><?php echo $row['priced']; ?></span>
				<span class="buy">加入购物车</span>
				</p>
				</div>
				</div>
				
				<?php
	}
}
}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script>layui.config({
	base: '../../res/static/js/util/'
}).use(['laypage', 'jquery', 'layer'], function() {
	var laypage = layui.laypage,
		$ = layui.$,
		layer = layui.layer;

	laypage.render({
		elem: 'demo0',
		count: 100 //数据总数
	});

	$('body').on('click', '*[data-content]', function() {
		$(this).addClass('active').siblings().removeClass('active')
		var dataConte = $(this).attr('data-content');
		$('*[cont]').each(function(i, item) {
			var itemCont = $(item).attr('cont');
			console.log(item)
			if(dataConte === itemCont) {
				$(item).removeClass('layui-hide');
			} else {
				$(item).addClass('layui-hide');
			}
		})
	})

		$(".buy").click(function() {

			var index = $(this).parents(".item").index(".item")

			var title = $("p.title").eq(index).text()
			var price = $("span.ciur-pic").eq(index).text()
			//var price = $("span.Ori-pic").eq(index).text()
			var pictureUrl = document.getElementsByTagName("img")[index + 1].src

			$.ajax({
				type: "post",
				url: "../Handler/todayprice-buying.php",

				data: {
					'title': title,
					'todayprice': price,
					//'price': price,
					'pictureUrl': pictureUrl
				},
				success: function(x) {
 //var x=JSON.parse(d)
            if(x=='2'){
				layer.msg("在购物车中等亲哦", {
					time: 1000
				}, function() {
					history.go(0)
				})
				}else if(x=='1'){
					layer.msg("你已经添加过它了",{anim:6}, {
					time: 1000
				})
				}
			}			});

		})

});</script>

	</body>
</html>