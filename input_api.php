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

    $sql="INSERT INTO invoice ( `year`, `period`, `eng`, `number`, `date`, `amount`, `store`, `note`) 
    VALUES ('$year','$period','$eng','$number','$date','$amount','$store','$note')";

    if ($pdo->exec($sql)) {                
        header("location:input.php?s=1");              
    }else{                      
        header("location:input.php?err=1");       
    };

?>