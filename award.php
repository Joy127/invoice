<?php
    if (empty($_GET['year']) || empty($_GET['period'])) {
        echo "<a href='choice2.php'>請輸入對獎年度和期數！</a>";
        header("location:choice2.php?err=1");
    }else {
        $year=$_GET['year'];
        $period=$_GET['period']; 
        $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
        $sql="SELECT * FROM `invoice` WHERE `invoice`.`year`=$year && `invoice`.`period`=$period";    
        if (empty($pdo->query($sql)->fetchAll())) {
            // echo "<a href='choice2.php'>沒有該期發票！</a>";
            header("location:choice2.php?err=2");
        }
    }

    $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
    $sql="SELECT * FROM `prizenum` WHERE `prizenum`.`year`=$year && `prizenum`.`period`=$period";    
    if (empty($pdo->query($sql)->fetchAll())) {
        echo "<a href='choice2.php'>沒有該期獎號！</a>";
        header("location:choice2.php?err=3");
    }

    // $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
    // $sql="SELECT * FROM `invoice` WHERE `invoice`.`year`=$year && `invoice`.`period`=$period";    
    // if (empty($pdo->query($sql)->fetchAll())) {
    //     echo "<a href='choice2.php'>沒有該期發票！</a>";
    //     header("location:choice2.php?err=2");
    // }

    // $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
    // $sql="SELECT * FROM `prizenum` WHERE `prizenum`.`year`=$year && `prizenum`.`period`=$period";    
    // if (empty($pdo->query($sql)->fetchAll())) {
    //     echo "<a href='choice2.php'>沒有該期獎號！</a>";
    //     header("location:choice2.php?err=3");
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>  
        table{
            border-collapse:collapse;
            border-spacing:0;
            margin:auto;
        }
        
        th{
            height:25px;
            border:1px solid #ccc;
            padding:5px;
            font-size:15px;           
            text-overflow:ellipsis;
        }

        td{            
            height:20px;
            border:1px solid #ccc;
            padding:5px;
            font-size:15px;
            text-align:right;
            text-overflow:ellipsis;
        }       
      </style>
</head>

<body>    

<div class="main">
    <div class="header"><h2>對獎</h2></div>        
    <hr>
    
    <div class="content">  

        <!-- award 10,000,000 -->
        <?php     
        
            $year=$_GET['year'];
            $period=$_GET['period'];                        

            global $pdo; 
            global $totsheet;
            global $totaward;               
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`eng`,`invoice`.`number`,`invoice`.`amount`
            FROM `invoice`,`prizenum`
            WHERE `invoice`.`year`=$year &&
                    `invoice`.`year`=`prizenum`.`year` &&                        
                    `invoice`.`period`=$period &&
                    `invoice`.`period`=`prizenum`.`period` && 
                    `invoice`.`number`=`prizenum`.`num1`"; 
        
            $data=$pdo->query($sql)->fetchAll();
        
        $totsheet=0;
        $totaward=0;
        $count1=0;
        
        if (!empty($data)) {
        ?>
            <table>       
            <tr>
                <th>序號</th>                    
                <th>年度</th>                    
                <th>期數</th>                    
                <th>編碼</th>
                <th>發票號碼</th>
                <th>消費金額</th>
            </tr> 
        <?php
            foreach ($data as $v) { 
        ?>   
                <tr>
                    <td><?=$v['id'];?></td>                       
                    <td><?=$v['year'];?></td>                       
                    <td><?=$v['period'];?></td>                       
                    <td><?=$v['eng'];?></td>
                    <td><?=$v['number'];?></td>
                    <td><?=$v['amount'];?></td>   
                </tr>   
        <?php
                    $count1++;
            } 
        }
        if($count1>0){
        ?>
            <tr><td colspan="6">
            <?php
                echo "你中了". $count1 . "筆特別獎，合計：" . ($count1*10000000) . "元"; 
                $totaward=$totaward+($count1*10000000);
                $totsheet=$totsheet+$count1;
            ?>
            </td></tr>
        </table>  
        <hr>    
        <?php    
        }
        ?>               
        

        <!-- award 2,000,000 -->
        <?php     
        
            $year=$_GET['year'];
            $period=$_GET['period'];                        

            global $pdo;                
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`eng`,`invoice`.`number`,`invoice`.`amount`
            FROM `invoice`,`prizenum`
            WHERE `invoice`.`year`=$year &&
                    `invoice`.`year`=`prizenum`.`year` &&                        
                    `invoice`.`period`=$period &&
                    `invoice`.`period`=`prizenum`.`period` && 
                    `invoice`.`number`=`prizenum`.`num2`"; 
        
            $data=$pdo->query($sql)->fetchAll();
        
        $count2=0;
        if (!empty($data)) {
        ?>
            <table>       
            <tr>
                <th>序號</th>                    
                <th>年度</th>                    
                <th>期數</th>                    
                <th>編碼</th>
                <th>發票號碼</th>
                <th>消費金額</th>
            </tr> 
        <?php
            foreach ($data as $v) { 
        ?>   
                <tr>
                    <td><?=$v['id'];?></td>                       
                    <td><?=$v['year'];?></td>                       
                    <td><?=$v['period'];?></td>                       
                    <td><?=$v['eng'];?></td>
                    <td><?=$v['number'];?></td>
                    <td><?=$v['amount'];?></td>   
                </tr>   
        <?php
                    $count2++;
            } 
        }
        if($count2>0){
        ?>
            <tr><td colspan="6">
            <?php
                echo "你中了". $count2 . "筆特獎，合計：" . ($count2*2000000) . "元"; 
                $totaward=$totaward+($count2*2000000);
                $totsheet=$totsheet+$count2;
            ?>
            </td></tr>
        </table>  
        <hr>    
        <?php    
        }
        ?>     

        <!-- award 200,000 -->
        <?php     
        
            $year=$_GET['year'];
            $period=$_GET['period'];                        

            global $pdo;                
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`eng`,`invoice`.`number`,`invoice`.`amount`
            FROM `invoice`,`prizenum`
            WHERE `invoice`.`year`=$year &&
                    `invoice`.`year`=`prizenum`.`year` &&                        
                    `invoice`.`period`=$period &&
                    `invoice`.`period`=`prizenum`.`period` && 
                    (`invoice`.`number`=`prizenum`.`num3` or
                     `invoice`.`number`=`prizenum`.`num4` or
                     `invoice`.`number`=`prizenum`.`num5`)";   
        
            $data=$pdo->query($sql)->fetchAll();
        
        $count3=0;
        if (!empty($data)) {
        ?>
            <table>       
            <tr>
                <th>序號</th>                    
                <th>年度</th>                    
                <th>期數</th>                    
                <th>編碼</th>
                <th>發票號碼</th>
                <th>消費金額</th>
            </tr> 
        <?php
            foreach ($data as $v) { 
        ?>   
                <tr>
                    <td><?=$v['id'];?></td>                       
                    <td><?=$v['year'];?></td>                       
                    <td><?=$v['period'];?></td>                       
                    <td><?=$v['eng'];?></td>
                    <td><?=$v['number'];?></td>
                    <td><?=$v['amount'];?></td>   
                </tr>   
        <?php
                    $count3++;
            } 
        }
        if($count3>0){
        ?>
            <tr><td colspan="6">
            <?php
                echo "你中了". $count3 . "筆頭獎，合計：" . ($count3*200000) . "元"; 
                $totaward=$totaward+($count3*200000);
                $totsheet=$totsheet+$count3;
            ?>
            </td></tr>
        </table>  
        <hr>    
        <?php    
        }
        ?>     

        <!-- award 40,000 -->
        <?php     
        
            $year=$_GET['year'];
            $period=$_GET['period'];                        

            global $pdo;                
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`eng`,`invoice`.`number`,`invoice`.`amount`
            FROM `invoice`,`prizenum`
            WHERE `invoice`.`year`=$year &&
                    `invoice`.`year`=`prizenum`.`year` &&                        
                    `invoice`.`period`=$period &&
                    `invoice`.`period`=`prizenum`.`period` && 
                    (substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num3`,2,7) or
                     substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num4`,2,7) or
                     substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num5`,2,7))"; 
        
            $data=$pdo->query($sql)->fetchAll();
        
        $count4=0;
        if (!empty($data)) {
        ?>
            <table>       
            <tr>
                <th>序號</th>                    
                <th>年度</th>                    
                <th>期數</th>                    
                <th>編碼</th>
                <th>發票號碼</th>
                <th>消費金額</th>
            </tr> 
        <?php
            foreach ($data as $v) { 
        ?>   
                <tr>
                    <td><?=$v['id'];?></td>                       
                    <td><?=$v['year'];?></td>                       
                    <td><?=$v['period'];?></td>                       
                    <td><?=$v['eng'];?></td>
                    <td><?=$v['number'];?></td>
                    <td><?=$v['amount'];?></td>   
                </tr>   
        <?php
                    $count4++;
            } 
        }
        if($count4>0){
        ?>
            <tr><td colspan="6">
            <?php
                echo "你中了". $count4 . "筆二獎，合計：" . ($count4*40000) . "元"; 
                $totaward=$totaward+($count4*40000);
                $totsheet=$totsheet+$count4;
            ?>
            </td></tr>
        </table>  
        <hr>    
        <?php    
        }
        ?>     

        <!-- award 10,000 -->
        <?php     
        
            $year=$_GET['year'];
            $period=$_GET['period'];                        

            global $pdo;                
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`eng`,`invoice`.`number`,`invoice`.`amount`
            FROM `invoice`,`prizenum`
            WHERE `invoice`.`year`=$year &&
                    `invoice`.`year`=`prizenum`.`year` &&                        
                    `invoice`.`period`=$period &&
                    `invoice`.`period`=`prizenum`.`period` && 
                    (substring(`invoice`.`number`,3,6)=substring(`prizenum`.`num3`,3,6) OR
                     substring(`invoice`.`number`,3,6)=substring(`prizenum`.`num4`,3,6) OR
                     substring(`invoice`.`number`,3,6)=substring(`prizenum`.`num5`,3,6))"; 
        
            $data=$pdo->query($sql)->fetchAll();
        
        $count5=0;
        if (!empty($data)) {
        ?>
            <table>       
            <tr>
                <th>序號</th>                    
                <th>年度</th>                    
                <th>期數</th>                    
                <th>編碼</th>
                <th>發票號碼</th>
                <th>消費金額</th>
            </tr> 
        <?php
            foreach ($data as $v) { 
        ?>   
                <tr>
                    <td><?=$v['id'];?></td>                       
                    <td><?=$v['year'];?></td>                       
                    <td><?=$v['period'];?></td>                       
                    <td><?=$v['eng'];?></td>
                    <td><?=$v['number'];?></td>
                    <td><?=$v['amount'];?></td>   
                </tr>   
        <?php
                    $count5++;
            } 
        }
        if($count5>0){
        ?>
            <tr><td colspan="6">
            <?php
                echo "你中了". $count5 . "筆三獎，合計：" . ($count5*10000) . "元";
                $totaward=$totaward+($count5*10000); 
                $totsheet=$totsheet+$count5;
            ?>
            </td></tr>
        </table>  
        <hr>    
        <?php    
        }
        ?>     

        <!-- award 4,000 -->
        <?php     
        
            $year=$_GET['year'];
            $period=$_GET['period'];                        

            global $pdo;                
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`eng`,`invoice`.`number`,`invoice`.`amount`
            FROM `invoice`,`prizenum`
            WHERE `invoice`.`year`=$year &&
                    `invoice`.`year`=`prizenum`.`year` &&                        
                    `invoice`.`period`=$period &&
                    `invoice`.`period`=`prizenum`.`period` && 
                    (substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num3`,4,5) OR
                     substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num4`,4,5) OR
                     substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num5`,4,5))"; 
        
            $data=$pdo->query($sql)->fetchAll();
        
        $count6=0;
        if (!empty($data)) {
        ?>
            <table>       
            <tr>
                <th>序號</th>                    
                <th>年度</th>                    
                <th>期數</th>                    
                <th>編碼</th>
                <th>發票號碼</th>
                <th>消費金額</th>
            </tr> 
        <?php
            foreach ($data as $v) { 
        ?>   
                <tr>
                    <td><?=$v['id'];?></td>                       
                    <td><?=$v['year'];?></td>                       
                    <td><?=$v['period'];?></td>                       
                    <td><?=$v['eng'];?></td>
                    <td><?=$v['number'];?></td>
                    <td><?=$v['amount'];?></td>   
                </tr>   
        <?php
                    $count6++;
            } 
        }
        if($count6>0){
        ?>
            <tr><td colspan="6">
            <?php
                echo "你中了". $count6 . "筆四獎，合計：" . ($count6*4000) . "元"; 
                $totaward=$totaward+($count6*4000);
                $totsheet=$totsheet+$count6;
            ?>
            </td></tr>
        </table>  
        <hr>    
        <?php    
        }
        ?>     

        <!-- award 1,000 -->
        <?php     
        
            $year=$_GET['year'];
            $period=$_GET['period'];                        

            global $pdo;                
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`eng`,`invoice`.`number`,`invoice`.`amount`
            FROM `invoice`,`prizenum`
            WHERE `invoice`.`year`=$year &&
                    `invoice`.`year`=`prizenum`.`year` &&                        
                    `invoice`.`period`=$period &&
                    `invoice`.`period`=`prizenum`.`period` && 
                    (substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num3`,5,4) OR
                     substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num4`,5,4) OR
                     substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num5`,5,4))"; 
        
            $data=$pdo->query($sql)->fetchAll();
        
        $count7=0;
        if (!empty($data)) {
        ?>
            <table>       
            <tr>
                <th>序號</th>                    
                <th>年度</th>                    
                <th>期數</th>                    
                <th>編碼</th>
                <th>發票號碼</th>
                <th>消費金額</th>
            </tr> 
        <?php
            foreach ($data as $v) { 
        ?>   
                <tr>
                    <td><?=$v['id'];?></td>                       
                    <td><?=$v['year'];?></td>                       
                    <td><?=$v['period'];?></td>                       
                    <td><?=$v['eng'];?></td>
                    <td><?=$v['number'];?></td>
                    <td><?=$v['amount'];?></td>   
                </tr>   
        <?php
                    $count7++;
            } 
        }
        if($count7>0){
        ?>
            <tr><td colspan="6">
            <?php
                echo "你中了". $count7 . "筆五獎，合計：" . ($count7*1000) . "元";
                $totaward=$totaward+($count7*1000);
                $totsheet=$totsheet+$count7; 
            ?>
            </td></tr>
        </table>  
        <hr>    
        <?php    
        }
        ?>     

        <!-- award 200 -->
        <?php     
        
            $year=$_GET['year'];
            $period=$_GET['period'];                        

            global $pdo;                
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`eng`,`invoice`.`number`,`invoice`.`amount`
            FROM `invoice`,`prizenum`
            WHERE `invoice`.`year`=$year &&
                    `invoice`.`year`=`prizenum`.`year` &&                        
                    `invoice`.`period`=$period &&
                    `invoice`.`period`=`prizenum`.`period` && 
                    (substring(`invoice`.`number`,6,3)=`prizenum`.`num6` or
                     substring(`invoice`.`number`,6,3)=`prizenum`.`num7` or
                     substring(`invoice`.`number`,6,3)=substring(`prizenum`.`num3`,6,3) or
                     substring(`invoice`.`number`,6,3)=substring(`prizenum`.`num4`,6,3) or
                     substring(`invoice`.`number`,6,3)=substring(`prizenum`.`num5`,6,3))";  
        
            $data=$pdo->query($sql)->fetchAll();
        
        $count8=0;
        if (!empty($data)) {
        ?>
            <table>       
            <tr>
                <th>序號</th>                    
                <th>年度</th>                    
                <th>期數</th>                    
                <th>編碼</th>
                <th>發票號碼</th>
                <th>消費金額</th>
            </tr> 
        <?php
            foreach ($data as $v) { 
        ?>   
                <tr>
                    <td><?=$v['id'];?></td>                       
                    <td><?=$v['year'];?></td>                       
                    <td><?=$v['period'];?></td>                       
                    <td><?=$v['eng'];?></td>
                    <td><?=$v['number'];?></td>
                    <td><?=$v['amount'];?></td>   
                </tr>   
        <?php
                    $count8++;
            } 
        }
        if($count8>0){
        ?>
            <tr><td colspan="6">
            <?php
                echo "你中了". $count8 . "筆六獎，合計：" . ($count8*200) . "元"; 
                $totaward=$totaward+($count8*200);
                $totsheet=$totsheet+$count8;
            ?>
            </td></tr>
        <?php    
        }
        ?>  

        <tr>
            <td colspan="6">
            <?php
                $year=$_GET['year'];
                $period=$_GET['period'];
                echo $year . "年第" . $period . "期，有" . $totsheet . "張發票中獎，<br>中獎金額合計：" . $totaward . "元";                     
            ?>  
            </td>  
        </tr>
        </table>  
        <hr>
    </div>    

    <div class="footer"> 
        <p><a href="choice2.php">回上頁</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">回首頁</a></p>
    </div> 
</div>

</body>
</html>