<?php
//세션 활성화
//php 오류 메세지 숨기기
ini_set('display_errors', '0');
header('Content-Type: text/html; charset=UTF-8');
session_start();


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


//DB 연결
include "../inc/dbcon.php";


//쿼리 작성 *자료형에 맞춰 '' 가감할 것*
$sql="select * from miembros where unumero = $s_idx;";
//$sql = "UPDATE tablename SET fieldname = 'value'"; 는 ok페이지에

//쿼리 전송
$result = mysqli_query($con, $sql);

//DB에서 데이터 가져오기
$array = mysqli_fetch_array($result); 

//값 분할(텍스트 분리)
//explode("구분기호","분리할 문자열");
//구분 기호 기준으로 배열 형태로 분리
//e.g. 010-1111-2222
//$mobile = explode("-", "010-1111-2222");
//$mobile[0,1,2] = 010, 1111, 2222
//$email = explode("@", $array["email"]);

//$s_email = explode("@", "$email)


//DB 종료
mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>회원정보수정</title>
    <style type="text/css">
        body,input,select,option,button{font-size:20px}
    </style>
    <script type="text/javascript">
        /*var apply_check_num = 0;*/
        
        function edit_form_check(){
            // 객체 생성
            var uname = document.getElementById("unombre");
            var pwd = document.getElementById("usnp");
            var repwd = document.getElementById("mellon");
            var iamnotarobot = document.getElementById("yonosoyunrobot");
            
            if(!uname.value){
                alert("이름을 입력하세요.");
                uname.focus();
                return false;
            };
            
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
            };
            };
            
            document.edit_form.submit();
        };

        function del_con(){
            var i = confirm("정말로 계정을 삭제하시겠습니까? \n\n \"去者不追 來者不拒 -孟子\"")
            //if(i) 와 if(i==true)는 동일한 기능
            //예 if(box.checked == true) 는 if(box.checked) 라고 써도 됨
            //다른 예 if(txt.value !="") 는 if(txt) 라고 써도 같은 의미
            //반대로 할때는 느낌표 붙이면 false일때의 의미 if(!i)도 동일한 기능
            if(i){            
                location.href="delete.php";                
            }else{
                alert("Welcome back!");    
            };
        };
        
    </script>
</head>
<body>
    <form name="edit_form" action="edit_ok.php" method="post">
        <fieldset>
            <legend>회원정보수정</legend>
            <p>
                <label for="unombre">이름</label>
                <input type="text" name="unombre" id="unombre" value="<?php echo $array['unombre'];?>">
            </p>
          <p>
                아이디 : <?php echo $array["uid"];?>
            </p>    

            <p>
                <label for="usnp">비밀번호</label>
                <input type="password" name="usnp" id="usnp" placeholder="변경을 원할경우 입력하세요">
            </p>
            <p>
                <label for="mellon">비밀번호 확인</label>
                <input type="password" name="mellon" id="mellon">
            </p>
           <!-- <p>
                <label for="email_id">이메일</label>
                <input type="text" name="email_id" id="email_id" value="<?php echo $email[0];?>"> @ 
                <input type="text" name="email_dns" id="email_dns" value="<?php echo $email[1];?>"> 
                <select name="email_sel" id="email_sel" onchange="change_email()">
                    <option value="">직접입력</option>
                    <option value="naver.com">네이버</option>
                    <option value="hanmail.net">다음</option>
                    <option value="gmail.com">지메일</option>
                </select>
            </p>-->
            <p>
                <label for="utelefono">전화번호</label>
                <input type="text" name="utelefono" id="utelefono" value="<?php echo $array["utelefono"];?>">
            </p>
            <p>
                <!--<input type="checkbox" name="apply" id="apply" onclick="apply_check()">-->
                <input type="radio" value="1" name="unews" id="unews1">
                <label for="unews1">이메일로 소식지 받기</label>
                <input type="radio" value="0" name="unews" id="unews2" checked="checked">
                <label for="unews2">수신안함</label>
            </p>
            <p>
                <button type="button" onclick="history.back()">이전으로</button>
                <button type="button" onclick="edit_form_check()">수정하기</button>
                <button type="button" onclick="del_con()">계정삭제</button>
            </p>
        </fieldset>
    </form>
</body>
</html>
