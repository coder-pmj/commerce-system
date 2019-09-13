<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>母婴系统-首页</title>
		<link rel="stylesheet" type="text/css" href="../res/static/css/main.css">
		<link rel="stylesheet" type="text/css" href="../res/layui/css/layui.css">
		
		<script type="text/javascript" src="../res/layui/layui.js"></script>
		<script src="../res/static/js/util/tab.js"></script>
		<script src="../res/static/js/util/index-click.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
			<style>img#img1 {
	width: 280px;
	height: 282px;
}</style>
				
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
					
					
					
					<div class="login"><?php

					if (!($_SESSION['user'])) {
						header('Location:index-tourist.php');

					} else {

						$user = $_SESSION['user'];

						echo '<div class="login"><a href="#">在线：' . $user . '</a></div>';
					}
					?></div>

					<div class="sp-cart">
						<a href="shopcart.php">
							购物车
						</a><span>
							<?php
							require ('Handler/conn.php');
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
					<a href="src.php" title="母婴商城" id="ts">
						<img src="../res/static/img/logo.png">
					</a></h1>
					
					
					
					<div class="mallSearch">
						<form action="ChirdPage/search.php" class="layui-form" method="post">
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

		<div class="content content-nav-base commodity-content">
			<div class="main-nav">
				<div class="inner-cont0">
					<div class="inner-cont1 w1200">
						<div class="inner-cont2">
							<a href="index.php" class="active">
								<h2>所有商品</h2>
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
			<div class="commod-cont-wrap">
				<div class="commod-cont w1200 layui-clear">
					<div class="left-nav">
						<div class="title">
							所有分类
						</div>
						<div class="list-box">
							
							<dl>
								<dt>
								儿童用品
								</dt>
								<dd>
									<a href="javascript:;">
										纸尿裤
									</a>
								</dd>
								<dd>
									<a href="javascript:;">
										婴儿帽
									</a>
								</dd>
								<dd>
									<a href="javascript:;">
										婴儿摇篮
									</a>
								</dd>
								<dd>
									<a href="javascript:;">
										童装
									</a>
								</dd>
								<dd>
									<a href="javascript:;">
										儿童安全座椅
									</a>
								</dd>
							</dl>
							<dl>
								<dt>
								儿童早教
								</dt>
								<dd>
									<a href="javascript:;">
										儿童玩具
									</a>
								</dd>
								<dd>
									<a href="javascript:;">
										早教书籍
									</a>
								</dd>
								<dd>
									<a href="javascript:;">
										孕产育儿书
									</a>
								</dd>
							</dl>
							<!--<dl>
								<dt>
								儿童服饰
								</dt>
								<dd>
									<a href="javascript:;">
										童装
									</a>
								</dd>
								<dd>
									<a href="javascript:;">
										童鞋
									</a>
								</dd>
								<dd>
									<a href="javascript:;">
										宝宝配饰
									</a>
								</dd>
							</dl>-->
							<dl>
								<dt>
								孕妈专区
								</dt>
								<dd>
									<a href="javascript:;">
										孕妇装
									</a>
								</dd>
								<dd>
									<a href="javascript:;">
										孕妇护肤
									</a>
								</dd>
								
							</dl>
						</div>
					</div>
					
					
					
						
						
					<div class="right-cont-wrap">
						<div class="right-cont">
							
							
							<?php
							require ('Handler/conn.php');
							$sql = "select id from  tb_product";
							$result = mysqli_query($db, $sql);
							$RecordCount = mysqli_num_rows($result);
							?>
							<div class="prod-number">
								<span><?php echo '共' . $RecordCount . '个'; ?></span>
							</div>
							
							
							<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='A'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='A'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img  id="img1" src="<?php echo $row['picture']; ?>">
												
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
							
							
		<!--b类-->					
							<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='B'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='B'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);
									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img src="<?php echo $row['picture']; ?>">
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
								
								
	<!--C-->
	
	
			<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='C'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='C'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);
									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img src="<?php echo $row['picture']; ?>">
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
								
								
								<!---->
										
							<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='D'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='D'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img src="<?php echo $row['picture']; ?>">
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
								
								<!---->
								
								<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='E'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='E'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img id="img1" src="<?php echo $row['picture']; ?>">
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
								
								<!---->
								
								<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='F'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='F'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img id="img1" src="<?php echo $row['picture']; ?>">
												
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
								
								<!---->
								
								<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='G'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='G'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img  id="img1" src="<?php echo $row['picture']; ?>">
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
								
								<!---->
								
								<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='H'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='H'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img  id="img1" src="<?php echo $row['picture']; ?>">
												
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
								
								<!---->
								
								
								
								<!---->
								
								<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='I'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='I'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img  id="img1" src="<?php echo $row['picture']; ?>">
												
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
								
								<!---->
								
								<!---->
								
								<div class="cont-list layui-clear" id="list-cont">
								
								<?php require('Handler/conn.php' );
									$sql="select id from  tb_product where category='J'";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from tb_product where category='J'" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
								?>
                                 <div class="item">
									<div class="img">
										<a href="javascript:;">
											<img  id="img1" src="<?php echo $row['picture']; ?>">
												
												
										</a>
									</div>
									<div class="text">
										<a href="#">
											<p class="title"><?php echo $row['title']; ?></p>
											<p class="price">
												<span class="pri"><?php echo $row['price']; ?></span>
												<span class="nub"><?php echo $row['nub']; ?>付款</span>
											</p>
										</a>
									</div>
								</div>
				
				<?php
				}
				}
								?>
								
								</div>
								
								<!---->
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<style>.info {
	font-size: 23px;
}</style>


	</body>
	
</html>