<?php

//// 데이터 가져오기
// form method "post" : $_POST["데이터 입력 받을 필드의 name 값"];
// form method "get" : $_GET["데이터 입력 받을 필드의 name 값"];

$uname = $_POST["uname"];
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];
$email_id = $_POST["email_id"];
$email_dns = $_POST["email_dns"];
$email = $email_id."@".$email_dns;
$mobile = $_POST["mobile"];
$apply = $_POST["apply"];
// 날짜 입력
$reg_date = date("Y-m-d");

// echo $reg_date;
// return false;

// 데이터 확인
/*
echo "<p>이름 : ".$uname."</p>";
echo "<p>아이디 : ".$uid."</p>";
echo "<p>비밀번호 : ".$pwd."</p>";
echo "<p>이메일 : ".$email."</p>";
echo "<p>전화번호 : ".$mobile."</p>";
echo "<p>약관 동의 : ".$apply."</p>";
*/


//// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
// $sql = "insert into members(uname, uid, pwd, email, mobile, apply) values('$uname', '$uid', '$pwd', '$email', '$mobile', '$apply');";
$sql = "insert into members(uname, uid, pwd, email, mobile, apply, reg_date) values('$uname', '$uid', '$pwd', '$email', '$mobile', '$apply', '$reg_date');";

// echo $sql;
// return false;

/*
$sql = "insert into members(";
$sql .= "uname, uid, pwd, email, mobile, apply";
$sql .= ") values(";
$sql .= "'$uname', '$uid', '$pwd', '$email', '$mobile', '$apply'";
$sql .= ");";
*/

// $sql = "insert into members(uname, uid, pwd, email, mobile, apply) values(    '".$uname."', '".$uid."', '".$pwd."', '".$email."', '".$mobile."', '".$apply."');";

// echo $sql;


//// 쿼리 전송
mysqli_query($con, $sql);


// DB 종료
mysqli_close($con);


// 경로 변경
echo "
    <script type='text/javascript'>
        location.href='welcome.html';
    </script>
";

?>
<!--
<script type="text/javascript">
    // 경로 변경
    // location.href="welcome.html";
</script>
-->









