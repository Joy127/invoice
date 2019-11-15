<?php

$id=$_POST['id'];
$year=$_POST['year'];
$period=$_POST['period'];
$eng=$_POST['eng'];
$number=$_POST['number'];
$date=$_POST['date'];
$amount=$_POST['amount'];
$store=$_POST['store'];
$note=$_POST['note'];

$pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense", 'root','');
$sql="UPDATE `invoice`
SET `year`='$year',`period`='$period',`eng`='$eng',`number`='$number',
    `date`='$date',`amount`='$amount',`store`='$store',`note`='$note'
WHERE `id`='$id'";

if ($pdo->exec($sql)) {
    header("location:choice1.php?s=1");
}else {   
    header("location:choice1.php?err=2");
}

?>