<?php
//session_start();
//$s_idx = isset($_SESSION["id"])? $_SESSION["id"]:"";





// DB 연결
include "../inc/sess.php";
include "../../inc/dbcon.php";

if($s_id != "rootkim@admin.com" && $idx != 1){

return false;    
}

$s_idx = $_GET["unumero"];
// 쿼리 작성
$sql = "delete from miembros where unumero=$s_idx;";

// 쿼리 전송
mysqli_query($con, $sql);

// DB 종료
mysqli_close($con);

// 경로 변경
echo "
    <script type='text/javascript'>
        alert('회원 정보가 삭제되었습니다.');
        location.href='list.php';
    </script>
";

?>










