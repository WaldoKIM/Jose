<?php
//오류 메세지 숨기기
header('Content-Type: text/html; charset=UTF-8');
ini_set('display_errors', '0');
//세션 활성화
session_start();

//
//세션 값 처리
//$s_id = isset($_SESSION["uid"])? $_SESSION["uid"]:"";
$s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";
//중복될수 있는 항목보단 절대 중복되지 않는 id(idx) 값이 더 유용하다

//로그인 하지 않은 사용자 접근 시 페이지 변경
if(!$_SESSION['unumero']){
    echo "<dvi id='x'></div>";
    echo "<script type='text/javascript'>
    var img = document.createElement('img');
    var src = document.getElementById('x');

    var response = confirm(\"비밀글은 작성자와 운영자만 열람 가능합니다. 로그인 하시겠습니까?\");
if ( response == true )
{
   location.href='../../login_index.php' 
} else {
img.src = 'https://i.imgur.com/GWVvTYM.gif';
src.appendChild(img);
document.write('<p>','Ah ah ah! You didn\'t say The Magic Word!',
'</p>','<a href=\'javascript:history.go(-1)\'>돌아가기</a>');	
}
</script>";
return false;    
} else {


include "../../inc/dbcon.php";

$sql="select * from miembros where unumero = $s_idx;";

$result = mysqli_query($con, $sql);

$array = mysqli_fetch_array($result); 


$lock = $array["unumero"];


    
$bno = $_GET['tidx'];



/* bno함수에 idx값을 받아와 넣음*/
$sqlx = "select * from plaza_tablero where tidx='".$bno."'"; /* 받아온 idx값을 선택 */
$resultx = mysqli_query($con, $sqlx); 
$board = mysqli_fetch_array($resultx);
$pick = $board['unumero'];

//echo $lock;
//echo $pick;
    
};    
//관리자 통과
if($lock==1){?><script type="text/javascript">location.replace("read.php?tidx=<?php echo $bno; ?>");</script><?php    
}else if($lock!= $pick){
    echo "<script type='text/javascript'>
        alert(\"비밀글은 작성자와 운영자만 열람 가능합니다.\");
      history.go(-1);
        </script>";

return false;    
}
mysqli_close($con);
?>

<script type="text/javascript">location.replace("read.php?tidx=<?php echo $bno; ?>");</script>




