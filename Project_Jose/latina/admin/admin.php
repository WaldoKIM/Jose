<?php 
    session_start();
    $s_id = isset($_SESSION["uid"])? $_SESSION["uid"] : "";
    $s_name = isset($_SESSION["unombre"])? $_SESSION["unombre"] : "";
    $s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"] : "";

 
    if($s_id!='intkim777@gmail.com' && $s_idx!=1){
        echo "<script>
         alert('Warning! Access denied, You don\'t have permission to access on The Command Centre.');
        location.href='../index.php';
        </script>";
    };
    // 로그인 정보 확인
    // echo $_SESSION["uid"]."/".$_SESSION["uname"];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Command Centre</title>
    <style type="text/css">
        body{font-size:20px}
        strong {font-size: 1.5em;}
    </style>
    <script type="text/javascript">
        function logout_check(){
            var q = confirm("정말 로그아웃하시겠습니까?");
            
            if(q){
                location.href="../login/logout.php";
            };
        };
    </script>
</head>
<body>
    <p>
        <?php
            echo "<h2>'Welcome Back, Commander!'</h2>";
            echo "<a href=\"#none\" onclick=\"logout_check()\">로그아웃</a> ";
            echo "<a href=\"members/list.php\">회원정보수정</a> ";
            echo "<a href=\"../board_admin.php\">게시판</a> ";
            echo "<a href=\"../board_notice.php\">공지사항</a> ";
            echo "<a href=\"../board_secret.php\">비밀글 확인</a> ";
            echo "<a href=\"../index.php\">메인화면</a>";
        ?>
        <a href="#">사이트맵</a>
    </p>
</body>
</html>










