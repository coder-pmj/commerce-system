<?php


$id=$_POST['id'];

require('conn.php');
$sql="delete from tb_history where id='$id'";
mysqli_query($db, $sql);
mysqli_close($db);
?>