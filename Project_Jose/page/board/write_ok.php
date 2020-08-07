<?php include "../../inc/dbcon.php"; 
header('Content-Type: text/html; charset=UTF-8');
ini_set('display_errors', '0');

//각 변수에 write.php에서 input name값들을 저장한다
$username = $_POST['unombre'];
$useridx = $_POST['unumero'];
//$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['ttitle'];
$content = $_POST['tcontent'];
$date = date("Y-m-d H:i:s");
$tsecret = $_POST['tsecret'];
$tnotice = $_POST['tatencion'];
if($tsecret == null){$tsecret = 0;};
if($tnotice == null){$tnotice = 0;};



    $sql = "insert into plaza_tablero(unumero,unombre,ttitle,tcontent,tdate,tsecret,tatencion) values($useridx,'$username','".addslashes($title)."','".addslashes($content)."','$date',$tsecret,$tnotice);";


    mysqli_query($con, $sql); 

    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='../../board_index.php';</script>";
?>
