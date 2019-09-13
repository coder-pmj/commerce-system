<?php


$id=$_POST['id'];

require('conn.php');
$sql="delete from tb_buying where id='$id'";
mysqli_query($db, $sql);
mysqli_close($db);
?>