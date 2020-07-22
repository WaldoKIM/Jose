<?php
//session_start();
//$s_idx = isset($_SESSION["idx"])? $_SESSION["idx"] : "";
//위 코드를 남겨두면 회원이 아닌 로그인 된 계정-즉 관리 정보가 수정되어 버림

include "../inc/sess.php";
//DB 연결
include "../../inc/dbcon.php";
//이전 페이지에서 받은 정보
//하나의 페이지에서는 하나의 전송방식만 사용 가능. 즉, post 또는 get 으로 해야 함.
//사실은 섞어서도 사용은 가능함 하지만...
//그냥 form tag로 hidden 써서 한번에 post 해버리면 됨.
//id 숫자는 사용자가 건드릴 필요도, 알 필요도 없지만 필요한 정보이므로 숨겨서 전송


// 데이터 가져오기
$s_idx = $_POST["unumero"]; 
$uname = $_POST["unombre"];
$pwd = password_hash($_POST['usnp'], PASSWORD_BCRYPT);
$mobile = $_POST["utelefono"];
    

// 쿼리 작성
if(!$pwd){ // 비밀번호를 입력하지 않은 경우
    $sql = "update miembros set unombre='$uname', utelefono='$mobile' where unumero=$s_idx;";
} else{ // 비밀번호도 입력한 경우
    $sql = "update miembros set usnp='$pwd', unombre='$uname', utelefono='$mobile' where unumero=$s_idx;";
};

// 쿼리 전송
mysqli_query($con, $sql);


// DB 종료
mysqli_close($con);


// 경로 변경
echo "
    <script type='text/javascript'>
        alert('정보가 수정되었습니다.');
        location.href='edit_comp.html';
    location.href = 'view.php?unumero=$s_idx';    
        
        
    </script>
";

?>










