<?php include "inc/dbcon.php"; ?>

<!doctype html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area"> 
    <table class="list-table">
      <thead>
          <tr>
                <th width="500"></th>
                <th width="100"></th>
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
              $sql = "select * from plaza_tablero where tatencion=1";
              $result = mysqli_query($con, $sql);
            
              $row_num = mysqli_num_rows($result); //게시판 총 레코드 수
              $list = 4; //한 페이지에 보여줄 개수
              $block_ct = 5; //블록당 보여줄 페이지 개수

              $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
              $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
              $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

              $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
              if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
              $total_block = ceil($total_page/$block_ct); //블럭 총 개수
              $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

              $sql2 = "select * from plaza_tablero where tatencion=1 order by tidx desc limit $start_num, $list";  
                
              $result2 = mysqli_query($con, $sql2);     
        
              while($board = mysqli_fetch_array($result2)){
              $title=$board["ttitle"]; 
                if(strlen($title)>50)
                { 
                  $title=str_replace($board["ttitle"],mb_substr($board["ttitle"],0,50,"utf-8")."...",$board["ttitle"]);
                }
              
               // $sql3 = mq("select * from reply where con_num='".$board['idx']."'");
              //  $rep_count = mysqli_num_rows($sql3);
              ?>
            
                    
         <!--    <div>
            <?php if($board['tatencion']=="1"){ ?>  <a href='page/board/read.php?tidx=<?php echo $board["tidx"]; ?>'><?php echo '<b>&#91;공지사항&#93;&nbsp;'.$title.'</b></a>'; } ?>     
             </div>
             -->      
        
        <?php 
                  //스트링을 시간타입으로 변환 후 시간 제거
            $ndate = $board['tdate'];
            $newDate = date("Y-m-d",strtotime($ndate));
        
             ?>
        
      <tbody>
        <tr>
          
          <td width="500"><?php 
          if($board['tatencion']=="1"){ ?>  <a href='page/board/read.php?tidx=<?php echo $board["tidx"]; ?>'><?php echo '<b>&#91;공지사항&#93;&nbsp;'.$title.'</b></a>'; }        
           else if($board['tsecret']=="1")
          { ?><a href='page/board/ck_read.php?tidx=<?php echo $board["tidx"];?>'><?php echo $title.'&nbsp;&#40;<i>비밀글</i>&#41;</a>';
            }else{  ?>
              <a href='page/board/read.php?tidx=<?php echo $board["tidx"]; ?>'><?php echo $title; }?></a></td>
         
          <td width="100"><?php echo $newDate?></td> 
        
            
             
              </a></tr>
      </tbody>
      <?php } ?>
    </table>
   
  </div>
</body>
</html>