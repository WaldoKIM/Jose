<?php
session_start();

// 이전 페이지에서 데이터 가져오기
$uid = $_POST["uid"];
$pwd = $_POST["usnp"];


// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select unumero, unombre, usnp, uid from miembros where uid='$uid';";
// echo $sql;
// return false;

// 쿼리 전송
$result = mysqli_query($con, $sql);

// DB에서 값 가져오기
$array = mysqli_fetch_array($result);
// $row = mysqli_fetch_row($result);

// 값 출력 테스트
// echo $array["uid"]."/".$array["pwd"]."/".$array["uname"];
// echo $row[0]."/".$row[1]."/".$row[2];

// 아이디 검사
if($uid  != $array["uid"]){ // 아이디가 존재하지 않는다면
    echo "
        <script type='text/javascript'>
            alert(\"일치하는 아이디가 없습니다.\");
            history.back();
        </script>
    ";
    return false;
} else{ // 아이디가 존재한다면
    // 비밀번호 검사
    if($usnp  != $array["usnp"]){
        echo "
            <script type='text/javascript'>
                alert(\"비밀번호가 일치하지 않습니다.\");
                history.back();
            </script>
        ";
        return false;
    };
};

$_SESSION["uid"] = $array["uid"];
$_SESSION["unombre"] = $array["unombre"];
$_SESSION["unumero"] = $array["unumero"];


// echo $_SESSION["uid"]."/".$_SESSION["uname"];
if ($_SESSION['uid'] == 'rootkim@admin.com'){
    echo "
    <script type='text/javascript'>
        alert('welcomeback, commander!');
        location.href='../index.php';
    </script>
";
    
} else{

echo "
    <script type='text/javascript'>
        alert('로그인 되었습니다.');
        location.href='../index.php';
    </script>
";
};
?>














