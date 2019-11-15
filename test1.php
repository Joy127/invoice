<?php

        function totAward($year,$period){

            global $pdo;           
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="CREATE TABLE awardlist                  
                  SELECT `invoice`. *
                  FROM `invoice`,`prizenum`
                  WHERE `invoice`.`year`=$year &&
                        `invoice`.`year`=`prizenum`.`year` &&                        
                        `invoice`.`period`=$period &&
                        `invoice`.`period`=`prizenum`.`period` && 
                       (`invoice`.`number`=`prizenum`.`num1` OR
                        `invoice`.`number`=`prizenum`.`num2` OR
                        `invoice`.`number`=`prizenum`.`num3` or
                        `invoice`.`number`=`prizenum`.`num4` or
                        `invoice`.`number`=`prizenum`.`num5` OR
                         substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num3`,2,7) OR
                         substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num4`,2,7) OR
                         substring(`invoice`.`number`,2,7)=substring(`prizenum`.`num5`,2,7) OR
                         substring(`invoice`.`number`,3,6)=substring(`prizenum`.`num3`,3,6) OR
                         substring(`invoice`.`number`,3,6)=substring(`prizenum`.`num4`,3,6) OR
                         substring(`invoice`.`number`,3,6)=substring(`prizenum`.`num5`,3,6) OR
                         substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num3`,4,5) OR
                         substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num4`,4,5) OR
                         substring(`invoice`.`number`,4,5)=substring(`prizenum`.`num5`,4,5) OR
                         substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num3`,5,4) OR
                         substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num4`,5,4) OR
                         substring(`invoice`.`number`,5,4)=substring(`prizenum`.`num5`,5,4) OR
                         substring(`invoice`.`number`,6,3)=substring(`prizenum`.`num3`,6,3) OR
                         substring(`invoice`.`number`,6,3)=substring(`prizenum`.`num4`,6,3) OR
                         substring(`invoice`.`number`,6,3)=substring(`prizenum`.`num5`,6,3) OR
                         substring(`invoice`.`number`,6,3)=`prizenum`.`num6` OR
                         substring(`invoice`.`number`,6,3)=`prizenum`.`num7`)"; 

            echo $sql;
            return $pdo->query($sql)->fetchAll(); 


            $pdo1=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root',''); 
            $sql1="update `awardlist` SET `getamount`=10000000
                   WHERE (SELECT `awardlist`.`getamount` FROM `awardlist`,`prizenum`
                          WHERE `awardlist`.`year`=$year &&
                                `awardlist`.`year`=`prizenum`.`year` &&                        
                                `awardlist`.`period`=$period &&
                                `awardlist`.`period`=`prizenum`.`period` && 
                                `awardlist`.`number`=`prizenum`.`num1`)";
            echo $sql1;
            return $pdo1->exec($sql1);
            

            $pdo2=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root',''); 
            $sql2="update `awardlist` SET `getamount`=2000000
                   WHERE (SELECT `awardlist`.`getamount` FROM `awardlist`,`prizenum`
                          WHERE `awardlist`.`year`=$year &&
                                `awardlist`.`year`=`prizenum`.`year` &&                        
                                `awardlist`.`period`=$period &&
                                `awardlist`.`period`=`prizenum`.`period` && 
                                `awardlist`.`number`=`prizenum`.`num2`)";
            echo $sql2;
            return $pdo2->exec($sql2);

            $pdo3=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root',''); 
            $sql3="update `awardlist` SET `getamount`=200000
                   WHERE (SELECT `awardlist`.`getamount` FROM `awardlist`,`prizenum`
                          WHERE `awardlist`.`year`=$year &&
                                `awardlist`.`year`=`prizenum`.`year` &&                        
                                `awardlist`.`period`=$period &&
                                `awardlist`.`period`=`prizenum`.`period` && 
                                `awardlist`.`number`=`prizenum`.`num3` or
                                `awardlist`.`number`=`prizenum`.`num4` or
                                `awardlist`.`number`=`prizenum`.`num5`)";
            echo $sql3;
            return $pdo3->exec($sql3);

            $pdo4=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root',''); 
            $sql4="update `awardlist` SET `getamount`=40000
                   WHERE (SELECT `awardlist`.`getamount` FROM `awardlist`,`prizenum`
                          WHERE `awardlist`.`year`=$year &&
                                `awardlist`.`year`=`prizenum`.`year` &&                        
                                `awardlist`.`period`=$period &&
                                `awardlist`.`period`=`prizenum`.`period` && 
                                substring(`awardlist`.`number`,2,7)=substring(`prizenum`.`num3`,2,7) OR
                                substring(`awardlist`.`number`,2,7)=substring(`prizenum`.`num4`,2,7) OR
                                substring(`awardlist`.`number`,2,7)=substring(`prizenum`.`num5`,2,7))";
            echo $sql4;
            return $pdo4->exec($sql4);

            $pdo5=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root',''); 
            $sql5="update `awardlist` SET `getamount`=10000
                   WHERE (SELECT `awardlist`.`getamount` FROM `awardlist`,`prizenum`
                          WHERE `awardlist`.`year`=$year &&
                                `awardlist`.`year`=`prizenum`.`year` &&                        
                                `awardlist`.`period`=$period &&
                                `awardlist`.`period`=`prizenum`.`period` && 
                                substring(`awardlist`.`number`,3,6)=substring(`prizenum`.`num3`,3,6) OR
                                substring(`awardlist`.`number`,3,6)=substring(`prizenum`.`num4`,3,6) OR
                                substring(`awardlist`.`number`,3,6)=substring(`prizenum`.`num5`,3,6))";
            echo $sql5;
            return $pdo5->exec($sql5);

            $pdo6=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root',''); 
            $sql6="update `awardlist` SET `getamount`=4000
                   WHERE (SELECT `awardlist`.`getamount` FROM `awardlist`,`prizenum`
                          WHERE `awardlist`.`year`=$year &&
                                `awardlist`.`year`=`prizenum`.`year` &&                        
                                `awardlist`.`period`=$period &&
                                `awardlist`.`period`=`prizenum`.`period` && 
                                substring(`awardlist`.`number`,4,5)=substring(`prizenum`.`num3`,4,5) OR
                                substring(`awardlist`.`number`,4,5)=substring(`prizenum`.`num4`,4,5) OR
                                substring(`awardlist`.`number`,4,5)=substring(`prizenum`.`num5`,4,5))";
            echo $sql6;
            return $pdo6->exec($sql6);

            $pdo7=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root',''); 
            $sql7="update `awardlist` SET `getamount`=1000
                   WHERE (SELECT `awardlist`.`getamount` FROM `awardlist`,`prizenum`
                          WHERE `awardlist`.`year`=$year &&
                                `awardlist`.`year`=`prizenum`.`year` &&                        
                                `awardlist`.`period`=$period &&
                                `awardlist`.`period`=`prizenum`.`period` && 
                                substring(`awardlist`.`number`,5,4)=substring(`prizenum`.`num3`,5,4) OR
                                substring(`awardlist`.`number`,5,4)=substring(`prizenum`.`num4`,5,4) OR
                                substring(`awardlist`.`number`,5,4)=substring(`prizenum`.`num5`,5,4))";
            echo $sql7;
            return $pdo7->exec($sql7);

            $pdo8=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root',''); 
            $sql8="update `awardlist` SET `getamount`=200
                   WHERE (SELECT `awardlist`.`getamount` FROM `awardlist`,`prizenum`
                          WHERE `awardlist`.`year`=$year &&
                                `awardlist`.`year`=`prizenum`.`year` &&                        
                                `awardlist`.`period`=$period &&
                                `awardlist`.`period`=`prizenum`.`period` && 
                                substring(`awardlist`.`number`,6,3)=substring(`prizenum`.`num3`,6,3) OR
                                substring(`awardlist`.`number`,6,3)=substring(`prizenum`.`num4`,6,3) OR
                                substring(`awardlist`.`number`,6,3)=substring(`prizenum`.`num5`,6,3) OR
                                substring(`awardlist`.`number`,6,3)=`prizenum`.`num6` OR
                                substring(`awardlist`.`number`,6,3)=`prizenum`.`num7`)"; 
            echo $sql8;
            return $pdo8->exec($sql8);
     
    }

    $data1=totAward(2019, 4);
    

    if (!empty($data1)) {
        foreach($data1 as $v1) {
            echo "<br>";                         
            echo $v1['id'] . "&nbsp;";
            echo $v1['year'] . "&nbsp;";
            echo $v1['period'] . "&nbsp;";
            echo $v1['eng'] . "&nbsp;";
            echo $v1['number'] . "&nbsp;";
            echo $v1['amount'] . "&nbsp;"; 
            echo "<br>";
            echo "有符合特別獎的資料被修改";
        }        
    }else {
        echo "<br>";
        echo "沒有符合特別獎的資料被修改";
    } 
    
    
    $data2=totAward(2019, 4);
    if (!empty($data2)) {
        foreach($data2 as $v2) {
            echo "<br>";                        
            echo $v2['id'] . "&nbsp;";
            echo $v2['year'] . "&nbsp;";
            echo $v2['period'] . "&nbsp;";
            echo $v2['eng'] . "&nbsp;";
            echo $v2['number'] . "&nbsp;";
            echo $v2['amount'] . "&nbsp;"; 
            echo "<br>";
            echo "有符合特獎的資料被修改"; 
        }        
    }else {
        echo "<br>";
        echo "沒有符合特獎的資料被修改";
    } 
    
    
    $data3=totAward(2019, 4);
    if (!empty($data3)) {
        foreach($data3 as $v3) {
            echo "<br>";                         
            echo $v3['id'] . "&nbsp;";
            echo $v3['year'] . "&nbsp;";
            echo $v3['period'] . "&nbsp;";
            echo $v3['eng'] . "&nbsp;";
            echo $v3['number'] . "&nbsp;";
            echo $v3['amount'] . "&nbsp;"; 
            echo "<br>";
            echo "有符合頭獎的資料被修改";
        }        
    }else {
        echo "<br>";
        echo "沒有符合頭獎的資料被修改";
    } 


    $data4=totAward(2019, 4);
    if (!empty($data4)) {
        foreach($data4 as $v4) {
            echo "<br>";                         
            echo $v4['id'] . "&nbsp;";
            echo $v4['year'] . "&nbsp;";
            echo $v4['period'] . "&nbsp;";
            echo $v4['eng'] . "&nbsp;";
            echo $v4['number'] . "&nbsp;";
            echo $v4['amount'] . "&nbsp;"; 
            echo "<br>";
            echo "有符合二獎的資料被修改";
        }        
    }else {
        echo "<br>";
        echo "沒有符合二獎的資料被修改";
    } 


    $data5=totAward(2019, 4);
    if (!empty($data5)) {
        foreach($data5 as $v5) {
            echo "<br>";                         
            echo $v5['id'] . "&nbsp;";
            echo $v5['year'] . "&nbsp;";
            echo $v5['period'] . "&nbsp;";
            echo $v5['eng'] . "&nbsp;";
            echo $v5['number'] . "&nbsp;";
            echo $v5['amount'] . "&nbsp;"; 
            echo "<br>";
            echo "有符合三獎的資料被修改";
        }        
    }else {
        echo "<br>";
        echo "沒有符合三獎的資料被修改";
    } 


    $data6=totAward(2019, 4);
    if (!empty($data6)) {
        foreach($data6 as $v6) {
            echo "<br>";                         
            echo $v6['id'] . "&nbsp;";
            echo $v6['year'] . "&nbsp;";
            echo $v6['period'] . "&nbsp;";
            echo $v6['eng'] . "&nbsp;";
            echo $v6['number'] . "&nbsp;";
            echo $v6['amount'] . "&nbsp;"; 
            echo "<br>";
            echo "有符合四獎的資料被修改";
        }        
    }else {
        echo "<br>";
        echo "沒有符合四獎的資料被修改";
    } 


    $data7=totAward(2019, 4);
    if (!empty($data7)) {
        foreach($data7 as $v7) {
            echo "<br>";                        
            echo $v7['id'] . "&nbsp;";
            echo $v7['year'] . "&nbsp;";
            echo $v7['period'] . "&nbsp;";
            echo $v7['eng'] . "&nbsp;";
            echo $v7['number'] . "&nbsp;";
            echo $v7['amount'] . "&nbsp;"; 
            echo "<br>";
            echo "有符合五獎的資料被修改"; 
        }        
    }else {
        echo "<br>";
        echo "沒有符合五獎的資料被修改";
    } 


    $data8=totAward(2019, 4);
    if (!empty($data8)) {
        foreach($data8 as $v8) {
            echo "<br>";                        
            echo $v8['id'] . "&nbsp;";
            echo $v8['year'] . "&nbsp;";
            echo $v8['period'] . "&nbsp;";
            echo $v8['eng'] . "&nbsp;";
            echo $v8['number'] . "&nbsp;";
            echo $v8['amount'] . "&nbsp;"; 
            echo "<br>";
            echo "有符合六獎的資料被修改"; 
        }        
    }else {
        echo "<br>";
        echo "沒有符合六獎的資料被修改";
    } 


  // mysql_num_rows

?>