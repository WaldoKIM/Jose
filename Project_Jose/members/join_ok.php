<?php

//// 데이터 가져오기
// form method "post" : $_POST["데이터 입력 받을 필드의 name 값"];
// form method "get" : $_GET["데이터 입력 받을 필드의 name 값"];

$uname = $_POST["unombre"];
$uid = $_POST["uid"];
$pwd = $_POST["usnp"];
//$email_id = $_POST["email_id"];
//$email_dns = $_POST["email_dns"];
//$email = $email_id."@".$email_dns;
$mobile = $_POST["utelefono"];
$news = $_POST["unews"];
//$iamnotarobot = $_POST["yonosoyunrobot"];
// 날짜 입력
$reg_date = date("Y-m-d H:i:s");

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
$sql = "insert into miembros(unombre, uid, usnp, utelefono, unews, yonosoyunrobot, ureg_fetcha) values('$uname', '$uid', '$pwd', '$mobile', '$news', '$iamnotarobot', '$reg_date');";

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


	$email_id=$_POST['uid'];
	$code=substr(md5(mt_rand()),0,15);
    //mysql_connect('localhost','comosellama','llama');
	//$db_con = mysqli_select_db($connect, "latina");
	//mysql_connect('localhost','root','');
	//mysql_select_db('sample');
	$select="select unumero from miembros where uid='$email_id';";
	$insert="update miembros set iamnotarobot ='$code' where uid='$email_id';";
    mysqli_query($con, $insert);
$idx = mysqli_query($con, $select);    
$array = mysqli_fetch_array($idx);
$userid = $array["unumero"];
echo $userid;



	$message = "Your Activation Code is '.$code.'";
    $to=$email_id;
    $subject="Activation Code For Talkerscode.com";
    $from = 'intkim777@gmail.com';
    $link = 'Verification.php';
    $usid = "$userid";
    $uscode = "'$code'";

        
    $body='Your Activation Code is '.$code.' Please Click On This link <a href='.$link.'?uid='.$usid.'&code='.$uscode.'>YES PLEASE!!!</a>to activate your account.';
    $headers = "From:".$from;
    mail($to,$subject,$body,$headers);
	echo $body;
    echo "An Activation Code Is Sent To You Check You Emails";












// DB 종료
mysqli_close($con);


//경로 변경
//echo "
  //  <script type='text/javascript'>
    //    location.href='welcome.html';
    //</script>
//";









?>
<!--
<script type="text/javascript">
    // 경로 변경
    // location.href="welcome.html";
</script>
-->









