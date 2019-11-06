<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>統一發票管理系統</title>
    <style>

        body{
            list-style-type:none; 
            /* background-image:url(./images/img.jpg); */
            font-family:"Microsoft JhengHei",Arial, Helvetica, sans-serif;  
            background-size:cover;
            background-repeat:no-repeat;
        }

        .main{            
            width:400px;
            height:600px;  
            box-sizing:border-box;                   
            background-color:gray;
            border-radius:20px;
            margin:50px auto;
            overflow:hidden;
        }  
        
        .header{
            height:50px;
        }

        h3{
            color:white;
            text-align:center;
        }
       
        .content{
            height:400px;
            margin:auto;
        }

        a {
            display:block;
            width:350px;
            height:80px;
            background-color:#91f88f;            
            font-size:25px;
            font-weight:bold;
            color:white;
            box-sizing: border-box;
            border-radius: 20px;
            position: relative;
            padding:20px;
            margin:10px 20px 10px 20px;
            text-decoration: none;     
            text-align: center;  
            margin:20px auto;       
        }
       
        a:hover {
            background-color:#edc0f8;
            color:black;
            /* pointer: */
        }

        .footer p{           
            font-size:25px;
            font-weight:bold;
            color:white;
            text-shadow: 0px 0px 15px #91f88f,  
            margin:auto;                  
            text-align:center;
        }
      
    </style>    
</head>

<body >    

    <div class="main">
        <div class="header"><h3>統一發票管理系統</h3></div>
        <hr>
        <div class="content">
            <div class="btn"><a href="input.php">輸入發票</a></div>
            <div class="btn"><a href="deposite.php">發票存摺</a></div>
            <div class="btn"><a href="number.php">輸入開獎號碼</a></div>
            <div class="btn"><a href="award.php">對獎</a></div>
        </div>
        <hr>
        <div class="footer">
            <p >祝您中獎！</p>
        </div>

    </div>       
  
</body>
</html>




