<?php include "../../db.php"; 

//각 변수에 write.php에서 input name값들을 저장한다
$username = $_POST['unombre'];
$useridx = $_POST['unumero'];
//$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['ttitle'];
$content = $_POST['tcontent'];
$date = date("Y-m-d H:i:s");
$tsecret = $_POST['tsecret'];
$tnotice = $_POST['tatencion'];
echo $tnotice;
if($username && $title && $content){
    $sql = mq("insert into plaza_tablero(unombre,unumero,ttitle,tcontent,tdate,tsecret,tatencion) values('".$username."','".$useridx."','".addslashes($title)."','".addslashes($content)."','".$date."','$tsecret','$tnotice')"); 
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='../../board_index.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>
