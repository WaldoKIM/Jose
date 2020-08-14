<?php
header('Content-Type: text/html; charset=UTF-8');
/*
// Table Scheme for Verify Table
CREATE TABLE `verify` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `email` text NOT NULL,
 `password` text NOT NULL,
 `code` text NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1

// Table Scheme for verified_user table
CREATE TABLE `verified_user` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `email` text NOT NULL,
 `password` text NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1
*/

if(isset($_GET['uid']) && isset($_GET['code']))
{
	$id=$_GET['uid'];
	$code=$_GET['code'];
	$con = mysqli_connect("localhost", "comosellama", "llama", "latina") or die("DB에 접속할 수 없습니다.");
mysqli_set_charset($con, "utf8");
    
	$select="select yonosoyunrobot from miembros where unumero=$id and iamnotarobot=$code;";
    echo $select;
    
        
    $result=mysqli_query($con, $select);
    $row=mysqli_fetch_array($result);
    $iamnotarobot=$row['yonosoyunrobot'];
    echo $iamnotarobot; 
    
	if($iamnotarobot==0)
	{
		//while($row=mysqli_fetch_array($result))
		//{
		//	$iamnotarobot=$row['yonosoyunrobot'];
			
		//}
		$insert_user="update miembros set yonosoyunrobot = 1 where unumero=$id;";
		mysqli_query($con, $insert_user);
	};
}
/*
$select="select unumero from miembros where uid='$email_id';";
	$insert="update miembros set iamnotarobot ='$code' where uid='$email_id';";
    mysqli_query($con, $insert);
$idx = mysqli_query($con, $select);    
$array = mysqli_fetch_array($idx);
$userid = $array["unumero"];
echo $userid;
*/
?>