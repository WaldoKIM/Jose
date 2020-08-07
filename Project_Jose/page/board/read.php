<?php 
header('Content-Type: text/html; charset=UTF-8');
ini_set('display_errors', '0');
include "../../inc/dbcon.php";  /* db load */
session_start(); 
$s_idxr = isset($_SESSION["unombre"])? $_SESSION["unombre"]:"";
$bno = $_GET['tidx'];
$sqlz = "select * from plaza_tablero where tidx ='".$bno."'";
$resultz = mysqli_query($con, $sqlz); 
$num = mysqli_num_rows($resultz);
/*받아온 idx값을 선택 */

$boardz = mysqli_fetch_array($resultz);
$cck = $boardz['tsecret'];
$cck2 = $boardz['unumero'];
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


$sql="select * from miembros where unumero = $s_idx;";

$result = mysqli_query($con, $sql);

$array = mysqli_fetch_array($result); 



$lock = $array["unumero"];

$sqlx = "select * from plaza_tablero where tidx='".$bno."'"; /* 받아온 idx값을 선택 */
$resultx = mysqli_query($con, $sqlx); 
$board = mysqli_fetch_array($resultx);
$pick = $board['unumero'];    
    
    

if($lock==1){
}else if($lock!= $pick){
    echo "<script type='text/javascript'>
        alert(\"비밀글은 작성자와 운영자만 열람 가능합니다.\");
        history.go(-1);
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
        $sqlh = "select * from plaza_tablero where tidx ='".$bno."'"; 
        $resulth = mysqli_query($con, $sqlh);
		$hit = mysqli_fetch_array($resulth);
		$hit = $hit['thit'] + 1;
    
        $sqlf = "update plaza_tablero set thit = '".$hit."' where tidx = '".$bno."'";
        $resultf = mysqli_query($con, $sqlf);
        
		$sql1 = "select * from plaza_tablero where tidx='".$bno."'"; /* 받아온 idx값을 선택 */
        $result1 = mysqli_query($con, $sql1); 
    
		$board = mysqli_fetch_array($result1);
	?>
	
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['ttitle'];?></h2>
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

<!--- 댓글 불러오기 -->
<div class="reply_view">
	<h3>댓글목록</h3>
		<?php
			$sql3 = "select * from plaza_respuesta where tidx='".$bno."' order by ridx desc";
            $resultr = mysqli_query($con, $sql3);
    		while($reply = mysqli_fetch_array($resultr)){ 
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['unombre'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[rcontent]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['rdate']; ?></div>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">수정</a>
				<a class="dat_delete_bt" href="#">삭제</a>
			</div>
			<!-- 댓글 수정 폼 dialog
			<div class="dat_edit">
				<form method="post" action="rep_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $reply['ridx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['rcontent']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div> -->
			<!-- 댓글 삭제 비밀번호 확인 
			<div class='dat_delete'>
				<form action="reply_delete.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['ridx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		<p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
				 </form>
			</div>
		</div>-->
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	
<div class="dap_ins">
		<form id='rep_bt' action="reply_ok.php?tidx=<?php echo $bno; ?>" method="post">
			<input type="text" name="unombre" value="<?php echo $s_idxr?>" id="unombre" class="dat_user" size="15">
			<div style="margin-top:10px; ">
				<textarea name="rcontent" class="reply_content" id="rcontent" ></textarea>
<?php if(!$_SESSION['unumero']){echo "<p>댓글 작성은 로그인 후 가능합니다</p>";}else{
    echo "<button type='submit' id='rep_bt' class='re_bt'>댓글</button>";}; ?>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->

</body>
</html>
<?php mysqli_close($con); ?>