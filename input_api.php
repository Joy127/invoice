<?php
    include "base.php";

    $year=$_POST['year'];
    $period=$_POST['period'];
    $eng=$_POST['eng'];
    $number=$_POST['number'];
    $date=$_POST['date'];    
    $amount=$_POST['amount'];
    $store=$_POST['store'];
    $note=$_POST['note'];

    // $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense", 'root',''); 

    $sql="INSERT INTO invoice ( `year`, `period`, `eng`, `number`, `date`, `amount`, `store`, `note`) 
    VALUES ('$year','$period','$eng','$number','$date','$amount','$store','$note')";

    if ($pdo->exec($sql)) { 
        // echo "<a href='input.php'>發票新增成功!</a>";       
        header("location:input.php");              
    }else{  
        // echo "<a href='input.php'>發票新增失敗!</a>";             
        header("location:input.php?err=1");       
    };

?>