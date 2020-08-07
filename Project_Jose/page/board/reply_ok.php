<?php include "../../inc/dbcon.php"; 
header('Content-Type: text/html; charset=UTF-8');

    $bno = $_GET['tidx'];
    
    
    
        $sql = "insert into plaza_respuesta(tidx,unombre,rcontent) values('".$bno."','".$_POST['unombre']."','".$_POST['rcontent']."');";

 mysqli_query($con, $sql); 
       

echo "<script>alert('댓글이 작성되었습니다.'); location.href='read.php?tidx=$bno';</script>";
	
?>