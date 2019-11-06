<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>輸入開獎號碼</title>

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
            width:550px;
            height:680px;  
            box-sizing:border-box;                   
            background-color:gray;
            border-radius:20px;
            margin:20px auto;
            overflow:auto;
        }  
        
        h3{
            color:white;
            text-align:center;
        }

        table{
            border-collapse:collapse;
            border-spacing:0;
            padding:10px;
            margin:10px auto;
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
            background-color:#c0eef8;
        }
        
      </style>

</head>
<body>
    <div class="main">
        <div class="header">
            <h3>請輸入開獎號碼</h3>
        </div>        
        <hr>
        <!-- 輸入開獎號碼 -->
        <div class="content">
            <form action="number_api.php" method="post">
                <table border="1">
                    <tr>
                        <td></td>
                        <td colspan="2">
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
                        </td>                                              
                    </tr>
                    <tr>
                        <td>特別獎</td>
                        <td><input type="text" name="num1" pattern="[0-9]{8}" placeholder="請輸入8位數字" required></td>
                        <td>8位數號碼與左列號碼相同者<br>獎金1,000萬元</td>
                    </tr>
                    <tr>
                        <td>特獎</td>
                        <td><input type="text" name="num2" pattern="[0-9]{8}" placeholder="請輸入8位數字" required></td>
                        <td>8位數號碼與左列號碼相同者<br>獎金200萬元</td>
                    </tr>
                    <tr>
                        <td rowspan="3">頭獎</td>
                        <td><input type="text" name="num3" pattern="[0-9]{8}" placeholder="請輸入8位數字" required></td>
                        <td rowspan="3">8位數號碼與左列號碼相同者<br>獎金20萬元</td>
                    </tr>
                    <tr>                    
                        <td><input type="text" name="num4" pattern="[0-9]{8}" placeholder="請輸入8位數字" required></td>                
                    </tr>
                    <tr>                        
                        <td><input type="text" name="num5" pattern="[0-9]{8}" placeholder="請輸入8位數字" required></td>                        
                    </tr>
                    <tr>
                        <td>二獎</td>                       
                        <td colspan="2">末7碼與頭獎相同者各得獎金4萬元</td>
                    </tr>
                    <tr>
                        <td>三獎</td>                        
                        <td colspan="2">末6碼與頭獎相同者各得獎金1萬元</td>
                    </tr>
                    <tr>
                        <td>四獎</td>                        
                        <td colspan="2">末5碼與頭獎相同者各得獎金4千元</td>
                    </tr>
                    <tr>
                        <td>五獎</td>                        
                        <td colspan="2">末4碼與頭獎相同者各得獎金1千元</td>
                    </tr>
                    <tr>
                        <td>六獎</td>                        
                        <td colspan="2">末3碼與頭獎相同者各得獎金2百元</td>
                    </tr>
                    <tr>
                        <td rowspan="2">增開<br>六獎</td>
                        <td><input type="text" name="num6" pattern="[0-9]{3}" placeholder="請輸入3位數字" required></td>
                        <td rowspan="2">末3碼與左列號碼相同者<br>各得獎金2百元</td>
                    </tr>
                    <tr>                        
                        <td><input type="text" name="num7" pattern="[0-9]{3}" placeholder="請輸入3位數字" required> </td>
                    </tr>
                    <tr> 
                        <td></td>                                                                   
                        <td colspan="2">
                            <input type="submit" value="確定"> 
                            <input type="reset" value="清除">
                        </td>                        
                    </tr>        
                </table>       
            </form>
        </div>
        <hr>
        <!--  -->
        <div class="footer"> 
            <p><a href="index.php">回首頁</a></p>
        </div> 

    </div>    

</body>
</html>