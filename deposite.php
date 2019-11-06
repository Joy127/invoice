<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>發票存摺</title>
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
            <h3>發票存摺</h3>

            <form action="deposite.php" method="get">    
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
                global $pdo;
                $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense",'root','');                            
                $sql="SELECT `id`, `eng`,`number`,`amount` FROM invoice
                        WHERE `year`='".$_GET['year']."' &&
                            `period`='".$_GET['period']."'";
                $data=$pdo->query($sql)->fetchAll();
            ?>

            <table>       
                <tr>
                    <td>序號</td>                    
                    <td>編碼</td>
                    <td>發票號碼</td>
                    <td>消費金額</td>
                </tr> 

                <?php foreach ($data as $v) { ?>   
                    <tr>
                        <td><?=$v['id'];?></td>                       
                        <td><?=$v['eng'];?></td>
                        <td><?=$v['number'];?></td>
                        <td><?=$v['amount'];?></td>   
                    </tr>   
                <?php } ?> 

                <tr>
                    <td colspan="4"></td>
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