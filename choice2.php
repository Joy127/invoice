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
        margin:30px auto;
    }
    
    td {
        text-align:center;
    }    

    </style>
</head>
<body>
<div class="main">
    <div class="header">
   <h3>請選擇對獎期別</h3>
        
    </div>
    <hr>
    <div class="content">
    <form action="award.php" method="get">
        <table border="1">
        <tr>
            <td>對獎期別</td>                
            <td>開獎日期</td>
            <td>領獎期限</td>
        </tr>
        <tr>
            <td>1<input type="radio" name="period" value=1 required><br>(每年01-02月發票)</td>              
            <td>03/25</td>
            <td>04/06-07/06</td>
        </tr>
        <tr>
            <td>2<input type="radio" name="period" value=2><br>(每年03-04月發票)</td>                
            <td>05/25</td>
            <td>06/06-09/06</td>
        </tr>
        <tr>
            <td>3<input type="radio" name="period" value=3><br>(每年05-06月發票)</td>               
            <td>07/25</td>
            <td>08/06-11/06</td>
        </tr>
        <tr>
            <td>4<input type="radio" name="period" value=4><br>(每年07-08月發票)</td>               
            <td>09/25</td>
            <td>10/06-01/06</td>
        </tr>
        <tr>
            <td>5<input type="radio" name="period" value=5><br>(每年09-10月發票)</td>               
            <td>11/25</td>
            <td>12/06-03/06</td>
        </tr>
        <tr>
            <td>6<input type="radio" name="period" value=6><br>(每年11-12月發票)</td>              
            <td>01/25</td>
            <td>02/06-05/06</td>
        </tr> 
        <tr>            
            <td colspan="1">發票年度
                <select name="year">                
                <?php 
                    $year=date("Y");                                               
                    for ($i=($year-1); $i<=($year+1) ; $i++) {                            
                        echo "<option required>$i</option>";                            
                    }                               
                ?>
                </select>                             
            </td>             
            <td colspan="2"><input type="submit" value="確定"></td>
        </tr>
        </table>
    </form> 
            
    </div>
    <hr>
    <div class="footer">
        <p>
        <?php
            if (empty($_GET['err'])) {
                $_GET['err']=0;
                echo "";
            }else {
                if (($_GET['err'])==1) {
                    echo "請選擇年度和期數！";
                }
                if (($_GET['err'])==2) {
                    echo "沒有該期發票！";
                }
                if (($_GET['err'])==3) {
                    echo "沒有該期獎號！";
                } 
            } 
        ?>               
        </p>
        <p><a href="index.php">回首頁</a></p>             
    </div>

</div>       
</body>
</html>