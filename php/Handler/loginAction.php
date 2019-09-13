<?php
session_start();
//获取post的数据
$phone = $_POST['phone'];
$pwd = $_POST['pwd'];
//$remember=$_POST['remember'];
//连接数据库
require('conn.php');
$sql = "select *  from  tb_user  where number='$phone'";
 
$result=mysqli_query($db, $sql);
$row = mysqli_fetch_row($result);
 
 
if(!empty($row)&&$pwd == $row[2]){
    $_SESSION['user'] = $row[1];
	
    echo "1";
}else{
    echo '0';
}

mysqli_close($db);
?>