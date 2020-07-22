<?php include "../../db.php";
	
	$bno = $_GET['tidx'];
	$sql = mq("delete from plaza_tablero where tidx='$bno';");




echo 
    
"<script type='text/javascript'>alert('삭제되었습니다.');
             location.href = '../../board_index.php';    
 </script>"
    
    ?>