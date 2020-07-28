  <?php
  $uid = $_GET['uid'];
  
  $connect = mysqli_connect("localhost","morpheus","glatprhrkdgksdkcla!2");
  $db_con = mysqli_select_db($connect, "morpheus");
//include "../inc/dbcon.php"; 

  $sql="select * from miembros where uid='$uid'";
  $result=mysqli_query($connect, $sql);
  $num_match=mysqli_num_rows($result);


if(isset($_GET['uid']))
{
	$email_id=$_GET['uid'];
	$code=substr(md5(mt_rand()),0,15);
	mysql_connect('localhost','morpheus','glaTprhrkdgksdkcla!2');
	$db_con = mysqli_select_db($connect, "morpheus");
    //mysql_select_db('sample');
	
	$insert=mysql_query("insert into verify values('','$email','$pass','$code')");
	//$db_id=mysql_insert_id();

	$message = "Your Activation Code is ".$code."";
    $to=$email;
    $subject="Activation Code For Talkerscode.com";
    $from = 'your email';
    $body='Your Activation Code is '.$code.' Please Click On This link <a href="email_check_ajax.php">email_check_ajax.php?id='.$db_id.'&code='.$code.'</a>to activate your account.';
    $headers = "From:".$from;
    mail($to,$subject,$body,$headers);
	
	echo "An Activation Code Is Sent To You Check You Emails";
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id=$_GET['id'];
	$code=$_GET['id'];
	mysql_connect('localhost','root','');
	mysql_select_db('sample');
	$select=mysql_query("select email,password from verify where id='$id' and code='$code'");
	if(mysql_num_rows($select)==1)
	{
		while($row=mysql_fetch_array($select))
		{
			$email=$row['email'];
			$password=$row['password'];
		}
		$insert_user=mysql_query("insert into verified_user values('','$email','$password')");
		$delete=mysql_query("delete from verify where id='$id' and code='$code'");
	}
}









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
