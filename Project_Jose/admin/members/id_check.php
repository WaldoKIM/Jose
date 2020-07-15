<?php

// 데이터 가져오기
$sch_id = $_POST["sch_id"];

// 쿼리 작성
// $sql = "select uid, uname from members where uid='$sch_id';";
$sql = "select uid from members where uid='$sch_id';";
// echo $sql;

// DB 연결
include "../inc/dbcon.php";

// 쿼리 전송
$result = mysqli_query($con, $sql);

// DB에서 데이터 가져오기
// $row = mysqli_fetch_row($result); // 필드배열
// echo $row[1];

// $array = mysqli_fetch_array($result); // 필드명
// echo $array["uname"];

$num = mysqli_num_rows($result); // 필드행 개

// DB 연결 종료
mysqli_close($con);

// 페이지 이동

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>검색 결과</title>
    <style type="text/css">
        body{font-size:20px}
        .rTxt{font-weight:bold;color:#f00}
        .bTxt{font-weight:bold;color:#00f}
    </style>
    
    <script type="text/javascript">
        function return_id(){
            opener.document.getElementById("uid").value="<?php echo $sch_id; ?>";
            window.close();
        }
    </script>
</head>
<body>
    <?php
        /*
        if(!$num){ // 검색 결과가 0 아니라면
            echo "<p>사용할 수 있는 아이디입니다.</p>";
        } else{ // 검색 결과가 0 이 이라면
            echo "<p>사용할 수 없는 아이디입니다.</p>";
        };
        */
    ?>
    
    <?php 
        if(!$num){
    ?>
        <p>
            사용할 수 <span class="bTxt">있는</span> 아이디입니다.
            <a href="#" onclick="return_id()">사용하기</a>
        </p>
    <?php
        } else{
    ?>
        <p>
            사용할 수 <span class="rTxt">없는</span> 아이디입니다.
            <a href="#" onclick="history.back()">다시 검색</a>
        </p>
    <?php
        };
    ?>
</body>
</html>








