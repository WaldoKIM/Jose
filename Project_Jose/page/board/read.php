<?php 
ini_set('display_errors', '0');
include "../../db.php";  /* db load */
$bno = $_GET['tidx'];
$sqlz = mq("select * from plaza_tablero where tidx ='".$bno."'");
$num = mysqli_num_rows($sqlz);
/*받아온 idx값을 선택 */
$boardz = $sqlz->fetch_array();
$cck = $boardz['tsecret'];
if($num==0 || $num==null){
echo "<script type='text/javascript'>
alert(\"잘못된 접근입니다.\");
location.href='../../login/login.html';
</script>";
};

if($boardz['tsecret']=='1'){
    session_start();
$s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";
    if(!$_SESSION['unumero']){
    echo "<dvi id='x'></div>";
    echo "<script type='text/javascript'>
    var img = document.createElement('img');
    var src = document.getElementById('x');

    var response = confirm(\"비밀글은 작성자와 운영자만 열람 가능합니다. 로그인 하시겠습니까?\");
if ( response == true )
{
   location.href='../../login/login.html' 
} else {
img.src = 'https://i.imgur.com/GWVvTYM.gif';
src.appendChild(img);
document.write('<p>','Ah ah ah! You didn\'t say The Magic Word!',
'</p>','<a href=\'javascript:history.go(-1)\'>돌아가기</a>');	
}
</script>";
return false;    
    }
};

?>

<!doctype html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />

</head>
<body>
	<?php
		$bno = $_GET['tidx']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(mq("select * from plaza_tablero where tidx ='".$bno."'"));
		$hit = $hit['thit'] + 1;
		$fet = mq("update plaza_tablero set thit = '".$hit."' where tidx = '".$bno."'");
		$sql = mq("select * from plaza_tablero where tidx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['ttitle']; ?></h2>
		<div id="user_info">
			<?php echo $board['unombre']; ?> <?php echo $board['tdate']; ?> 조회:<?php echo $board['thit']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[tcontent]"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="javascript:history.go(-1)">[목록으로]</a></li>
			<li><a href="modify.php?tidx=<?php echo $board['tidx']; ?>">[수정]</a></li>
			<li><a href="delete.php?tidx=<?php echo $board['tidx']; ?>">[삭제]</a></li>
		</ul>
	</div>
</div>
</body>
</html>