<?php

function award($year,$period){

    awardA($year,$period);  
    $tot1=10000000*awardA($year,$period);  
    awardB($year,$period);
    $tot2=2000000*awardB($year,$period); 
    awardC($year,$period);
    $tot3=200000*awardC($year,$period); 
    awardD($year,$period);
    $tot4=40000*awardD($year,$period); 
    awardE($year,$period);
    $tot5=10000*awardE($year,$period);  
    awardF($year,$period);
    $tot6=4000*awardF($year,$period);
    awardG($year,$period);
    $tot7=1000*awardG($year,$period);  
    awardH($year,$period);
    $tot8=200*awardH($year,$period); 
    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8; 

    echo "恭喜您本期總計中獎金額：" . $tot . "元！";

}

award(2019,4);


// award10,000,000
function awardA($year, $period) {
    global $pdo;
    $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
    $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
          FROM `invoice`,`prizenum`
          WHERE `invoice`.`year`=$year &&
                `invoice`.`year`=`prizenum`.`year` &&                        
                `invoice`.`period`=$period &&
                `invoice`.`period`=`prizenum`.`period` &&
                `invoice`.`number`=`prizenum`.`num1`";                        
                
    $data=$pdo->query($sql)->fetchAll();

    echo "<table border='1'>";
    echo "<tr>";        
    echo "<th>序號</th>";
    echo "<th>年度</th>";
    echo "<th>期數</th>";
    echo "<th>發票號碼</th>";
    echo "<th>發票金額</th>";
    echo "</tr>"; 

    $count1=0;   
    if (!empty($data)) {
        foreach($data as $v) {
            echo "<tr>";
            echo "<td>" . $v['id'] . "</td>";
            echo "<td>" . $v['year'] . "</td>";
            echo "<td>" . $v['period'] . "</td>";
            echo "<td>" . $v['number'] . "</td>";
            echo "<td>" . $v['amount'] . "</td>";
            echo "</tr>"; 
            $count1++;    
        }     
    }
    echo "</table>"; 
    if($count1>0){
        echo "你中了". $count1 . "筆特別獎，合計：" . ($count1*10000000) . "元"; 
        echo "<hr>";
    }

    return $count1;
} 


// award2,000,000
function awardB($year, $period) {
    global $pdo;
    $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');
    $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`number`,`invoice`.`amount`
          FROM `invoice`,`prizenum`
          WHERE `invoice`.`year`=$year &&
                `invoice`.`year`=`prizenum`.`year` &&                        
                `invoice`.`period`=$period &&
                `invoice`.`period`=`prizenum`.`period` &&
                `invoice`.`number`=`prizenum`.`num2`";            
                
    $data=$pdo->query($sql)->fetchAll();
    echo "<table border='1'>";
    echo "<tr>";        
    echo "<th>序號</th>";
    echo "<th>年度</th>";
    echo "<th>期數</th>";
    echo "<th>發票號碼</th>";
    echo "<th>發票金額</th>";
    echo "</tr>";   

    $count2=0;           
    if (!empty($data)) {
        foreach($data as $v) {
            echo "<tr>";
            echo "<td>" . $v['id'] . "</td>";
            echo "<td>" . $v['year'] . "</td>";
            echo "<td>" . $v['period'] . "</td>";
            echo "<td>" . $v['number'] . "</td>";
            echo "<td>" . $v['amount'] . "</td>";
            echo "</tr>"; 
            $count2++;  
        }     
    }
    echo "</table>"; 
    if($count2>0){
        echo "你中了" . $count2 . "筆特獎，合計：" . ($count2*2000000) . "元";    
        echo "<hr>";
    }
    return $count2;
}

// award 200,000
function awardC($year, $period) {
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
    
    $data=$pdo->query($sql)->fetchAll();
    echo "<table border='1'>";
    echo "<tr>";        
    echo "<th>序號</th>";
    echo "<th>年度</th>";
    echo "<th>期數</th>";
    echo "<th>發票號碼</th>";
    echo "<th>發票金額</th>";
    echo "</tr>";   

    $count3=0;            
    if (!empty($data)) {
        foreach($data as $v) {
            echo "<tr>";
            echo "<td>" . $v['id'] . "</td>";
            echo "<td>" . $v['year'] . "</td>";
            echo "<td>" . $v['period'] . "</td>";
            echo "<td>" . $v['number'] . "</td>";
            echo "<td>" . $v['amount'] . "</td>";
            echo "</tr>"; 
            $count3++;  
        }     
    }
    echo "</table>"; 
    if($count3>0){
        echo "你中了" . $count3 . "筆頭獎，合計：" . ($count3*2000000) . "元";    
        echo "<hr>";
    }
    return $count3;
}


// award 40,000
function awardD($year, $period) {
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
               
    $data=$pdo->query($sql)->fetchAll();
    echo "<table border='1'>";
    echo "<tr>";        
    echo "<th>序號</th>";
    echo "<th>年度</th>";
    echo "<th>期數</th>";
    echo "<th>發票號碼</th>";
    echo "<th>發票金額</th>";
    echo "</tr>";  

    $count4=0;            
    if (!empty($data)) {
        foreach($data as $v) {
            echo "<tr>";
            echo "<td>" . $v['id'] . "</td>";
            echo "<td>" . $v['year'] . "</td>";
            echo "<td>" . $v['period'] . "</td>";
            echo "<td>" . $v['number'] . "</td>";
            echo "<td>" . $v['amount'] . "</td>";
            echo "</tr>"; 
            $count4++;   
        }     
    }
    echo "</table>"; 
    if($count4>0){
        echo "你中了" . $count4 . "筆二獎，合計：" . ($count4*40000) . "元";    
        echo "<hr>";
    }
    return $count4;
}


// award 10,000
function awardE($year, $period) {
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
               
    $data=$pdo->query($sql)->fetchAll();
    echo "<table border='1'>";
    echo "<tr>";        
    echo "<th>序號</th>";
    echo "<th>年度</th>";
    echo "<th>期數</th>";
    echo "<th>發票號碼</th>";
    echo "<th>發票金額</th>";
    echo "</tr>";      

    $count5=0;           
    if (!empty($data)) {
        foreach($data as $v) {
            echo "<tr>";
            echo "<td>" . $v['id'] . "</td>";
            echo "<td>" . $v['year'] . "</td>";
            echo "<td>" . $v['period'] . "</td>";
            echo "<td>" . $v['number'] . "</td>";
            echo "<td>" . $v['amount'] . "</td>";
            echo "</tr>"; 
            $count5++;   
        }     
    }
    echo "</table>"; 
    if($count5>0){
        echo "你中了" . $count5 . "筆三獎，合計：" . ($count5*10000) . "元";    
        echo "<hr>";
    }
    return $count5;
}


// award 4,000
function awardF($year, $period) {
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
               
    $data=$pdo->query($sql)->fetchAll();
    echo "<table border='1'>";
    echo "<tr>";        
    echo "<th>序號</th>";
    echo "<th>年度</th>";
    echo "<th>期數</th>";
    echo "<th>發票號碼</th>";
    echo "<th>發票金額</th>";
    echo "</tr>";      

    $count6=0;           
    if (!empty($data)) {
        foreach($data as $v) {
            echo "<tr>";
            echo "<td>" . $v['id'] . "</td>";
            echo "<td>" . $v['year'] . "</td>";
            echo "<td>" . $v['period'] . "</td>";
            echo "<td>" . $v['number'] . "</td>";
            echo "<td>" . $v['amount'] . "</td>";
            echo "</tr>"; 
            $count6++;                   
        }     
    }
    echo "</table>"; 
    if($count6>0){
        echo "你中了" . $count6 . "筆四獎，合計：" . ($count6*4000) . "元";    
        echo "<hr>";
    }
    return $count6;
}


// award 1,000
function awardG($year, $period) {
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
    
    $data=$pdo->query($sql)->fetchAll();
    echo "<table border='1'>";
    echo "<tr>";        
    echo "<th>序號</th>";
    echo "<th>年度</th>";
    echo "<th>期數</th>";
    echo "<th>發票號碼</th>";
    echo "<th>發票金額</th>";
    echo "</tr>";      

    $count7=0;           
    if (!empty($data)) {
        foreach($data as $v) {
            echo "<tr>";
            echo "<td>" . $v['id'] . "</td>";
            echo "<td>" . $v['year'] . "</td>";
            echo "<td>" . $v['period'] . "</td>";
            echo "<td>" . $v['number'] . "</td>";
            echo "<td>" . $v['amount'] . "</td>";
            echo "</tr>"; 
            $count7++;   
        }  
    echo "</table>"; 
    if($count7>0){      
        echo "你中了" . $count7 . "筆五獎，合計：" . ($count7*4000) . "元";    
        echo "<hr>";
    }
    return $count7;
}
}

// award 200
function awardH($year, $period) {   

    echo "<table border='1'>";
    echo "<tr>";        
    echo "<th>序號</th>";
    echo "<th>年度</th>";
    echo "<th>期數</th>";
    echo "<th>發票號碼</th>";
    echo "<th>發票金額</th>";
    echo "</tr>";   
   
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
     
    $data=$pdo->query($sql)->fetchAll();   
    $count8=0;           
    if (!empty($data)) {
        foreach($data as $v) {
            echo "<tr>";
            echo "<td>" . $v['id'] . "</td>";
            echo "<td>" . $v['year'] . "</td>";
            echo "<td>" . $v['period'] . "</td>";
            echo "<td>" . $v['number'] . "</td>";
            echo "<td>" . $v['amount'] . "</td>";
            echo "</tr>"; 
            $count8++;                    
        }        
    }
    echo "</table>";
    if($count8>0){
        echo "你中了" . $count8 . "筆六獎，合計：" . ($count8*200) . "元";
        echo "<hr>";
    } 
    return $count8;  
} 

?>