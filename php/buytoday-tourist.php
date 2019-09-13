<?php ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>母婴系统</title>
		<link rel="stylesheet" type="text/css" href="../res/static/css/main.css">
		<link rel="stylesheet" type="text/css" href="../res/layui/css/layui.css">
		<script type="text/javascript" src="../res/layui/layui.js"></script>
		<script src="../res/static/js/util/tourist_Click.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	</head>
	<body>

		<div class="site-nav-bg">
			<div class="site-nav w1200">
				<p class="sn-back-home">
					<i class="layui-icon layui-icon-home"></i>
					<a href="index-tourist.php">
						首页
					</a>
				</p>
				<div class="sn-quick-menu">
					<div class="login">
						<div class="login">
							<a href="login.php">
								未登录
							</a>
						</div>
					</div>
					<div class="sp-cart">
						<a href="#">
							购物车
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
						<form action="ChirdPage/search-tourist.php" class="layui-form" method="post">
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
								<a href="index-tourist.php">
									所有商品
								</a>
								<a href="buytoday-tourist.php" class="active">
									<h2>今日团购</h2>
								</a>
								<a href="information-tourist.php">
									母婴资讯
								</a>
								<a href="about-tourist.php">
									关于我们
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="banner-box">
					<div class="banner"></div>
				</div>
				<div class="product-list-box">
					<div class="product-list w1200">
						<div class="tab-title">
							<a href="javascript:;" class="active tuang" data-content="tuangou">
								今日团购
							</a>
							<a href="javascript:;" data-content="yukao">
								明日预告
							</a>
						</div>
						<div class="list-cont" cont = 'tuangou'>
							<div class="item-box layui-clear">
								<?php 
								require('Handler/conn.php' );
									$sql="select id from  tb_todayprice";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from  tb_todayprice" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
										?><div class="item"><img src="<?php echo $row['picture']; ?>" alt=""><div class="text-box"><p class="title"><?php echo $row['title'];
										?></p><p class="plic"><span class="ciur-pic"><?php echo $row['todayprice'];
										?></span><span class="Ori-pic"><?php echo $row['price'];
										?></span><span class="buy">加入购物车</span></p></div></div><style>.buy {
											width: 85px;
											height: 26px;
											line-height: 26px;
											font-size: 16px;
											background: #cfb2f6;
											display: block;
											text-align: center;
											color: #fff;
											position: absolute;
											right: -5px;
											top: 0;
											cursor: pointer;
										}
										</style><?php
									}
								}
								
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script>layui.config({
	base: '../res/static/js/util/'
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
        
        layer.confirm('请先登录', {
			title:'亲爱哒顾客',
			btn: ['去登录', '取消'],//按钮
			skin:'layui-layer-rim',
			icon:6,
			anim:5
		}, function() {
			location.href='login.php'
		});

	})

});</script>

	</body>
</html>