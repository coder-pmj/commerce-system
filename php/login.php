<?php

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>母婴系统-登录</title>
		<link rel="stylesheet" type="text/css" href="../res/static/css/main.css">
		<link rel="stylesheet" type="text/css" href="../res/layui/css/layui.css">
			<link rel="stylesheet" type="text/css" href="../res/static/css/mycss.css"/>
		<script type="text/javascript" src="../res/layui/layui.js"></script>
		<script src="../js/user.js"></script>
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
							<a href="login.php" class="active">
								登录中
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

		<div class="content content-nav-base  login-content">
			<div class="main-nav">
				<div class="inner-cont0">
					<div class="inner-cont1 w1200">
						<div class="inner-cont2">
							<a href="index-tourist.php">
								所有商品
							</a>
							<a href="buytoday-tourist.php">
								今日团购
							</a>
							<a href="information-tourist.php" php">
								母婴资讯
							</a>
							<a href="about-tourist.php">
								关于我们
							</a>
						</div>
					</div>
				</div>
				
				
			</div>
			
			
			
			<div class="login-bg">
				<div class="login-cont w1200">
					
					
					<div class="form-box">
						<form class="layui-form" action="">
							<legend>
								用户登录
							</legend>
							<div class="layui-form-item">
								<div class="layui-inline iphone">
									<div class="layui-input-inline">
										<label class="layui-icon layui-icon-cellphone iphone-icon"></label>
										<input type="tel" name="phone" id="phone" lay-verify="required|phone" placeholder="请输入手机号" autocomplete="off" class="layui-input">
									</div>
								</div>
							</div>
							<div class="layui-form-item">
								<div class="layui-inline iphone">
									<div class="layui-input-inline">
										<label class="layui-icon layui-icon-password iphone-icon"></label>
										<input id="pwd" type="password" name="pwd" lay-verify="required|pass" placeholder="请输入密码" autocomplete="off" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item login-btn">
									<div class="layui-input-block">
										<button class="layui-btn" id="login" lay-submit lay-filter="login">
										登录
										</button>

									</div>
									<span style="position: absolute;top: 350px;">
									<a href="reg.php">
										没有账号？去注册
									</a></span>
								</div>
							</div>
						</form>
					</div>
					
			
				
					
					<div class="text-count">
							你是本站的第<span class="layui-badge" style="font-size: 20px;">
								<?php 
								@session_start();
								$f=fopen("counter.dat", "r+");
								$str=fgets($f);
								@$visit=intval($str);
								if(@!$_SESSION['count']){
									$visit++;
									$_SESSION['count']=true;
								}
								rewind($f);
								fwrite($f, $visit);
								fclose($f);
								
								echo $visit+1;
							
							?>
							</span>位访客
							
						</div>
					
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="ng-promise-box">
				<div class="ng-promise w1200">
					<p class="text">
						<a class="icon1" href="javascript:;">
							7天无理由退换货
						</a>
						<a class="icon2" href="javascript:;">
							满99元全场免邮
						</a>
						<a class="icon3" style="margin-right: 0" href="javascript:;">
							100%品质保证
						</a>
					</p>
				</div>
			</div>
			<div class="mod_help w1200">
				<p>
					<a href="javascript:;">
						关于我们
					</a>
					<span>|</span>
					<a href="javascript:;">
						帮助中心
					</a>
					<span>|</span>
					<a href="javascript:;">
						售后服务
					</a>
					<span>|</span>
					<a href="javascript:;">
						母婴资讯
					</a>
					<span>|</span>
					<a href="javascript:;">
						关于货源
					</a>
				</p>
				<p class="coty">
					彭明久 &copy; 2019
				</p>
			</div>
		</div>
		
		<script>layui.use(['jquery', 'form', 'layer'], function() {
	var $ = layui.$,
		form = layui.form,
		layer = layui.layer;
	$("div.sp-cart").click(function() {
		layer.msg("尽快登录哦", {
			time: 1200,
			icon: 6,
			anim: 4
		})
	})

	form.on('submit(login)', function(data) {
		$.ajax({
			type: 'post',
			url: 'Handler/loginAction.php',
			data: data.field,
			//dataType: 'text',
			success: function(dat) {
				//dat=JSON.parse(dat);
				//console.log(dat[0]);
				if(dat == '1') {
					layer.msg('登入成功', {
						icon: 1,
						time: 1000
					}, function() {

						location.href = "index.php"; //后台主页

					});
				}else if(dat=='0'){
					layer.msg('手机号或密码有误')
				}
			}
		});
		return false;
	})

})</script>
	</body>
</html>