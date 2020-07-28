<?php 
    include "../inc/sess.php";

    // DB 연결
    include "../../inc/dbcon.php";

    // 쿼리 작성
    $sql = "select * from miembros;";
    
    // 쿼리 전송
    $result = mysqli_query($con, $sql);

    // 데이터 가져오기
    // mysqli_fetch_array : 필드명
    // mysqli_fetch_row : 필드 순서
    // mysqli_num_rows : 행 개수
    $num = mysqli_num_rows($result);

if($s_id != "intkim777@gmail.com" && $idx != 1){

return false;    
}


?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>회원 관리</title>
    <style type="text/css">
        body{font-size:20px}
        td{text-align:center}
    </style>
    <script type="text/javascript">
        function logout_check(){
            var q = confirm("정말 로그아웃하시겠습니까?");
            
            if(q){
                location.href="../../login/logout.php";
            };
        };
        
        
    </script>
</head>
<body>
    <h2>관리자 페이지</h2>
    <p>
        안녕하세요. 관리자님 
        <a href="#none" onclick="logout_check()">로그아웃</a>
    </p>
    <p>
       <a href="../admin.php">처음으로</a>
        <a href="list.php">회원관리</a>
        <!--<a href="../notice/list.php">공지사항 관리</a>-->
        <a href="#none">공지사항 관리</a>
    </p>
    <hr>
    <p>
        총 : <span class=""><?php echo $num; ?></span>명
    </p>
    <table border="1" cellpadding="5">
        <tr>
            <td width="50">번호</td>
            <td width="100">이름</td>
            <td width="100">아이디</td>
            <td width="200">전화번호</td>
            <td width="300">이메일</td>
            <td width="150">가입일</td>
            <td width="80">보기</td>
            <td width="80">수정</td>
            <td width="80">삭제</td>
        </tr>
        
        <!-- php와 js의 반복문은 같다
        for( 초기값; 최종값; 증감량){ }
        while( ){ }
        -->
        
        <?php 
        for($i=1; $i<=$num; $i++){
        
        //DB에서 데이터 가져오기 Php는 한번에 하나의 데이터만 소환가능
        //따라서 반복문으로 하나씩 불러와야 한다.
        $array = mysqli_fetch_array($result);
        //row였으면 0,1,2,...로 php의 훼이크에 넘어가지 말 것!
    
        
            
        
        ?>
        
        <tr>
            <td width="50"><?php echo $i;?></td>
            <td width="100"><?php echo $array["unombre"];?></td>
           <!-- php 
        for($i=1; $i<=$num; $i++){
           php
            if $i%6==0
            echo "홍"
            else
            if $i%6==1
            echo "청"    
            else
            if $i%6==2
            echo "황"    
            else
            if $i%6==3
            echo "록"    
            else
            if $i%6==4
            echo "흑"    
            else
            if $i%6==5
            echo "백"    
            else    
        ?>
         php     
        }
          php-->
           
            <td width="100"><?php echo $array["uid"];?></td>
            <td width="200"><?php echo $array["utelefono"];?></td>
            <td width="300"><?php $news = $array["unews"];
                if ($news == 1){ echo "이메일 소식지 수신";}
                else{echo "이메일 소식지 수신 안함";};
                                ?></td>
            <td width="150"><?php echo $array["ureg_fetcha"];?></td>
            <td width="80">
                <a href="view.php?unumero=<?php echo $array["unumero"];?>">보기</a>
            </td>
            <td width="80">
                <a href="edit.php?unumero=<?php echo $array["unumero"];?>">수정</a>
            </td>
            <td width="80">
                <a href="#none" onclick="del_con()">삭제</a>
            </td>
        </tr>
        
        <?php     
        }
        ?>        
        <!--위와 같이 시작부분과 끝부분을 따로 php로 묶어주면 중간 명령어에 echo문을 생략 가능하다. 근데 어차피 중간에 php문 섞어줘야 한다. 그럼 php 안에 php문을 넣어야 하는건가?-->
        <script type="text/javascript">
        function del_con(){
            var i = confirm("Are you sure?");
            if(i==true){
                var ii = confirm("Are you really sure? This action cannot be undone!");
                if (ii == true){
                location.href = "delete.php?unumero=<?php echo $array["unumero"];?>";
            }
            }
        };</script>
    </table>
</body>
</html>










