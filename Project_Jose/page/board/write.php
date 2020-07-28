<?php
ini_set('display_errors', '0');
header('Content-Type: text/html; charset=UTF-8');
//세션 값 처리
//$s_id = isset($_SESSION["uid"])? $_SESSION["uid"]:"";
session_start();
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
   location.href='../../login_index.php' 
} else {
img.src = 'https://i.imgur.com/GWVvTYM.gif';
src.appendChild(img);
document.write('<p>','Ah ah ah! You didn\'t say The Magic Word!',
'</p>','<a href=\'javascript:history.go(-1)\'>돌아가기</a>');	
}
</script>";
return false;    
}
 

include "../../inc/dbcon.php";



$sql="select * from miembros where unumero = $s_idx;";
//$sql = "UPDATE tablename SET fieldname = 'value'"; 는 ok페이지에

//쿼리 전송
$result = mysqli_query($con, $sql);

//DB에서 데이터 가져오기
$array = mysqli_fetch_array($result); 

$check = $array["unombre"];
$check2 = $array["unumero"];
?>





<!doctype html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form action="write_ok.php" method="post">
                    <div id="in_title">
                        <textarea name="ttitle" id="ttitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <input type="text" name="unombre" id="unombre"  value="<?php echo $check?>" required /> 
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="tcontent" id="tcontent" placeholder="내용" required></textarea>
                    </div>
                    <div id="in_lock">
                        <input type="checkbox" value="1" name="tsecret" />비밀글로 설정합니다.
                    </div>
                    <?php
      if(!isset($_SESSION)) 
    { 
        session_start();} 
    $s_id = isset($_SESSION["uid"])? $_SESSION["uid"] : "";
    $s_name = isset($_SESSION["unombre"])? $_SESSION["unombre"] : "";
    $s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";
    if($_SESSION['uid'] == 'intkim777@gmail.com' && $s_idx == 1){
                echo "<input type='checkbox' value='1' name='tatencion'/><b>공지사항</b>";} ?>
                  <div id="in_pw">
                        <input type="text" name="unumero" id="unumero"  value="<?php echo $check2?>" required />  
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>