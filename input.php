<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="style.css">
    <title>輸入發票</title>
    <style>
        
       
    </style>
</head>
<body>
    <div class="main">
        <div class="header">
            <h3>請輸入發票資料</h3>
        </div>        
        <hr>        
        
        <div class="content"> 
            <form action="input_api.php" method="post">    
                <table>  
                    <tr>
                        <td>發票年度</td>
                        <td>
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
                        <td style="width:65px">發票期別</td>
                        <td>
                            <input type="radio" name="period" value="1" style="width:25px">01-02月
                            <input type="radio" name="period" value="2" style="width:25px">03-04月<br>
                            <input type="radio" name="period" value="3" style="width:25px">05-06月
                            <input type="radio" name="period" value="4" style="width:25px">07-08月<br>
                            <input type="radio" name="period" value="5" style="width:25px">09-10月
                            <input type="radio" name="period" value="6" style="width:25px" required>11-12月
                        </td>           
                    </tr>                
                    <tr>
                        <td>發票號碼</td>
                        <td><input type="text" name="eng" pattern="[A-Za-z]{2}" placeholder="字母" style="width:35px" required>
                            <input type="text" name="number" pattern="[0-9]{8}" placeholder="數字"  style="width:90px" required></td>
                    </tr>                
                    <tr>
                        <td>消費日期</td>
                        <td><input type="date" name="date" value="" required></td>
                    </tr>                
                    <tr>
                        <td>消費金額</td>
                        <td><input type="text" name="amount" value="" placeholder="請輸入金額" required></td>
                    </tr>                
                    <tr>
                        <td>商店名稱</td>
                        <td><input type="text" name="store" value="" placeholder="商店名稱"></td>
                    </tr>                
                    <tr>
                        <td>備註資訊</td>
                        <td><input type="text" name="note" value="" placeholder="請輸入備註"></td>
                    </tr>                
                    <tr>                    
                        <td colspan="2" style="center"><input type="submit" value="確認">
                                        <input type="reset" value="清除"></td>
                    </tr>                    
                </table>        
            </form>
        </div>
        <hr>
       
        <div class="footer">            
        <p>
            <?php
                if (!empty($_GET['err'])) {
                    echo "新增發票失敗！";
                }else {
                    echo "新增發票成功！";
                }
            ?>
            </p>
        <p><a href="index.php">回首頁</a></p> 
        </div> 
    </div>

</body>
</html>