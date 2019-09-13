<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>母婴系统-母婴资讯</title>
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
        <a href="index.php">首页</a>
      </p>
      <div class="sn-quick-menu">
					<div class="login"><?php

					if (!($_SESSION['user'])) {
						header('Location:information-tourist.php');

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
          <a href="src.php" title="母婴商城">
            <img src="../res/static/img/logo.png">
          </a>
        </h1>
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


  <div class="content content-nav-base information-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="index.php">所有商品</a>
            <a href="buytoday.php">今日团购</a>
            <a href="information.php"  class="active"><h2>母婴资讯</h2></a>
            <a href="about.php">关于我们</a>
          </div>
        </div>
      </div>
    </div>
    <div class="info-list-box">
      <div class="info-list w1200">
        <div class="item-box layui-clear" id="list-cont">
						<?php 
						require('Handler/conn.php' );
									$sql="select id from  tb_information";
									$result=mysqli_query($db, $sql);
									$RecordCount=mysqli_num_rows($result);
									//mysqli_free_result($result);
									$result=mysqli_query($db, "select * from  tb_information" );
									for ($i=0;
									$i < $RecordCount;
									$i++) {
									$row=mysqli_fetch_assoc($result);

									if($row) {
?>
						
						<div class="item">
							<div class="img">
								<img src="<?php echo $row['picture'];?>" alt="">
							</div>
							<div class="text">
								<h4><?php echo $row['title'];?></h4>
								<p class="data">
									<?php echo $row['time'];?>
								</p>
								<p class="info-cont">
									<?php echo $row['text'];?>

								</p>
							</div>
						</div>
			<?php
}
}
								?>			
						
						
						
					</div>
      </div>
    </div>
  </div>
 
<script>
  layui.config({
    base: '../res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm','laypage'],function(){
      var
      mm = layui.mm,laypage = layui.laypage;
      laypage.render({
        elem: 'demo0'
        ,count: 100 //数据总数
      });
    // 模版引擎导入
     // var html = demo.innerHTML;
     // var listCont = document.getElementById('list-cont');
     //  mm.request({
     //    url: '../json/information.json',
     //    success : function(res){
     //      console.log(res)
     //      listCont.innerHTML = mm.renderHtml(html,res)
     //    },
     //    error: function(res){
     //      console.log(res);
     //    }
     //  })   
});

</script>


</body>
</html>