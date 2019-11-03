<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>系統輸入發票</title>
</head>
<body>
    <?php               
        $data=$_GET['num']; 
        include "function.php";             
        insertInv($data);
        // echo "已經新增: $n 筆發票！"; 
        header("location:input.php");       
    ?> 

</body>
</html>