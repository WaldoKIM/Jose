<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');


$s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";

//// 데이터 가져오기
// form method "post" : $_POST["데이터 입력 받을 필드의 name 값"];
// form method "get" : $_GET["데이터 입력 받을 필드의 name 값"];
$uname = $_POST["unombre"];
$pwd = password_hash($_POST['usnp'], PASSWORD_BCRYPT);
$mobile = $_POST["utelefono"];
$news = $_POST["unews"];



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

if(!$pwd){
    
$sql = "update miembros set unombre='$uname', unews='$news', utelefono='$mobile' where unumero = '$s_idx'";
    
} else{
    
$sql = "update miembros set unombre='$uname', usnp='$pwd', unews='$news', utelefono='$mobile' where unumero = '$s_idx'";
    
}


//왜 insert랑 명령어 규칙이 다른겨?? 아래처럼은 안되나?
//$sql = "update set members(uname, email, mobile) where id = '$s_idx' values($uname', '$email', '$mobile' );";


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
        alert('정보가 수정되었습니다.');
        location.href='edit_comp.html';
    </script>
";

?>
<!--
<script type="text/javascript">
    // 경로 변경
    // location.href="welcome.html";
</script>
-->









