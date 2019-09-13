<?php


require('conn.php');
/*$sql="delete from tb_buying ";
mysqli_query($db, $sql);
mysqli_close($db);*/

$datas1=json_decode($_POST['datas1']);

$num=count($datas1);

for($i=0;$i<$num;$i++){
	
	$sql="delete from tb_history where title='$datas1[$i]'";
	mysqli_query($db, $sql);
}

mysqli_close($db);
?>