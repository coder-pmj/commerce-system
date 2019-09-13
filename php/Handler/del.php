<?php


require('conn.php');
/*$sql="delete from tb_buying ";
mysqli_query($db, $sql);
mysqli_close($db);*/

$datas1=json_decode($_POST['datas1']);
$datas2=json_decode($_POST['datas2']);
$datas3=json_decode($_POST['datas3']);
$datas4=json_decode($_POST['datas4']);
$datas5=json_decode($_POST['datas5']);
$num=count($datas1);

for($i=0;$i<$num;$i++){
	
	$sql="insert into tb_history(title,aprice,acount,allprice,picture) values('$datas1[$i]','$datas2[$i]','$datas3[$i]','$datas4[$i]','$datas5[$i]')";
	mysqli_query($db, $sql);
}

$sql1="delete from tb_buying ";
mysqli_query($db, $sql1);


mysqli_close($db);
?>