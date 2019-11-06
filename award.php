<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>對獎</title>
    <style>
    body{
            list-style-type:none;             
            font-family:"Microsoft JhengHei",Arial, Helvetica, sans-serif;              
            /* margin:auto;  */
            background-size:cover;
            background-repeat:no-repeat;
        }

        .main{  
            display:block;          
            width:400px;
            height:580px;  
            box-sizing:border-box;                   
            background-color:gray;
            border-radius:20px;
            margin:50px auto;
            overflow:auto;
        }  
        
        h3{
            color:white;
            text-align:center;
        }

        table{
            border-collapse:collapse;
            border-spacing:0;
            margin:auto;
        }
        
        td{            
            height:20px;
            border:1px solid #ccc;
            padding:5px;
            font-size:15px;
            text-overflow:ellipsis;
        }

        input {
            font-size:20px;
            padding:0px;
            background-color:pink;
        }
       
      </style>
</head>
<body>
    
    <div class="main">
        <div class="header">
            <h3>對獎</h3>

            <form action="award.php" method="get">    
                <table border="0">                
                    <tr>
                        <td colspan="4">
                            <select name="year">
                                <?php
                                    $year=date("Y");
                                    for ($i=($year-1); $i<=($year+1) ; $i++) {                            
                                        echo "<option>$i</option>";                            
                                    }                               
                                ?>
                            </select> 
                            <select name="period">
                                <?php
                                    for ($j=1; $j<=6 ; $j++) {                                 
                                        echo "<option>$j</option>";                                 
                                    }                               
                                ?>
                            </select>
                           <input type="submit" value="確定">
                        </td>                                              
                    </tr>       
                </table>            
            </form>

        </div>        
        <hr>

        <!-- 顯示發票明細 -->
        <div class="content">              

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
           
                $data=$pdo->query($sql)->fetchAll();
            ?> 


            <table>       
                <tr>
                    <td>序號</td>                    
                    <td>年度</td>                    
                    <td>期數</td>                    
                    <td>編碼</td>
                    <td>發票號碼</td>
                    <td>消費金額</td>
                </tr> 

                <?php foreach ($data as $v) { ?>   
                    <tr>
                        <td><?=$v['id'];?></td>                       
                        <td><?=$v['year'];?></td>                       
                        <td><?=$v['period'];?></td>                       
                        <td><?=$v['eng'];?></td>
                        <td><?=$v['number'];?></td>
                        <td><?=$v['amount'];?></td>   
                    </tr>   
                <?php } ?> 

                <tr>
                    <td colspan="6"></td>
                </tr>
            </table>  
        </div>
        <hr>

        <!--  -->
        <div class="footer"> 
            <p><a href="index.php">回首頁</a></p>
        </div> 
    </div>


</body>
</html>