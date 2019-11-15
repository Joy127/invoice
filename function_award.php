<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>對獎</title>
</head>
<body>  
    <?php
           
        // award 200
        function awardA($year, $period) {
            global $pdo;
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
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
            
            return $pdo->query($sql)->fetchAll();  
        }
        

        echo "<table border='1'>";
        echo "<tr>";        
        echo "<th>序號</th>";
        echo "<th>年度</th>";
        echo "<th>期數</th>";
        echo "<th>發票號碼</th>";
        echo "<th>發票金額</th>";
        echo "</tr>";      

        $count=0;
        $data=awardA(2019, 4);
        if (!empty($data)) {
            foreach($data as $v) {
                echo "<tr>";
                echo "<td>" . $v['id'] . "</td>";
                echo "<td>" . $v['year'] . "</td>";
                echo "<td>" . $v['period'] . "</td>";
                echo "<td>" . $v['number'] . "</td>";
                echo "<td>" . $v['amount'] . "</td>";
                echo "</tr>"; 
                $count++;                    
            }        
        }
        echo "</table>";
        echo "恭喜你發票中了" . ($count*200) . "元";
        echo "<hr>";


        // award 1,000
        function awardB($year, $period) {
            global $pdo;
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
                  FROM `invoice`,`prizenum`
                  WHERE `invoice`.`year`=$year &&
                        `invoice`.`year`=`prizenum`.`year` &&                        
                        `invoice`.`period`=$period &&
                        `invoice`.`period`=`prizenum`.`period` &&
                        (substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num3`,5,4) or
                         substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num4`,5,4) or
                         substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num5`,5,4))";
            
            return $pdo->query($sql)->fetchAll();
        }
        
        echo "<table border='1'>";
        echo "<tr>";        
        echo "<th>序號</th>";
        echo "<th>年度</th>";
        echo "<th>期數</th>";
        echo "<th>發票號碼</th>";
        echo "<th>發票金額</th>";
        echo "</tr>";      

        $count=0;
        $data=awardB(2019, 4);
        if (!empty($data)) {
            echo "<tr>";
                echo "<td>" . $v['id'] . "</td>";
                echo "<td>" . $v['year'] . "</td>";
                echo "<td>" . $v['period'] . "</td>";
                echo "<td>" . $v['number'] . "</td>";
                echo "<td>" . $v['amount'] . "</td>";
                echo "</tr>"; 
                $count++;   
            }  
        echo "</table>";       
        echo "恭喜你發票中了" . ($count*1000) . "元";    
        echo "<hr>";

        // award 4,000
        function awardC($year, $period) {
            global $pdo;
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
                  FROM `invoice`,`prizenum`
                  WHERE `invoice`.`year`=$year &&
                        `invoice`.`year`=`prizenum`.`year` &&                        
                        `invoice`.`period`=$period &&
                        `invoice`.`period`=`prizenum`.`period` &&
                        (substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num3`,4,5) or
                         substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num4`,4,5) or
                         substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num5`,4,5))";                                 
            
            return $pdo->query($sql)->fetchAll();
        }

        echo "<table border='1'>";
        echo "<tr>";        
        echo "<th>序號</th>";
        echo "<th>年度</th>";
        echo "<th>期數</th>";
        echo "<th>發票號碼</th>";
        echo "<th>發票金額</th>";
        echo "</tr>";      

        $count=0;
        $data=awardC(2019, 4);
        if (!empty($data)) {
            foreach($data as $v) {
                echo "<tr>";
                echo "<td>" . $v['id'] . "</td>";
                echo "<td>" . $v['year'] . "</td>";
                echo "<td>" . $v['period'] . "</td>";
                echo "<td>" . $v['number'] . "</td>";
                echo "<td>" . $v['amount'] . "</td>";
                echo "</tr>"; 
                $count++;                   
            }     
        }
        echo "</table>"; 
        echo "恭喜你發票中了" . ($count*4000) . "元";    
        echo "<hr>";

        // award 10,000
        function awardD($year, $period) {
            global $pdo;
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
                  FROM `invoice`,`prizenum`
                  WHERE `invoice`.`year`=$year &&
                        `invoice`.`year`=`prizenum`.`year` &&                        
                        `invoice`.`period`=$period &&
                        `invoice`.`period`=`prizenum`.`period` &&
                        (substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num3`,4,5) or
                         substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num4`,4,5) or
                         substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num5`,4,5))";                                 
            
            return $pdo->query($sql)->fetchAll();
        }

        echo "<table border='1'>";
        echo "<tr>";        
        echo "<th>序號</th>";
        echo "<th>年度</th>";
        echo "<th>期數</th>";
        echo "<th>發票號碼</th>";
        echo "<th>發票金額</th>";
        echo "</tr>";      

        $count=0;
        $data=awardD(2019, 4);
        if (!empty($data)) {
            foreach($data as $v) {
                echo $v['id'] . "<br>";
                echo $v['year'] . "<br>";
                echo $v['period'] . "<br>";
                echo $v['number'] . "<br>";
                echo $v['amount'] . "<br>"; 
                $count++;               
                echo "<hr>";
            }     
        }
        echo "</table>"; 
        echo "恭喜你發票中了" . ($count*10000) . "元";    
        echo "<hr>";

        // award 40,000
        function awardE($year, $period) {
            global $pdo;
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
                  FROM `invoice`,`prizenum`
                  WHERE `invoice`.`year`=$year &&
                        `invoice`.`year`=`prizenum`.`year` &&                        
                        `invoice`.`period`=$period &&
                        `invoice`.`period`=`prizenum`.`period` &&
                        (substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num3`,2,7) or
                         substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num4`,2,7) or
                         substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num5`,2,7))";                                 
            
            return $pdo->query($sql)->fetchAll();
        }

        echo "<table border='1'>";
        echo "<tr>";        
        echo "<th>序號</th>";
        echo "<th>年度</th>";
        echo "<th>期數</th>";
        echo "<th>發票號碼</th>";
        echo "<th>發票金額</th>";
        echo "</tr>";      


        $count=0;
        $data=awardE(2019, 4);
        if (!empty($data)) {
            foreach($data as $v) {
                echo $v['id'] . "<br>";
                echo $v['year'] . "<br>";
                echo $v['period'] . "<br>";
                echo $v['number'] . "<br>";
                echo $v['amount'] . "<br>"; 
                $count++;               
                echo "<hr>";
            }     
        }
        echo "</table>"; 
        echo "恭喜你發票中了" . ($count*40000) . "元";    
        echo "<hr>";

        // award 200,000
        function awardF($year, $period) {
            global $pdo;
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
                  FROM `invoice`,`prizenum`
                  WHERE `invoice`.`year`=$year &&
                        `invoice`.`year`=`prizenum`.`year` &&                        
                        `invoice`.`period`=$period &&
                        `invoice`.`period`=`prizenum`.`period` &&
                       (`invoice`.`number`=`prizenum`.`num3` or
                        `invoice`.`number`=`prizenum`.`num4` or
                        `invoice`.`number`=`prizenum`.`num5`)";            
            
            return $pdo->query($sql)->fetchAll();
        }

        echo "<table border='1'>";
        echo "<tr>";        
        echo "<th>序號</th>";
        echo "<th>年度</th>";
        echo "<th>期數</th>";
        echo "<th>發票號碼</th>";
        echo "<th>發票金額</th>";
        echo "</tr>";      


        $count=0;
        $data=awardF(2019, 4);
        if (!empty($data)) {
            foreach($data as $v) {
                echo $v['id'] . "<br>";
                echo $v['year'] . "<br>";
                echo $v['period'] . "<br>";
                echo $v['number'] . "<br>";
                echo $v['amount'] . "<br>"; 
                $count++;               
                echo "<hr>";
            }     
        }
        echo "</table>"; 
        echo "恭喜你發票中了" . ($count*200000) . "元";    
        echo "<hr>";


        // award2,000,000
        function awardG($year, $period) {
            global $pdo;
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
                  FROM `invoice`,`prizenum`
                  WHERE `invoice`.`year`=$year &&
                        `invoice`.`year`=`prizenum`.`year` &&                        
                        `invoice`.`period`=$period &&
                        `invoice`.`period`=`prizenum`.`period` &&
                        `invoice`.`number`=`prizenum`.`num2`";            
            
            return $pdo->query($sql)->fetchAll();
        }

        echo "<table border='1'>";
        echo "<tr>";        
        echo "<th>序號</th>";
        echo "<th>年度</th>";
        echo "<th>期數</th>";
        echo "<th>發票號碼</th>";
        echo "<th>發票金額</th>";
        echo "</tr>";      


        $count=0;
        $data=awardG(2019, 4);
        if (!empty($data)) {
            foreach($data as $v) {
                echo $v['id'] . "<br>";
                echo $v['year'] . "<br>";
                echo $v['period'] . "<br>";
                echo $v['number'] . "<br>";
                echo $v['amount'] . "<br>"; 
                $count++;               
                echo "<hr>";
            }     
        }
        echo "</table>"; 
        echo "恭喜你發票中了" . ($count*2000000) . "元";    
        echo "<hr>";

        // award10,000,000
        function awardH($year, $period) {
            global $pdo;
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
                  FROM `invoice`,`prizenum`
                  WHERE `invoice`.`year`=$year &&
                        `invoice`.`year`=`prizenum`.`year` &&                        
                        `invoice`.`period`=$period &&
                        `invoice`.`period`=`prizenum`.`period` &&
                        `invoice`.`number`=`prizenum`.`num1`";                        
            
            return $pdo->query($sql)->fetchAll();
        }

        echo "<table border='1'>";
        echo "<tr>";        
        echo "<th>序號</th>";
        echo "<th>年度</th>";
        echo "<th>期數</th>";
        echo "<th>發票號碼</th>";
        echo "<th>發票金額</th>";
        echo "</tr>";      


        $count=0;
        $data=awardH(2019, 4);
        if (!empty($data)) {
            foreach($data as $v) {
                echo $v['id'] . "<br>";
                echo $v['year'] . "<br>";
                echo $v['period'] . "<br>";
                echo $v['number'] . "<br>";
                echo $v['amount'] . "<br>"; 
                $count++;               
                echo "<hr>";
            }     
        }
        echo "</table>"; 
        echo "恭喜你發票中了" . ($count*10000000) . "元";    
        echo "<hr>";
    ?>

</body>
</html>