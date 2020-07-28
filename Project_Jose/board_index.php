<?php include "inc/dbcon.php"; ?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
    <style>.notice {width:1000px;border:none} 
        li {list-style: none; float: left; margin-left: 10px;}</style>
</head>
<body>
<div id="board_area"> 
  <h1>자유게시판</h1>
  <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
<iframe class="notice" src="board_notices.php" title="공지사항"></iframe>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
        // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
        /*  $sql = mq("select * from plaza_tablero order by tidx desc limit 0,5"); 
            while($board = $sql->fetch_array())
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["ttitle"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($board["ttitle"],mb_substr($board["ttitle"],0,30,"utf-8")."...",$board["ttitle"]);
              }*/
                
         if(isset($_GET['page'])){
          $page = $_GET['page'];
            }else{
              $page = 1;
            }
              $sql = "select * from plaza_tablero";
        
              $result = mysqli_query($con, $sql);
            
              $row_num = mysqli_num_rows($result); //게시판 총 레코드 수
        
              $list = 5; //한 페이지에 보여줄 개수
              $block_ct = 5; //블록당 보여줄 페이지 개수

              $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
              $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
              $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

              $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
              if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
              $total_block = ceil($total_page/$block_ct); //블럭 총 개수
              $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

              $sql2 = "select * from plaza_tablero order by tidx desc limit $start_num, $list";  
            
              $result2 = mysqli_query($con, $sql2);     
        
              while($board = mysqli_fetch_array($result2)){
              $title=$board["ttitle"]; 
                if(strlen($title)>50)
                { 
                  $title=str_replace($board["ttitle"],mb_substr($board["ttitle"],0,30,"utf-8")."...",$board["ttitle"]);
                }
              
               // $sql3 = mq("select * from reply where con_num='".$board['idx']."'");
              //  $rep_count = mysqli_num_rows($sql3);
              ?>
            
                    
           
        
        
        
      <tbody>
        <tr>
          <td width="70"><?php echo $board['tidx']; ?></td>
          <td width="500"><?php 
          if($board['tatencion']=="1"){ ?>  <a href='page/board/read.php?tidx=<?php echo $board["tidx"]; ?>'><?php echo '<b>&#91;공지사항&#93;&nbsp;'.$title.'</b></a>'; }        
           else if($board['tsecret']=="1")
          { ?><a href='page/board/ck_read.php?tidx=<?php echo $board["tidx"];?>'><?php echo $title.'&nbsp;&#40;<i>비밀글</i>&#41;</a>';
            }else{  ?>
              <a href='page/board/read.php?tidx=<?php echo $board["tidx"]; ?>'><?php echo $title; }?></a></td>
          <td width="120"><?php echo $board['unombre']?></td>
          <td width="100"><?php echo $board['tdate']?></td> 
          <td width="100"><?php echo $board['thit']; ?></td>
              </a></tr>
      </tbody>
      <?php } ?>
    </table>
    <!---페이징 넘버 --->
    <div id="page_num">
      <ul>
        <?php
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면
            echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시 
          }else{
            echo "<li><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
          }
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면 빈값
            
          }else{
          $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
            echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
            if($page == $i){ //만약 page가 $i와 같다면 
              echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
            }else{
              echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
            }
          }
          if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
          }else{
            $next = $page + 1; //next변수에 page + 1을 해준다.
            echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
          }
          if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
            echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
          }else{
            echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
          }
        ?>
      </ul>
    </div>
    <div id="write_btn">
      <a href="page/board/write.php"><button>글쓰기</button></a>
    </div>
    <div id="main_btn">
      <a href="javascript:history.go(-1)"><button>이전 화면으로</button></a>
    </div>
    
  </div>
</body>
</html>