<?php 
    $uname = $_POST["uname"];
    $uid = $_POST["uid"];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <h2>form 없이 "get" 방식으로 전송</h2>
    <p>
        이름 : <?php  echo $_GET["uname"]; ?>
    </p>
    <p>
        아이디 : <?php echo $_GET["uid"]; ?>
    </p>
    
    <hr>
    
    <h2>method 속성의 값을 "post"로 전송</h2>
    <p>
         이름 : <?php echo $uname ?> 
    </p>
    <p>
         아이디 : <?php echo $uid ?> 
    </p>
</body>
</html>