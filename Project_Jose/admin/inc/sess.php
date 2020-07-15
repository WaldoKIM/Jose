<?php
session_start();
$s_id = isset($_SESSION["uid"])? $_SESSION["uid"] : "";
$idx = isset($_SESSION["unumero"])? $_SESSION["unumero"] : "";

if($s_id != "rootkim@admin.com" && $idx != 1){
    echo "<dvi id='x'></div>";
    echo "<script type='text/javascript'>
    var img = document.createElement('img');
    var src = document.getElementById('x');

    var response = confirm(\"해당 페이지는 관리자 권한을 필요로 합니다.\");
if ( response == true )
{
   location.href='../../login/login.html' 
} else {
img.src = 'https://i.imgur.com/GWVvTYM.gif';
src.appendChild(img);
document.write('<p>','Ah ah ah! You didn\'t say The Magic Word!',
'</p>','<a href=\'../../login/login.html\'>돌아가기</a>');	
}
</script>";
return false;    
}


