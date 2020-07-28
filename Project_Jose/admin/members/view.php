<?php
//session 연결
include "../inc/sess.php";
// DB 연결
include "../../inc/dbcon.php";

//이전 페이지에서 값 가져오기
$s_idx = $_GET["unumero"];

if($s_id != "intkim777@gmail.com" && $idx != 1){

return false;    
}

// 쿼리 작성
$sql = "select * from miembros where unumero='$s_idx';";
// echo "select * from members where idx='$s_idx';";
// return false;

// 쿼리 전송
$result = mysqli_query($con, $sql);
    
// DB에서 값 가져오기
$array = mysqli_fetch_array($result);
// 값 분할(텍스트 분리)
// explode("구분기호", "분리할 문자열");
// 구분 기호 기준으로 배열형태로 분리
// ex) 문자열이 010-1111-2222
// $mobile = explode("-", "010-1111-2222");
// 첫 번째 값 : $mobile[0] = 010
// 두 번째 값 : $mobile[1] = 1111
// 세 번째 값 : $mobile[2] = 2222
// $email = explode("@", $array["email"]);
    // echo $email[0]."/".$email[1];

    // DB 종료
    mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <style type="text/css">
        body,input,select,option,button{font-size:20px}
    </style>
    <script type="text/javascript">
            function del_con(){
            var i = confirm("Are you sure?");
            if(i==true){
                var ii = confirm("Are you really sure???");
                if (ii == true){
                location.href = "delete.php?unumero=<?php echo $s_idx;?>";
            }
            }
        };
    </script>
   
</head>
<body>
   <div>
    <h3>회원정보</h3>       
            <p>
                이름 : <?php echo $array["unombre"];?>
            </p>
            <p>
                아이디 : <?php echo $array["uid"];?>
            </p>
            <p>
                전화번호 : <?php echo $array["utelefono"];?>
            </p>
            <p>
                이메일 : <?php $news = $array["unews"];
                if ($news == 1){ echo "이메일 소식지 수신";}
                else{echo "이메일 소식지 수신 안함";};
                                ?>
            </p>
            <p>
                가입일 : <?php echo $array["ureg_fetcha"];?>
            </p>
            
    </div>        
    <div>        
            <p>
                <a href="list.php">목록 보기</a>
                <a href="#none" onclick="del_con()">회원정보 삭제</a>
            </p>
  </div>
</body>
</html>
