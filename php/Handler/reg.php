<?php
//获取post的数据
$name=$_POST['username'];
$phone = $_POST['phone'];
$pwd = $_POST['pwd'];
//$remember=$_POST['remember'];
//连接数据库


require('conn.php');
$sql2="select * from tb_user";
$result=mysqli_query($db, $sql2);
$row=mysqli_fetch_assoc($result);
if($row['username']==$name||$row['number']==$phone){
	echo "1";
}

else{
	echo "2";
$sql = "insert into tb_user(username,number,password) values('$name','$phone','$pwd')";
 
mysqli_query($db, $sql);}
mysqli_close($db);
?>