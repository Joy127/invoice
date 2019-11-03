<?php
    include "base.php";

    echo $year=$_POST['year'];
    echo $period=$_POST['period'];
    echo $eng=$_POST['eng'];
    echo $number=$_POST['number'];
    echo $date=$_POST['date'];    
    echo $amount=$_POST['amount'];
    echo $store=$_POST['store'];
    echo $note=$_POST['note'];

    // $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense", 'root',''); 

    $sql="INSERT INTO invoice ( `year`, `period`, `eng`, `number`, `date`, `amount`, `store`, `note`) 
    VALUES ('$year','$period','$eng','$number','$date','$amount','$store','$note')";

    if ($pdo->exec($sql)) {
        echo "新增發票資料成功！";  
        header("location:input.php");              
    }else{   
        echo "新增發票資料失敗！";     
        header("location:input.php");
       
    };

?>