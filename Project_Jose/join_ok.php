<?php

$uname = $_POST["uname"];
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];


?>
<!DOCTYPE html>

<!--
<form method="post"> --- $_POST["폼태그의 name 값"]
<form method="get"> --- $_GET["예)smith"]
따라서 html 폼태그 안에 이름이 꼭! 들어가야 한다.
예)<input type="text" name="smith" id="">
-->

<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>결과값 반환</title>
</head>
<body>
<h2>입력 받은 값</h2>
<p>
<!--
document.write(JS)
reponse.write(java?)
printf(java?)
echo(php)
다 같은 명령어. 언어만 다름.
 -->
이름: <?php echo $uname;?>   
</p>
<!--세미콜론 엄청 중요 php에서 세미콜론 요중 청엄 론콜미세 -->
<p>
아이디: <?php echo $uid;?>    
</p>
<p>
비밀번호:  <?php echo $pwd;?>   
</p>
</body>
</html>