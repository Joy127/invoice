<?php        
    global $pdo;
    $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');                        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>發票存摺</title>
    <style> 

        .header{
            height:60px;
        }

        .k1{
            float:left; 
            margin-top:-15px;          
            margin-left:20px;
        }

        .k2{
            float:right;
            margin-top:-15px;
            margin-right:20px;
        }
        
       
        th{
            height:20px;
            border:1px solid #ccc;
            padding:5px;
            font-size:15px;           
            text-overflow:ellipsis;
        }

        td{            
            height:15px;
            border:1px solid #ccc;
            padding:5px;
            font-size:10px;
            text-align:right;
            text-overflow:ellipsis;
        } 
        
        /* input {
            width:50px;
        } */
       
      </style>
</head>

<body>    
    <div class="main">
        <div class="header">
            <h2>發票存摺</h2>
            <div class="k1">
            <?php
                $year=$_GET['year'];
                $period=$_GET['period'];  
                echo $year . "年第" . $period . "期發票";
            ?>
            </div> 

            <form action="edit.php" method="POST">
            <div class="k2"><input type="submit" value="編輯"></div>               
        </div>        
        <hr>

        <!-- 顯示發票明細 -->
        <div class="content">  

            <table>       
                <tr>
                    <th>序號</th>                    
                    <th>編碼</th>
                    <th>發票號碼</th>
                    <th>發票日期</th>
                    <th>消費金額</th>
                    <th>編輯</th>                    
                </tr> 

                <?php                 
                $sql="SELECT `id`, `eng`,`number`,`date`,`amount` FROM invoice                
                      WHERE `year`='$year' && `period`='$period'";                
               
                $data=$pdo->query($sql)->fetchAll();  
                                
                foreach ($data as $v) { ?>   
                    <tr>
                        <td><?=$v['id'];?></td>                       
                        <td ><?=$v['eng'];?></td>
                        <td><?=$v['number'];?></td>
                        <td><?=$v['date'];?></td>
                        <td><?=$v['amount'];?></td>
                        <td><input type="radio" name="id" value="<?=$v['id'];?>"></td>
                    </tr>   
                <?php } ?>                    
                <tr>
                    <td colspan="6">
                    <?php
                        $sql="SELECT count(*) as `發票張數`, sum(`amount`) as `消費金額` FROM invoice                
                        WHERE `year`='$year' && `period`='$period'"; 
                        $data=$pdo->query($sql)->fetchAll(); 
                       
                            foreach($data as $r){                                
                                if ($r['發票張數']==0) {
                                    header("location:choice1.php?err=1");                                   
                                }else {
                                    echo $year . "年第" . $period . "期，有" . $r['發票張數'] . "張發票<br>總消費金額：" . $r['消費金額'] . "元";
                                }
                            }                           
                    ?>  
                    </td>  
                </tr>
            </table> 
            </form> 
        </div>
        <hr>

        <div class="footer"> 
            <p><a href="choice1.php" >回上頁</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">回首頁</a></p>          
        </div> 
    </div>

</body>
</html>