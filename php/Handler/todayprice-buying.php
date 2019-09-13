<?php
$title=$_POST['title'];

$price=$_POST['todayprice'];

$url=$_POST['pictureUrl'];
require('conn.php');
$sql="select * from tb_buying where title='$title'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
if($row){
	echo '1';
}else{
	echo '2';
mysqli_query($db,"INSERT INTO tb_buying (title,price,picture) VALUES ('$title', '$price','$url')");
mysqli_close($db);
}

?>
