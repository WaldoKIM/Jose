<?php
    session_start();
header('Content-Type: text/html; charset=UTF-8');

    // 세션 삭제 : unset(세션변수);
    unset($_SESSION["uid"]);
    unset($_SESSION["unombre"]);
    unset($_SESSION["unumero"]);

    echo "
        <script type='text/javascript'>
            alert('로그아웃 되었습니다.');
            window.history.go(-1);
        </script>
    ";
?>