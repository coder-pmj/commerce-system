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
			
			
			<style>
					.wrap{
						width: 60px;
						margin-right: 50px;
					}
					.wrap2{
						width: 160px;
						
					}
					.wrap-buttom{
						width: 60px;
						background-color: rgba(0,0,0,0.3);
						display: none;
					}
					.wrap2:hover .wrap-buttom{
						display: inline-block;
					}
					.astyle{
						color: #9175AD;
					}
					.this{
						color: #CF1900;
					}
					
				</style>
	</head>
	<body>
		
		
		<div class="wrap">

			<div class="wrap2">
				<a class="astyle" href="">
					文件信息->功能文件
				</a>

				<div class="wrap-buttom">
					<a href="src.php">项目目录</a>
					<a href="" class="this">功能文件</a>
					
				</div>
			</div>
		</div>

   <div>
	
	<h1>此项目功能文件详情</h1><br><br>

	<?php
	
	$it = new FilesystemIterator("Handler");
	
	$count=0;
	//$count=$it.
	
	foreach ($it as $file) {
		//echo "文件数量:" . $it.length . "<br>";
		$count++;
		echo '<h3>文件'.$count.'</h3><br>';
		
		echo "文件名称:" . $file -> getBasename() . "<br>";
		
		echo "文件大小:" . $file -> getSize() . "<br>";
		
		echo "文件类型:" . $file -> getType() . "<br>";
		
		echo "修改时间:" . date("Y-m-d H:i:s", $file -> getMTime()) . "<br>";
		
		echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br><br><br>";
	}
        echo "<br><br><h3>文件总数:".$count."</h3>";
       
       
	?>
</div>
</body>
</html>