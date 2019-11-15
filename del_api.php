<?php

$id=$_POST['id'];

$pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense", 'root','');

$sql="DELETE FROM `invoice` WHERE `id`='$id'";

// $pdo->exec($sql);

if ($pdo->exec($sql)) {
   header("location:choice1.php?s=2");
}else {    
    header("location:choice1.php?err=3");
}

?>