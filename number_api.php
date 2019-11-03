<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        include "base.php";
        
        echo $year=$_POST['year'];
        echo $period=$_POST['period'];
        echo $num1=$_POST['num1'];
        echo $num2=$_POST['num2'];
        echo $num3=$_POST['num3'];
        echo $num4=$_POST['num4'];
        echo $num5=$_POST['num5'];
        echo $num6=$_POST['num6'];
        echo $num7=$_POST['num7'];

        $sql="INSERT INTO `prizenum`
             (`year`,`period`,`num1`,`num2`,`num3`,`num4`,`num5`,`num6`,`num7`)
            VALUES ('$year','$period','$num1','$num2','$num3','$num4','$num5','$num6','$num7')";
        
        if ( $pdo->exec($sql)) {
            echo "新增 $year 年第 $period 期中獎號碼成功！";
            header("location:number.php");
        }else {
            echo "新增 $year 年第 $period 期中獎號碼失敗！";
            header("location:number.php");
        }        
    
    ?>

</body>
</html>