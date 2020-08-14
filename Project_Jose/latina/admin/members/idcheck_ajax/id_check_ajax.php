  <?php
  $uid = $_GET['uid'];
  
  $connect = mysqli_connect("localhost","morpheus","glaTprhrkdgksdkcla!2");
  $db_con = mysqli_select_db($connect, "morpheus");
 
  $sql="select * from members where uid='$uid'";
  $result=mysqli_query($connect, $sql);
  $num_match=mysqli_num_rows($result);

  if(!$num_match){
	echo "N";
  } else{
	 echo "Y";
  }
?>