<?php include "../../db.php";
header('Content-Type: text/html; charset=UTF-8');
$bno = $_POST['tidx'];
$username = $_POST['unombre'];
$title = $_POST['ttitle'];
$content = $_POST['tcontent'];
$sql = mq("update plaza_tablero set unombre='".$username."',ttitle='".$title."',tcontent='".$content."' where tidx='".$bno."'"); 

echo "<script type='text/javascript'>alert('수정되었습니다.'); 
             location.href = 'read.php?tidx=$bno';    
 </script>"
?>