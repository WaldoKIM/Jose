<?php
session_start();

// id 데이터 가져오기 - SESSION *_로 시작하는건 대문자로!*
$s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";

// id 데이터 가져오기 - GET *_로 시작하는건 대문자로!*
//$s_idx = $_GET["id"];

//로그인 하지 않은 사용자 접근 시 페이지 변경
if(!$_SESSION['unumero']){
    echo "<dvi id='x'></div>";
    echo "<script type='text/javascript'>
    var img = document.createElement('img');
    var src = document.getElementById('x');

    var response = confirm(\"해당 페이지는 로그인을 필요로 합니다. 로그인 화면으로 이동하시겠습니까?\");
if ( response == true )
{
   location.href='../login/login.html' 
} else {
img.src = 'https://i.imgur.com/GWVvTYM.gif';
src.appendChild(img);
document.write('<p>','Ah ah ah! You didn\'t say The Magic Word!',
'</p>','<a href=\'../login/login.html\'>돌아가기</a>');	
}
</script>";
return false;    
}



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










