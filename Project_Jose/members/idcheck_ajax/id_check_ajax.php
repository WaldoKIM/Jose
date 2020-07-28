  <?php
  $uid = $_GET['uid'];
  
  $connect = mysqli_connect("localhost","morpheus","glaTprhrkdgksdkcla!2");
  $db_con = mysqli_select_db($connect, "morpheus");
//include "../inc/dbcon.php"; 

  $sql="select * from miembros where uid='$uid'";
  $result=mysqli_query($connect, $sql);
  $num_match=mysqli_num_rows($result);

//select count(*) from members;
//$num_match (결과값 있음)


//select count(*) from members where uid='aaa';
//!$num_match (결과값 없음)

  if(!$num_match){
	echo "N";
  } else{
	 echo "Y";
  }
?>