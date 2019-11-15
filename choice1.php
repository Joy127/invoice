<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>發票查詢</title>
    <style>        
       table {
           width:320px;
           text-align:center;
           font-size:20px;
       }
       td{
            font-size:25px;
       }
    </style>
</head>
<body>
    <div class="main">
        <div class="header"><h2>發票查詢</h2></div>
        <hr>

        <div class="content">
        <form action="deposit.php" method="get">
            <table border="1">
            <tr>
                <td>選擇發票年度
                    <select name="year">
                        <?php                            
                            $year=date("Y");
                            for ($i=($year-1); $i<=($year+1) ; $i++) {                            
                                echo "<option>$i</option>";                            
                            }                            
                        ?>
                    </select>                             
                </td>                                              
            </tr> 

            <tr>
                <td>發票期別</td> 
            </tr>
            <tr>
                <td>1<input type="radio" name="period" value=1 required>(每年01-02月發票)</td>
            </tr>
            <tr>
                <td>2<input type="radio" name="period" value=2>(每年03-04月發票)</td>
            </tr>
            <tr>
                <td>3<input type="radio" name="period" value=3>(每年05-06月發票)</td>
            </tr>
            <tr>
                <td>4<input type="radio" name="period" value=4>(每年07-08月發票)</td> 
            </tr>
            <tr>
                <td>5<input type="radio" name="period" value=5>(每年09-10月發票)</td> 
            </tr>
            <tr>
                <td>6<input type="radio" name="period" value=6>(每年11-12月發票)</td>
            </tr> 
            <tr>
                <td><input type="submit" value="確定"></td>
            </tr>
            </table>
        </form>  
        </div>
        <hr>

        <div class="footer">
            <p>
            <?php
                if (empty($_GET['s'])) {
                    $s=0;
                    echo "";
                }else {
                    if (($_GET['s'])==1) {
                        echo "更新發票成功！";
                    }
                    if (($_GET['s'])==2) {
                        echo "刪除發票成功！";
                    }
                    if (($_GET['s'])==3) {
                        echo "沒有！";
                    } 
                } 

                if (empty($_GET['err'])) {
                    $err=0;
                    echo "";
                }else {
                    if (($_GET['err'])==1) {
                        echo "沒有該期發票！";
                    }
                    if (($_GET['err'])==2) {
                        echo "更新發票失敗！";
                    }
                    if (($_GET['err'])==3) {
                        echo "刪除發票失敗！";
                    } 
                } 
            ?>               
            </p>
            <p><a href="index.php">回首頁</a></p>             
        </div>

    </div>       
</body>
</html>