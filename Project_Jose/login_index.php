<?php 
    session_start();
    $s_id = isset($_SESSION["uid"])? $_SESSION["uid"] : "";
    $s_name = isset($_SESSION["unombre"])? $_SESSION["unombre"] : "";
    $s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";


    // 로그인 정보 확인
    // echo $_SESSION["uid"]."/".$_SESSION["uname"];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>인덱스</title>
    <style type="text/css">
        body{font-size:20px}
        strong {font-size: 1.5em;}
    </style>
    <script type="text/javascript">
        function logout_check(){
            var q = confirm("정말 로그아웃하시겠습니까?");
            
            if(q){
                location.href="login/logout.php";
            };
        };
    </script>
</head>
<body>
    <p>
        <?php
            if(!$s_id){?>
               <!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <style type="text/css">
        body,input,button{font-size:20px}
    </style>
    <script type="text/javascript">
        function login_form_check(){
            var uid = document.getElementById("uid");
            var pwd = document.getElementById("usnp");
            
            if(!uid.value){
                alert("아이디를 입력하세요.");
                uid.focus();
                return false;
            };
            
            if(!pwd.value){
                alert("비밀번호를 입력하세요.");
                pwd.focus();
                return false;
            };
            
            document.login_form.submit();
        };
    </script>
</head>
<body>
    <form name="login_form" action="login/login_ok.php" method="post">
        <fieldset>
            <legend>로그인</legend>
                <p>
                    <label for="uid">아이디</label>
                    <input type="text" name="uid" id="uid">
                </p>
                <p>
                    <label for="usnp">비밀번호</label>
                    <input type="password" name="usnp" id="usnp">
                </p>
                <p>
                    <button type="button" onclick="login_form_check()">로그인</button>
                
                    <button type="button" onclick="history.back()">이전으로</button>
                </p>
        </fieldset>
    </form>
</body>
</html>
<?php               
               
               // echo "<a href=\"login/login.html\">로그인</a> ";
                echo "<a href=\"members/join.html\">회원가입</a> ";
               //  echo "<a href=\"board_index.php\">게시판</a>";  
            } else{
                include "inc/dbcon.php";


//쿼리 작성 *자료형에 맞춰 '' 가감할 것*
$sql="select * from miembros where unumero = $s_idx;";
//$sql = "UPDATE tablename SET fieldname = 'value'"; 는 ok페이지에

//쿼리 전송
$result = mysqli_query($con, $sql);

//DB에서 데이터 가져오기
$array = mysqli_fetch_array($result); 

         
                
                
                if($_SESSION['uid'] == 'rootkim@admin.com' && $s_idx == 1){
                    echo "<script type='text/javascript'>
                   location.href='admin/admin.php'</script>";
                    //index 파일은 파일명이 없어도 기본으로 실행됨(파일명 생략가능)
                     }else{
                $tid = $array["unumero"];
                echo "<p>". "안녕하신가"." "."<strong>". $array["unombre"]."</strong>"."!"." ". "오늘도 힘세고 강한 하루!". "</p>";
                echo "<a href=\"#none\" onclick=\"logout_check()\">로그아웃</a> ";
                echo "<a href=\"members/edit.php\">정보수정</a> ";
                echo "<a href=\"board_noticex.php?tdx=$tid\">내 게시글 확인</a> ";
                echo "<a href=\"index.php\">메인으로</a>"; 
                    
            }
            };
        ?>
       <!-- <a href="#">사이트맵</a>-->
    </p>
</body>
</html>










