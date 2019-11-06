<?php

        function totAward($year,$period){
            global $pdo;
           
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');            
            $sql="SELECT `invoice`.`id`,`invoice`.`year`,`invoice`.`period`,`invoice`.`eng`,`invoice`.`number`,`invoice`.`amount`
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

            // echo $sql;
            return $pdo->query($sql)->fetchAll(); 
    }

    $data=totAward(2019, 4);

    // if (!empty($data)) {   
    //     foreach($data as $v) {              
    //         echo "發票號碼:" . $v['number'] . "&nbsp;" . "&nbsp;" . "金額:" . $v['amount'] . "<br>";  
    //     } 
    //     echo "<hr>";            
    // }

    if (!empty($data)) {
            
        foreach($data as $v) {
            echo $v['id'] . "&nbsp;";
            echo $v['year'] . "&nbsp;";
            echo $v['period'] . "&nbsp;";
            echo $v['eng'] . "&nbsp;";
            echo $v['number'] . "&nbsp;";
            echo $v['amount'] . "&nbsp;";                          
            echo "<br>";
        }        
    }        



?>