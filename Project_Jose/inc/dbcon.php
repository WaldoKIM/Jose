<?php
//// DB 연결
$con = mysqli_connect("localhost", "comosellama", "llama", "latina") or die("DB에 접속할 수 없습니다.");
mysqli_set_charset($con, "utf8");
/*
$con = mysqli_connect("localhost", "root", "") or die("DB에 접속할 수 없습니다.");
mysqli_select_db($con, "testdb");
*/
?>