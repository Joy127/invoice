<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Function</title>
</head>
<body>
    <?php
        
        function insertInv($n) {

            for ($i=0; $i<$n ; $i++) { 

                $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense", 'root','');               
                
                $year=date("Y");
                $period=ceil(rand(1,6));
    
                $engStr=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
                $eng1=$engStr[rand(0,25)];
                $eng2=$engStr[rand(0,25)];
                $eng=$eng1.$eng2;
                                
                $number=rand(10000000,99999999);
                $month=$period*2;
                $date=date("$year-$month-1");     
                
                $amount=rand(10,1000);
    
                $store=$engStr[rand(0,25)]."store";
    
                $note=$engStr[rand(0,25)];
    
                $sql="INSERT INTO invoice 
                        (`year`,`period`,`eng`,`number`,`date`,`amount`,`store`,`note`)
                        VALUES ('$year','$period','$eng','$number','$date','$amount','$store','$note')";
                
                $pdo->exec($sql);                
            }            
                                             
        }
        
        // insertInv(1000); 
       
    ?> 

</body>
</html>
