<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
// 이전 페이지에서 데이터 가져오기
$uid = $_POST["uid"];
$pwd = $_POST["usnp"];

if($uid == null){ // 아이디가 존재하지 않는다면
    echo "
        <script type='text/javascript'>
            alert(\"잘못된 접근입니다.\");
            history.back();
        </script>
    ";
    return false;
};



// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select unumero, unombre, usnp, uid, yonosoyunrobot from miembros where uid='$uid';";
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

if($uid != $array["uid"]){ // 아이디가 존재하지 않는다면
    echo "
        <script type='text/javascript'>
            alert(\"등록되지 않은 이메일 주소입니다.\");
            history.back();
        </script>
    ";
    return false;
} else{ // 아이디가 존재한다면
    // 비밀번호 검사
//DB에서 암호화된 비밀번호 불러오기    
    $db_pwd = $array["usnp"];
//사용자가 입력한 비빌번호를 암호화하여 일치여부 확인    
    if(!password_verify($pwd,$db_pwd)){
        echo "
            <script type='text/javascript'>
                alert(\"비밀번호가 일치하지 않습니다.\");
                history.back();
            </script>
        ";
        return false;
    } else{ // 아이디와 비밀번호는 일치하지만 본인인증이 안된 계정일 경우
    if(0 == $array["yonosoyunrobot"]){
        echo "
            <script type='text/javascript'>
                alert(\"가입하신 이메일로 본인인증을 마친 후 다시 로그인 해 주세요.\");
                history.back();
            </script>
        ";
        return false;
    }
    } 
};


$_SESSION["uid"] = $array["uid"];
$_SESSION["unombre"] = $array["unombre"];
$_SESSION["unumero"] = $array["unumero"];


// echo $_SESSION["uid"]."/".$_SESSION["uname"];
if ($_SESSION['uid'] == 'intkim777@gmail.com'){
    echo "
    <script type='text/javascript'>
        alert('welcomeback, commander!');
        location.href='../login_index.php';
    </script>
";
    
} else{

echo "
    <script type='text/javascript'>
        alert('로그인 되었습니다.');
        window.history.go(-2);
    </script>
";
};
?>














