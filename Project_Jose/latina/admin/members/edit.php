<?php

//세션검증
session_start();
$s_id = isset($_SESSION["uid"])? $_SESSION["uid"] : "";
$idx = isset($_SESSION["unumero"])? $_SESSION["unumero"] : "";

if($s_id != "intkim777@gmail.com" && $idx != 1){
    echo "<div class='x'></div>";
    echo "<script type='text/javascript'>
    var img = document.createElement('img');
    var src = document.querySelector('.x');
    
    var response = confirm(\"해당 페이지는 관리자 권한을 필요로 합니다.\");
if ( response == true )
{
   location.href='../../login/login.html' 
} else {
img.src = 'https://i.imgur.com/GWVvTYM.gif';
img.src1 = 'https://i.imgur.com/GWVvTYM.gif';
img.src2 = 'https://i.imgur.com/GWVvTYM.gif';
src.appendChild(img);
document.write('<p>','Ah ah ah! You didn\'t say The Magic Word!',
'</p>','<a href=\'../../login/login.html\'>돌아가기</a>');	
}
</script>";
return false;    
}


//DB 연결
include "../../inc/dbcon.php";
//이전 페이지에서 받은 정보




$s_idx = $_GET["unumero"];

if($s_idx == null){
    echo "
    <script type='text/javascript'>
        alert('잘못된 접근입니다');
        location.href='list.php';
    </script>
";
 return false;     
}


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

$check = $array["unombre"];

if($check == null){
    echo "
    <script type='text/javascript'>
        alert('잘못된 접근입니다');
        location.href='list.php';
    </script>
";
 return false;     
}

    //$email = explode("@", $array["email"]);
    // echo $email[0]."/".$email[1];

    // DB 종료
    mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Command Centre-회원정보 수정</title>
    <style type="text/css">
        body,input,select,option,button{font-size:20px}
    </style>
    <script type="text/javascript">
        function edit_form_check(){
            // 객체 생성
            var pwd = document.getElementById("usnp");
            var repwd = document.getElementById("mellon");
                         
            if(pwd.value.length > 0){
                if(pwd.value.length<5 || pwd.value.length>12){
                    alert("비밀번호는 6~12글자만 입력할 수 있습니다.");
                    pwd.focus();
                    return false;
                };

                if(pwd.value != repwd.value){
                    alert("비밀번호를 확인해 주세요.");
                    repwd.focus();
                    return false;
                }
            };
            var iii = confirm("회원 정보를 수정하시겠습니까?");
                if (iii == true){
            document.edit_form.submit();
        };
            
        };
        // 옵션 선택시 email_dns에 텍스트 출력
       /* function change_email(){
            var email_dns = document.getElementById("email_dns");
            var email_sel = document.getElementById("email_sel");
            
            var idx = email_sel.options.selectedIndex;
            var selected_value = email_sel.options[idx].value;
            email_dns.value = selected_value;
        };
        */
       function del_con(){
            var i = confirm("Are you sure?");
            if(i==true){
                var ii = confirm("Are you really sure? This action cannot be undone");
                if (ii == true){
                location.href = "delete.php?unumero=<?php echo $s_idx;?>";
            }
            }
        };
    </script>
</head>
<body>
    <form name="edit_form" action="edit_ok.php" method="post">
        <fieldset>
            <legend>회원정보 변경</legend>
            <p> <label for="unombre">이름</label>
                <input type="text" name="unombre" id="unombre" value="<?php echo $array["unombre"];?>">
            </p>
            <p>
                아이디 : <?php echo $array["uid"];?>
                <input type="hidden" name="unumero" value="<?php echo $array["unumero"];?>">
            </p>
            <p>
                <label for="usnp">비밀번호</label>
                <input type="password" name="usnp" id="usnp">
            </p>
            <p>
                <label for="mellon">비밀번호 확인</label>
                <input type="password" name="mellon" id="mellon">
            </p>
            <!--<p>
                <label for="email_id">이메일</label>
                <input type="text" name="email_id" id="email_id" value="<?php echo $email[0] ?>"> @ 
                <input type="text" name="email_dns" id="email_dns" value="<?php echo $email[1] ?>"> 
                <select name="email_sel" id="email_sel" onchange="change_email()">
                    <option value="">직접입력</option>
                    <option value="naver.com">네이버</option>
                    <option value="hanmail.net">다음</option>
                    <option value="gmail.com">지메일</option>
                </select>
            </p>
            -->
            <p>
                <label for="utelefono">전화번호</label>
                <input type="text" name="utelefono" id="utelefono" value="<?php echo  $array["utelefono"]; ?>">
            </p>
            <p>
                <button type="button" onclick="history.back()">이전으로</button>
                <button type="button" onclick="edit_form_check()">수정하기</button>
                <button type="button" onclick="del_con()">회원계정 삭제</button>
            </p>
        </fieldset>
    </form>
</body>
</html>
