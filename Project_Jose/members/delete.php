<?php
session_start();

// id 데이터 가져오기 - SESSION *_로 시작하는건 대문자로!*
$s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";

// id 데이터 가져오기 - GET *_로 시작하는건 대문자로!*
//$s_idx = $_GET["id"];

//// DB 연결
include "../inc/dbcon.php";


// 쿼리 작성 *자료형에 맞춰 '' 가감할 것*
$sql = "delete from miembros where unumero = $s_idx;";
    

//// 쿼리 전송
mysqli_query($con, $sql);


// DB 종료
mysqli_close($con);


//계정 삭제의 경우 세션 종료를 해 줘서 최종적으로 로그아웃 시켜 권한을 없애야 함. 안그러면 브라우저 종료 전까지는 계속 로그인 상태로 사용 가능.


unset($_SESSION["uid"]);
unset($_SESSION["unombre"]);
unset($_SESSION["unumero"]);



// 경로 변경
echo "
    <script type='text/javascript'>
        alert('계정이 삭제되었습니다.');
        location.href='del_comp.html';
    </script>
";


?>










