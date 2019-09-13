<?php


$title=$_POST['title'];
$aprice=substr($_POST['aprice'], 3);
$picture=$_POST['picture'];
$acount=1;

require('conn.php');
$sql="select * from tb_history";
$result=mysqli_query($db, $sql);
$row=mysqli_fetch_assoc($result);
if($row['title']==$title){
	$acount=$row['acount']+1;
	$allprice=$acount*$aprice;
	
	$sql2="update tb_history set acount='$acount',allprice='$allprice' where title='$title'";
	mysqli_query($db, $sql2);
}else{
	$allprice=$acount*$aprice;
	
	$sql3="insert into tb_history(title,aprice,acount,allprice,picture)
	values('$title','$aprice','$acount','$allprice','$picture')";
	mysqli_query($db, $sql3);
}

mysqli_close($db);
?>