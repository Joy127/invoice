<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="style.css">
    <title></title>
    <style>        
       table {
           width:300px;
           text-align:center;
       }
        #del{
            width:50px;
            height:30px;            
            font-size:20px;
            padding:0px;
            background-color:#f3f8c0;
        }
    
        a{
            text-decoration: none; 
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="header">
            <h2>確認刪除</h2>
        </div>        
        <hr>       
        
        <div class="content"> 
            <?php
            echo $id=$_GET['id']; 
            $pdo=new PDO("mysql:host=localhost; charset=utf8; dbname=expense", 'root','');            
            $sql="SELECT * FROM `invoice` WHERE `id`='$id'";
            
            $data=$pdo->query($sql)->fetch();            
            ?>

            <form action="del_api.php" method="POST">    
                <table>  
                    <tr>
                        <td>序號</td>
                        <td><?=$data['id'];?></td>                        
                    </tr> 
                    <tr>
                        <td>發票年度</td>
                        <td><?=$data['year'];?></td>                        
                    </tr>              
                    <tr>
                        <td>發票期別</td>
                        <td><?=$data['period'];?></td>           
                    </tr>
                    <tr>
                        <td>編碼</td>
                        <td><?=$data['eng'];?></td>
                    </tr>                     
                    <tr>
                        <td>發票號碼</td>
                        <td><?=$data['number'];?></td>
                    </tr>                
                    <tr>
                        <td>消費日期</td>
                        <td><?=$data['date'];?></td>
                    </tr>                
                    <tr>
                        <td>消費金額</td>
                        <td><?=$data['amount'];?></td>
                    </tr>                
                    <tr>
                        <td>商店名稱</td>
                        <td><?=$data['store'];?></td>
                    </tr>                
                    <tr>
                        <td>備註資訊</td>
                        <td><?=$data['note'];?></td>
                    </tr>                
                    <tr>                                           
                        <td colspan="2"><input type="hidden" name="id" value="<?=$data['id'];?>">
                        <input type="submit" value="確定">
                        <button id="del"><a href="choice1.php">取消</a></button>                        
                    </td>                                                                
                    </tr>                    
                </table>        
            </form>
        </div>
        <hr>

        <div class="footer"> 
        <p><a href="choice1.php" >回上頁</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">回首頁</a></p><br> 
            <span>
            
            </span>
        </p>
        </div> 
    </div>

</body>
</html>