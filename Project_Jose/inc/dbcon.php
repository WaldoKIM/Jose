<?php
//// DB 연결
header('Content-Type: text/html; charset=UTF-8');
$con = mysqli_connect("localhost", "morpheus", "glaTprhrkdgksdkcla!2") or die("DB에 접속할 수 없습니다.");
mysqli_select_db($con, "morpheus");
mysqli_set_charset($con, "utf8");
/*
$con = mysqli_connect("localhost", "root", "") or die("DB에 접속할 수 없습니다.");
mysqli_select_db($con, "testdb");
*/
?>