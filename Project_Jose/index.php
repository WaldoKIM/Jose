<?php 
    session_start();
    $s_id = isset($_SESSION["uid"])? $_SESSION["uid"] : "";
    $s_name = isset($_SESSION["unombre"])? $_SESSION["unombre"] : "";
    $s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";


    // 로그인 정보 확인
    // echo $_SESSION["uid"]."/".$_SESSION["uname"];
include "inc/dbcon.php"; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
       <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
       <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="index.css"/>
         <link href="bxslider-4-4.2.12/src/css/jquery.bxslider.css" rel="stylesheet" />
   <style>
.site_link .arrow1 {display:inline-block; width: 30px; height: 30px; background:url(images/arrow_footer.png)no-repeat center; animation:spin 1s forwards; animation-play-state: running; text-indent: -99999px;position: absolute; top:18px;}
.site_link .arrow2{display:inline-block; width: 30px; height: 30px;background:url(images/arrow_footer.png)no-repeat center;  animation:spin1 1s forwards; animation-play-state: running; text-indent: -99999px;position: absolute; top:18px;}
@keyframes spin1 {100% {transform: rotate(180deg);}} 
@keyframes spin {0% {transform: rotate(180deg);}
                100% {transform: rotate(360deg);}} 
 div.box { width:460px; height:250px; border:2px solid #fff; position: absolute; left:50%; top:20%;z-index:2; margin-left:-207px;padding: 0 20px 0;}
div.box1 {width:100%; height:1920px; position: absolute;z-index:999;box-sizing: border-box;background-color:rgba(0,0,0,0.9);position:fixed;opacity:1}
.box h3 {text-align: center; color: white; margin-top: 35px;}
.box .bold a{color:#f3c730;text-decoration: underline;}
.box .nada{color:lavenderblush;}       
.box p a{color:#f3c730; margin: 12px auto; display: block; width: 50px;background:url(images/arrownotice.png) no-repeat center;text-indent: -9999px;}       
</style>
  
<title>중남미 문화원</title>
</head>
<body id="oneaboveall">
<div id="att1" class="box1">
<div id="att2" class="box">
<h3>본 사이트는 비 상업적 목적의 개인용 포트폴리오 용으로 제작되었으며,
    <span class="bold"><a href="http://latina.or.kr">재단법인 중남미 문화원 공식 사이트</a></span>와는 <strong class="nada">무관함을 밝힙니다.</strong><br><br> 아울러 본 사이트에 사용된 모든 콘텐츠들의 저작권은<br> 해당 권리자에게 있습니다.</h3>
    <p><a class="okay" href="#none" onclick="gotit()">확인</a></p>   
</div>
</div>
<script>
setTimeout(function gotit(){
var de = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.opacity="0.9";
}, 30);}

var de1 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.opacity="0.8";
}, 90);}


var de2 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.opacity="0.7";
}, 140);}

var de3 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.opacity="0.5";
}, 180);}


var de4 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.opacity="0.3";
}, 210);}

var de5 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.opacity="0.1";
}, 230);}

var de6 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
var child2 = document.getElementById("att2");
parent.removeChild(child1);
parent.removeChild(child2);
}, 240);}     

var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
var child2 = document.getElementById("att2");
de();
de1();
de2();  
de3();
de4();
de5();
de6();
}, 8000);
    
function gotit(){
var de = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="3%";
child1.style.height=1920;
child1.style.opacity="0.9";    
}, 100);}


var de1 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="5%";
child1.style.height=1870;
child1.style.opacity="0.9";    
}, 115);}

var de2 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="7%";
child1.style.height=1820;
child1.style.opacity="0.9";    
}, 130);}

var de3 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="10%";
child1.style.height=1750;
child1.style.opacity="0.8";    
}, 147);}

var de4 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="12%";
child1.style.height=1670;
child1.style.opacity="0.8";    
}, 165);}

var de5 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="15%";
child1.style.height=1600;
child1.style.opacity="0.8";    
}, 179);}

var de6 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="18%";
child1.style.height=1520;
child1.style.opacity="0.7";    
}, 193);}

var de7 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="21%";
child1.style.height=1520;
child1.style.opacity="0.7";    
}, 206);}


var de8 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="25%";
child1.style.height=1470;
child1.style.opacity="0.6";    
}, 220);}

var de9 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="29%";
child1.style.height=1370;
child1.style.opacity="0.6";    
}, 232);}

var de10 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="33%";
child1.style.height=1270;
child1.style.opacity="0.5";    
}, 245);}

var de11 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="37%";
child1.style.height=1170;
child1.style.opacity="0.5";    
}, 255);}

var de12 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="42%";
child1.style.height=1070;
child1.style.opacity="0.5";    
}, 266);}

var de13 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="47%";
child1.style.height=950;
child1.style.opacity="0.4";    
}, 275);}

var de14 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="52%";
child1.style.height=820;
child1.style.opacity="0.4";    
}, 284);}

var de15 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="57%";
child1.style.height=600;
child1.style.opacity="0.4";    
}, 291);}

var de16 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="63%";
child1.style.height=570;
child1.style.opacity="0.4";    
}, 298);}

var de17 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="69%";
child1.style.height=450;
child1.style.opacity="0.3";    
}, 302);}

var de18 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="75%";
child1.style.height=320;
child1.style.opacity="0.3";    
}, 307);}

var de19 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
child1.style.marginTop="81%";
child1.style.height=1700;
child1.style.opacity="0.3";    
}, 311);}


var de20 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
var child2 = document.getElementById("att2");
child1.style.marginTop="88%";
child1.style.height=20;
child1.style.opacity="0.2";    
parent.removeChild(child1);
parent.removeChild(child2);
}, 313);}     

var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("att1");
var child2 = document.getElementById("att2");
de();
de1();
de2();  
de3();
de4();
de5();
de6();
de7();
de8();
de9();
de10();
de11();
de12();  
de13();
de14();
de15();
de16();
de17();
de18();
de19();    
de20();        
};
</script>


<div class="skipMenu">
    <a href="#"><span>바로가기 1</span></a>
    <a href="#"><span>바로가기 2</span></a>
    <a href="#"><span>바로가기 3</span></a>
</div>
    <div id="nt" class="header">
    <div class="GNB">
    <h1 class="logo"><a href="#" onclick="ntx()">중남미<br/>문화원</a></h1>
    <h2 class="GNB_title">전체 메뉴</h2>
      <div class="GNB_position">
      <ul>
      <li class="GNB_intro"><a href="sub/intro.php">문화원 소개</a>
      <ul id="intro">
       <li><a href ="">중남미 문화원</a></li>
       <li><a href ="">설립자 소개</a></li>
       <li><a href ="">후원안내</a></li>
       <li><a href ="">채용 및 자원봉사 안내</a></li>
							</ul></li>
          <li class="GNB_museo"><a href="sub/museo.php">중남미 개관</a>
       <ul id="museo">
       <li><a href ="">중남미 소개</a></li>
       <li><a href ="">중남미 역사와 문화</a></li>
       <li><a href ="">중남미 국가들</a></li>
       <li><a href ="">지도 자료실</a></li>
       </ul></li>
       <li class="GNB_gallery">
       <a href="sub/gallery.php">이용 안내</a>
       <ul id="gallery">
       <li><a href ="">이용 안내</a></li>
       <li><a href ="">오시는길</a></li>
       <li><a href ="">예매하기</a></li>
       <li><a href ="">관람문의</a></li>
       </ul>
       </li>
       <li class="GNB_cappilla">
       <a href="sub/cappilla.php">전시 안내</a>
       <ul id="cappilla">
       <li><a href ="">박물관</a></li>
       <li><a href ="">미술관</a></li>
       <li><a href ="">종교전시관&#40;까삐야&#41;</a></li>
       <li><a href ="">야외전시</a></li>
		</ul></li>
       <li class="GNB_jardin"><a href="sub/jardin.php">시설 안내</a>
       <ul id="jardin">
       <li><a href ="">차와 식사</a></li>
       <li><a href ="">문화 시설</a></li>
       <li><a href ="">시설 안내도</a></li>
       <li><a href ="">주변 명소</a></li>
       </ul></li>
       <li class="GNB_comida"><a href="sub/comida.php">문화원 소식</a>
       <ul id="comida">
       <li><a href ="">타코 하우스</a></li>
       <li><a href ="">행사 안내</a></li>
       <li><a href ="">공지사항</a></li>
       <li><a href ="">문화원 소식</a></li>
       </ul>
       </li>
      <li class="GNB_plaza"><a href="sub/plaza.php">광장</a>
       <ul id="plaza">
        <li><a href ="">게시판</a></li>
		<li><a href ="">기념품점</a></li>
       <li><a href ="board_index.php">게시판</a></li>
       <li><a href ="Mayan_Calul/cacl.html">마야달력</a></li>
       </ul>
       </li>
		</ul>
		</div>
		</div>
    <div class="top_wrap">  
    <div class="top_menu">
    <h2 class="topmenu_title">사이트 메뉴</h2>
      <ul>
          <li><a href="">사이트맵</a></li>
          <?php
            if(!$s_id){
                echo "<li><a href='login_index.php'>로그인</a></li>";
                } else if($_SESSION['uid'] == 'intkim777@gmail.com' && $s_idx == 1){
                echo "<li><a href='admin/admin.php'><b>관리자모드</b></a></li>";
                echo "<li><a href='login/logout.php'>로그아웃</a></li>";      
            } else{
                echo "<li><a href='login/logout.php'>로그아웃</a></li>";
                echo "<li><a href='login_index.php'>계정정보</a></li>";
            }
        ?>

       <li><a href="">ENG</a></li>
       <!-- <li class="day_n_night">
       <a class="day" href="Night">Day mode</a>
       <a class="night" href="Day">Night mode</a></li>-->
       <li><span id ="todaysWeather" class="weather"></span></li>
       </ul>
       <label for="nightmode">
			<input type="checkbox" name="nightmode" id="nightmode" onclick="nightmode()">
			<span class="check"></span>
		</label>       
       </div>
   </div>
	
   </div>
    <div id="nt2" class="content">
    <!--h1은 한 페이지당 한번 만 사용-->
<div id="wrapup" class="main_banner_wrap">
        <div class="main_banner">
      <h2>현재 진행중인 행사</h2>
   <ol class=slider>
       <li class="banner2"><h3><a href="">중남미 문화원에<br>오신것을 환영합니다</a></h3>
   <p class="banner_date">1994년 설립 / Established in 1994</p><span class="linebox"><a href=""><img src="images/img_banner1.png" alt="멕시코 아즈텍 유물 태양의 돌"/></a></span></li>

   <li class="banner3"><h3><a href="">신화가 된 욕망&#44;<br>엘도라도 황금전</a></h3>
       <p class="banner_date">2020. 3. 27 ~ 2020. 4. 8</p> <span class="linebox"><a href=""><img src="images/img_banner2.png" alt="멕시코 아즈텍 유물 태양의 돌"/></a></span></li>
   
   <li class="banner4"><h3><a href="">2020<br>조각광장 목련축제</a></h3>
       <p class="banner_date">2020. 4. 10 ~ 2020. 8. 8</p> <span class="linebox"><a href=""><img src="images/img_banner3.png" alt="멕시코 아즈텍 유물 태양의 돌"/></a></span></li>
   <li class="banner1"><h3><a href="">한-에콰도르 수교 70주년<br>과야사민 특별전</a></h3>
       <p class="banner_date">2020. 2. 22 ~ 2020. 5. 8</p> <span class="linebox"><a href=""><img src="images/img_banner4.png" alt="멕시코 아즈텍 유물 태양의 돌"/></a></span>
    </li>
     </ol>   
    <div class="banner_control">                 
   <p>이전행사</p><a class="bx-prev, left"></a>
   <p>다음행사</p><a class="bx-next, right"></a>
   <div id="bar_pager">
   <div class="bar_pager_ani">
   <a id="jstest" onclick="toggleAnimation()" class="uno_ani" data-slide-index="0" href="">첫번째</a>
   <a class="dos_ani" data-slide-index="1" href="">두번째</a>
  <a class="tres_ani" data-slide-index="2" href="">세번째</a>
  <a class="quatro_ani" data-slide-index="3" href="">네번째</a>
   </div>
     <!--<a onclick="testbar()">aaa</a>
     
      <script>
        var ani1 = document.querySelector(".uno_ani");
           var ani1s = ani1.style;
           var ani2 = document.querySelector(".dos_ani");
           var ani2s = ani2.style;
           var ani3 = document.querySelector(".tres_ani");
           var ani3s = ani3.style;
           var ani4 = document.querySelector(".quatro_ani");
           var ani4s = ani4.style;
   // getComputedStyle(document.querySelector('선택자')).fontSize;
   
       function toggleAnimation() {   
           ani1s.animationPlayState = "paused";
           ani2s.animationPlayState = "paused";
           ani3s.animationPlayState = "paused";
           ani4s.animationPlayState = "paused";     
       };
       console.log(test11.zIndex);
    console.log(test22.zIndex);
    console.log(test33.zIndex);
    console.log(test44.zIndex);
   //    var test11 = document.querySelector(".uno_ani");
     //  var test111 = test11.style.animationPlayState;
       //var test1 = document.querySelectorAll('.uno_ani');
       //alert(test111.value)
// test1.style.animationPlayState = "running";
//function toggleAnimation() {
  //  test11 = "paused";
 // var style1 = test1.style;

  //if (test11.style.animationPlayState == 'running') {
   //test1.style.animationPlayState = 'paused';
    //} else {
 //test1.style.animationPlayState = 'running';
   //  }
  
</script>       
-->
       
  <a  class="uno" onclick="toggleAnimation()" data-slide-index="0" href="">첫번째</a>
  <a class="dos" data-slide-index="1" href="">두번째</a>
  <a class="tres" data-slide-index="2" href="">세번째</a>
  <a class="quatro" data-slide-index="3" href="">네번째</a>
</div>
    <!--<div class="banner_bar">
     <a class="uno" href="1">첫번째</a>
     <a class="dos" href="2">두번째</a>
     <a class="tres" href="3">세번째</a>
     <a class="quatro" href="4">네번째</a>  
       </div> -->
       <div class="pause_n_play">
         <!--<a class="pause" href="#none">정지</a>
           <a class="play" href="#">진행</a> -->
       </div>
        </div>
   <!-- 여기까지 스크립트로 구현, 총 4개의 배너가 순서대로 순환-->
   </div>
        </div>
<div class="ribbon"></div>

        <div class="mid_bg">
        <div class="mid_content_wrap"> 
    <div class="index_booking">
    <h2><a class="itoggle" href="#none" onclick="pops()">예매하기</a></h2>
    <span class="wline"></span>
    <p>방문하실 날짜를 클릭하세요</p>
        <img id="pops" class="booking_calendar" src="images/fake_calender.png" alt="임시 달력 이미지"/>
    <!-- <iframe class="booking_calendar"></iframe> 
    
    <h3><a class="exlink" href="#none" onclick="pops()">관련사이트</a><a id="arw" class="arrow" onclick="pops()" href="#none">펼치기</a></h3>
    <script>
    function pops() {
var arw = document.querySelector('#arw');
if(arw.className == "arrow" || arw.className == "arrow2"){
   arw.className = "arrow1";
    }else{
    arw.className = "arrow2";
    }
    };
</script>    
-->
    
    
    
    
   <div class="general_info"><h3>이용안내</h3>
   <dl>
   <dt><strong>&#124; 관람시간</strong></dt>
   <dd><strong>오전 10 : 00 - 오후 6 : 00</strong></dd>
   <dd> 휴관일 : <strong>매주 월요일, 설, 추석당일</strong></dd>
   <dd class="red"> &#42;동절기(11월~3월)는 1시간 단축 운영합니다</dd>
   <dd class="red"> &#42;폐장시간 1시간 전까지 입장 가능합니다</dd>
   </dl>
    <dl>
        <dt><strong>&#124; 관람요금</strong></dt>
        <dd><strong> 성인 : 6,500원</strong></dd>
        <dd> 청소년 : 5,500원
        </dd>
    <dd> 만12세 이하 : 4,500원</dd>
    <dd class="red"> &#42;20인 이상 단체, 경로, 장애우, 국가유공자는 관람료의 20&#37;가 할인됩니다</dd>
    </dl>
   <a class="plus" href="/information.html">더보기</a>
    </div>
    </div>
    
    <div class="notice">    
        <h2>&#124; 공지사항</h2>
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
        
        <?php  //스트링을 시간타입으로 변환 후 시간 제거
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


      
      
      
      
       <!--<ul>
        <li><a href="">신종 코로나 바이러스 관련 문화원 개장 안내</a> <span class="date">2020-03-03</span></li>
        <li><a href="">문화원 내 빠예야 레스토랑 영업 중단 안내</a> <span class="date">2020-03-03</span></li>
        <li><a href="">문화가 있는 날 이용료 할인에 대한 안내</a> <span class="date">2020-03-03</span></li>
        <li><a href="">문화원 야간개장 이벤트-쿠바 재즈의 밤 행사 공지</a> <span class="date">2020-03-03</span></li>
    </ul> -->
    <a href="board_notice.php">더보기</a>
  </div>
  
  <div class="shortcut">
      <h2>자주찾는 메뉴 바로가기</h2>
     <ul class="sqr">
     <li id="sq1" class="square1"><a id="sqa1" href="/introduction.html">문화원소개</a><div id="sqh1"  class="square1a"></div></li>
      <li id="sq2" class="square2"><a id="sqa2" href="/introduction.html">오시는 길</a><div id="sqh2"  class="square2a"></div></li>
      <li id="sq3" class="square3"><a id="sqa3" href="/programmes.html">전시 안내</a><div id="sqh3"  class="square3a"></div></li>
      <li id="sq4" class="square4"><a id="sqa4" href="/news.html">문화원 소식</a><div id="sqh4"  class="square4a"></div></li>
      </ul>
      <ul class="crs">
      <li id="cr1" class="circle1">
          <div id="crh1" class="circlea"></div>
          <a id="cra1" class="circle" href="/news1.html"></a>
          <a id="craa1" class="title" href="/news1.html">문화원 주변 명소</a></li>
      <li id="cr2" class="circle2">
         <div id="crh2" class="circlea"></div>
          <a id="cra2" class="circle" href="/news2.html"></a>
          <a id="craa2" class="title" href="/news2.html">타코 하우스</a></li>
      <li id="cr3" class="circle3">
         <div id="crh3" class="circlea"></div>
          <a id="cra3" class="circle" href="/news3.html"></a>
          <a id="craa3" class="title" href="/news3.html">설립자 소개</a></li>
      <li id="cr4" class="circle4">
         <div id="crh4" class="circlea"></div>
          <a id="cra4" class="circle" href="board_index.php"></a>
          <a id="craa4" class="title" href="board_index.php">게시판</a></li>
      <li id="cr5" class="circle5">
         <div id="crh5" class="circlea"></div>
          <a id="cra5" class="circle" href="/news5.html"></a>
          <a id="craa5" class="title" href="/news5.html">관람문의</a></li>
      </ul>
  </div>
</div>         
   
   <div class="foundation">
       <div class="f_wrap">
       <h2>감사의 말씀</h2>
       <a class="donate" href="foundation.html">문화원 후원하기</a></div>
       <div class="fading"></div>
       <ul>
           <li class="first_li">강감찬</li> <li>견미리</li>  <li>고길동</li>  <li>구기자</li>  <li>기성용</li>  <li>나도향</li>  <li>노무현</li>  <li>도원경</li>  <li>두치</li>  <li>라미란</li>  <li>리철중</li>  <li>마동탁</li>  <li>무과장</li>  <li>부구</li>  <li>사미자</li>  <li>서경석</li>  <li>소찬휘</li>  <li>오두기</li>  <li>우선욱</li>  <li>이태원</li>  <li>제갈량</li>   <li>조국</li>  <li>지루박</li>  <li>차범근</li>  <li>추성훈</li>  <li>코바야시 노구라</li>  <li>탐 크루즈</li>  <li>톰 행크스</li> <li>프리메이슨 석공조합 조합원 일동</li>  <li>홍길동</li> <li>울트라맨</li> <li>파워레인져스</li> <li>리처드 기어</li> <li>강감찬</li> <li>견미리</li> <li>고길동</li> <li>구기자</li> <li>기성용</li>  <li>나도향</li>  <li>노무현</li>  <li>도원경</li>  <li>두치</li>  <li>라미란</li>  <li>리철중</li> <li>마동탁</li>  <li>무과장</li>  <li>부구</li>  <li>사미자</li>  <li>서경석</li> 
       </ul>       
    </div>
    </div>   
    <div class="end_content_wrap">
    
   <div class="external_event">
    <h2>원외 문화 행사 소개</h2>
      <dl>
          <dt>국내 각종 중남미 관련 문화 행사를 소개합니다</dt>
          <dd id="jq1" class="ex_event1">
          <div id="jqpa1" class="poster1a"></div>
          <a id="jqp1" class="poster1" href=""></a>
          
          <a id="jqt1" class="title1" href="">&#91;주한 멕시코 대사관&#93;<br/><strong>부에나 비스타 소셜 클럽</strong></a>
          </dd>
          <dd id="jq2" class="ex_event2">
          <div id="jqpa2" class="poster2a"></div>          
          <a id="jqp2" class="poster2" href=""></a>
          <a id="jqt2" class="title2" href="">&#91;주한 아르헨티나 대사관&#93;<br/><strong>탱고 데 부에노스 아이레스</strong></a></dd>
          <dd id="jq3" class="ex_event3">
          <div id="jqpa3" class="poster3a"></div><a id="jqp3" class="poster3" href=""></a>
          <a id="jqt3" class="title3" href="">&#91;소극장 디시인사이드&#93;<br/><strong>대신귀 여운알 파카를 드리겠 습니다</strong></a></dd>
          <dd id="jq4" class="ex_event4">
          <div id="jqpa4" class="poster4a"></div><a id="jqp4" class="poster4" href=""></a>
          <a id="jqt4" class="title4" href="">&#91;까페 로스 까브로네스&#93;<br/><strong>죽은자들의 밤 만찬회</strong></a></dd>         
      </dl>  
    <div class="events"><a  href="/events.html">문화행사 전체보기/홍보 문의</a></div>    
   </div>
    </div>      
  
  </div>
    
    <div class="footer">
    <div class="fwrap">
    <div class="SNS">
        <h2>SNS links</h2>
        <div class="sns_icon_wrap">
        <ul>
        <li class="kakao"><a href="">코코아톡</a></li>
        <li class="twitter"><a href="">파랑새</a></li>
        <li class="youtube"><a href="">미튜브</a></li>
        <li class="facebook"><a href="">페이크북</a></li>
        <li class="instagram"><a href="">맛스타그램</a></li>
        <li class="line"><a href="">온라인</a></li>    
        </ul>
        </div>
    </div>
    
    <h2 class="logo"><a href="#">중남미<br/>문화원</a></h2>
    
    <div class="footer_info">
    <div class="wrap">
    <div class="footer_law">   
        <h2>법적 고지 사항</h2>
        <ul>
        <li><a href="privacy_policy.html">개인정보취급방침</a></li>
            <li><a href="privacy_policy.html">이메일집단수집거부</a></li>
        <li><a href="privacy_policy.html">이용약관</a></li>
        </ul>
        </div>
        

<div class="site_link">
    <h3><a class="exlink" href="#none" onclick="pop()">관련사이트</a><a id="arw" class="arrow" onclick="pop()" href="#none">펼치기</a></h3>
    
    
<script language="javascript">
    //조건문 쓸때 꼭 앞에 대상도 써줄것, 설령 같은 대상이라도)
    //id 선택문 대신 this로도 가능하다.
function pop() {
var arw = document.querySelector('#arw');
if(arw.className == "arrow" || arw.className == "arrow2"){
   arw.className = "arrow1";
    }else{
    arw.className = "arrow2";
    }
    };
</script>    
<ul id="pop">
  <li><a target="arg"  href="https://ecore.cancilleria.gob.ar/ko">주한아르헨티나대사관</a></li>
  <li><a target="chl"  href="https://chile.gob.cl/corea-del-sur/">주한칠레대사관</a></li>
  <li><a target="per" name="x"  href=http://www.consulado.pe/es/Seul/Paginas/Inicio.aspx>주한페루대사관</a></li>
  <li><a target="mex" href="https://embamex.sre.gob.mx/corea/index.php">주한멕시코대사관</a></li>
</ul>
</div>     
</div>
  <div class="texts">
   <div class="address">
   <h2>주소 및 연락처</h2>
    <address>
    (30114) 경기도 고양시 대양로 285번길 33-15(고양동 302-1)</address> 재단법인명 : 중남미문화원 병설 박물관 원장 : 이복형 전화 : 031-962-7171 팩스 : 031-964-8218 E-mail : latinamuseum@gmail.com
    </div>
    <div class="law_n_order">
    <h2>저작권 안내</h2>
<p>Copyright&copy;2020 재단법인 중남미문화원 병설 박물관(CENTRO CULTURAL DE AMERICA LATINA Y MUSEO). All Rights Reserved.</p> 해당 웹사이트의 모든 자료는 재단법인 중남미문화원의 허락 없이 무단으로 복제, 배포 사용할 수 없습니다. <p>PLEASE DO NOT SHARE WITH ANYONE WITHOUT A PERMISSION BY AUTHOR OR PERSON WHO HAS THE LEGAL RESPONSIBILITY OF COPYRIGHT.<br/>PLEASE ASK OUR LEGAL SUPPORT REPRESENTATIVE FOR DETAILS. SHARE RESPONSIBLY.</p>
</div>
</div>
</div>
</div>
</div>
<!--사이트 처음 방문시 슬라이드배너 지연 현상 방지용 이미지 로드 -->
<div class="preload">
<img src="images/main_banner_bg1.png" alt="노란색 배경"/>
<img src="images/main_banner_bg2.png" alt="자주색 배경"/>
<img src="images/main_banner_bg3.png" alt="초록색 배경"/>
<img src="images/main_banner_bg4.png" alt="파란색 배경"/> 
</div>

</body>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script src="bxslider-4-4.2.12/src/js/jquery.bxslider.js"></script>
<script>
    function parseWeather() 
    { 
  loadJSON(function(response) 
  {
  var jsonData = JSON.parse(response);
      var cur_temp = jsonData.main.temp - 273.15
               document.getElementById("todaysWeather").innerHTML = //jsonData.weather[0].main;
               Math.round(cur_temp) + '&#176C' + '&#32;&#124;&#32;' + jsonData.weather[0].main
               ;    
            });
            }
        function loadJSON(callback) //url의 json 데이터 불러오는 함수
           {   
              var url = "http://api.openweathermap.org/data/2.5/weather?q=goyang,kr&appid=049198b75991575f3b0099bc976fc597";

              var request = new XMLHttpRequest();

              request.overrideMimeType("application/json");

              request.open('GET', url, true);

              request.onreadystatechange = function () 
              {

                if (request.readyState == 4 && request.status == "200") 
                {

                  callback(request.responseText);
                }
              };

              request.send(null);  
          } 

          window.onload = function()
          {
            parseWeather();
          }

    </script>
<script>
$(function(){
    
/*('.slider').slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});    */
//달력 토글 이벤트
/*    
$(".itoggle ").click(function(){
    $("#pops").slideToggle();
}, function(){
    $("#pops").slideToggle();
});*/    
    
    
//관련사이트 토글 이벤트

$(".site_link a").click(function(){
    $("#pop").slideToggle();
}, function(){
    $("#pop").slideToggle();
});

//바로가기 4종 호버 이벤트 
//왼쪽 상단
 $("#sq1, #sqa1, #sqh1").mouseenter(function(){
    $("#sq1").stop().animate({
        top:"-30px",
              }, { duration: 300, queue: false });
         // Animation complete.
      $("#sqh1").stop().animate({
        opacity:1,
         top:"0px",
      },  { duration: 300, queue: false });
});
});
$("#sq1, #sqa1, #sqh1").mouseenter(function(){       
  $("#sqa1").css({
    backgroundColor:'rgba(0,0,0,0)',
}, function() {
});   
});
 $("#sq1, #sqa1, #sqh1").mouseleave(function(){
    $("#sq1").stop().animate({
        top:"0px",
              }, { duration: 300, queue: false });
    // Animation complete.
      $("#sqh1").stop().animate({
        opacity:0,
         top:"0px",
      },  { duration: 300, queue: false });
});
$("#sq1, #sqa1, #sqh1").mouseleave(function(){       
  $("#sqa1").css({
    backgroundColor:'rgba(0,0,0,0.3)',
}, function() {
});   
});   
//우측 상단
$("#sq2, #sqa2, #sqh2").mouseenter(function(){
    $("#sq2").stop().animate({
        top:"-30px",
              }, { duration: 300, queue: false });
    // Animation complete.
      $("#sqh2").stop().animate({
        opacity:1,
         top:"0px",
      },  { duration: 300, queue: false });
});

$("#sq2, #sqa2, #sqh2").mouseenter(function(){       
  $("#sqa2").css({
    backgroundColor:'rgba(0,0,0,0)',
}, function() {
});   
});
 $("#sq2, #sqa2, #sqh2").mouseleave(function(){
    $("#sq2").stop().animate({
        top:"0px",
              }, { duration: 300, queue: false });
    // Animation complete.
      $("#sqh2").stop().animate({
        opacity:0,
         top:"0px",
      },  { duration: 300, queue: false });
});
$("#sq2, #sqa2, #sqh2").mouseleave(function(){       
  $("#sqa2").css({
    backgroundColor:'rgba(0,0,0,0.3)',
}, function() {
});   
});    
    
//좌측 아래
$("#sq3, #sqa3, #sqh3").mouseenter(function(){
    $("#sq3").stop().animate({
        top:"-30px",
              }, { duration: 300, queue: false });
    // Animation complete.
      $("#sqh3").stop().animate({
        opacity:1,
         top:"0px",
      },  { duration: 300, queue: false });
});

$("#sq3, #sqa3, #sqh3").mouseenter(function(){       
  $("#sqa3").css({
    backgroundColor:'rgba(0,0,0,0)',
}, function() {
});   
});
 $("#sq3, #sqa3, #sqh3").mouseleave(function(){
    $("#sq3").stop().animate({
        top:"0px",
              }, { duration: 300, queue: false });
    // Animation complete.
      $("#sqh3").stop().animate({
        opacity:0,
         top:"0px",
      },  { duration: 300, queue: false });
});
$("#sq3, #sqa3, #sqh3").mouseleave(function(){       
  $("#sqa3").css({
    backgroundColor:'rgba(0,0,0,0.3)',
}, function() {
});   
});    
//오른쪽 아래    
$("#sq4, #sqa4, #sqh4").mouseenter(function(){
    $("#sq4").stop().animate({
        top:"-30px",
              }, { duration: 300, queue: false });
    // Animation complete.
      $("#sqh4").stop().animate({
        opacity:1,
         top:"0px",
      },  { duration: 300, queue: false });
});

$("#sq4, #sqa4, #sqh4").mouseenter(function(){       
  $("#sqa4").css({
    backgroundColor:'rgba(0,0,0,0)',
}, function() {
});   
});
 $("#sq4, #sqa4, #sqh4").mouseleave(function(){
    $("#sq4").stop().animate({
        top:"0px",
              }, { duration: 300, queue: false });
    // Animation complete.
      $("#sqh4").stop().animate({
        opacity:0,
         top:"0px",
      },  { duration: 300, queue: false });
});
$("#sq4, #sqa4, #sqh4").mouseleave(function(){       
  $("#sqa4").css({
    backgroundColor:'rgba(0,0,0,0.3)',
}, function() {
});   
});

//원형 메뉴 호버 이벤트
//써어클1
$("#cr1, #cra1, #cr1aa").mouseenter(function(){
    $("#cra1").stop().animate({
        top:"-30px",
          }, { duration: 300, queue: false });
  $("#craa1").stop().animate({
        top:"-30px",
          }, { duration: 300, queue: false });
     $("#crh1").stop().animate({
        opacity:1,
         top:"-30px", 
  },  { duration: 300, queue: false });
});
$("#cr1, #cra1, #cr1aa").mouseenter(function(){       
  $("#craa1").css({
    color:"#d50055",
}, function() {

});   
});  
$("#cr1, #cra1, #cr1aa").mouseleave(function(){
    $("#cra1").stop().animate({
        top:"0px",
          }, { duration: 300, queue: false });
  $("#craa1").stop().animate({
        top:"0px",
          }, { duration: 300, queue: false });
     $("#crh1").stop().animate({
        opacity:0,
         top:"0px", 
  },  { duration: 300, queue: false });
});
$("#cr1, #cra1, #cr1aa").mouseleave(function(){       
  $("#craa1").css({
    color:"",
}, function() {
});   
});      
//써어클2
$("#cr2, #cra2, #cr2aa").mouseenter(function(){
    $("#cra2").stop().animate({
        top:"-30px",
          }, { duration: 300, queue: false });
  $("#craa2").stop().animate({
        top:"-30px",
          }, { duration: 300, queue: false });
     $("#crh2").stop().animate({
        opacity:1,
         top:"-30px", 
  },  { duration: 300, queue: false });
});
$("#cr2, #cra2, #cr2aa").mouseenter(function(){       
  $("#craa2").css({
    color:"#d50055",
}, function() {

});   
});  
$("#cr2, #cra2, #cr2aa").mouseleave(function(){
    $("#cra2").stop().animate({
        top:"0px",
          }, { duration: 300, queue: false });
  $("#craa2").stop().animate({
        top:"0px",
          }, { duration: 300, queue: false });
     $("#crh2").stop().animate({
        opacity:0,
         top:"0px", 
  },  { duration: 300, queue: false });
});
$("#cr2, #cra2, #cr2aa").mouseleave(function(){       
  $("#craa2").css({
    color:"",
}, function() {
});   
});     
//써어클3
$("#cr3, #cra3, #cr3aa").mouseenter(function(){
    $("#cra3").stop().animate({
        top:"-30px",
          }, { duration: 300, queue: false });
  $("#craa3").stop().animate({
        top:"-30px",
          }, { duration: 300, queue: false });
     $("#crh3").stop().animate({
        opacity:1,
         top:"-30px", 
  },  { duration: 300, queue: false });
});
$("#cr3, #cra3, #cr3aa").mouseenter(function(){       
  $("#craa3").css({
    color:"#d50055",
}, function() {

});   
});  
$("#cr3, #cra3, #cr3aa").mouseleave(function(){
    $("#cra3").stop().animate({
        top:"0px",
          }, { duration: 300, queue: false });
  $("#craa3").stop().animate({
        top:"0px",
          }, { duration: 300, queue: false });
     $("#crh3").stop().animate({
        opacity:0,
         top:"0px", 
  },  { duration: 300, queue: false });
});
$("#cr3, #cra3, #cr3aa").mouseleave(function(){       
  $("#craa3").css({
    color:"",
}, function() {
});   
});     
    
//써어클4
$("#cr4, #cra4, #cr4aa").mouseenter(function(){
    $("#cra4").stop().animate({
        top:"-30px",
          }, { duration: 300, queue: false });
  $("#craa4").stop().animate({
        top:"-30px",
          }, { duration: 300, queue: false });
     $("#crh4").stop().animate({
        opacity:1,
         top:"-30px", 
  },  { duration: 300, queue: false });
});
$("#cr4, #cra4, #cr4aa").mouseenter(function(){       
  $("#craa4").css({
    color:"#d50055",
}, function() {

});   
});  
$("#cr4, #cra4, #cr4aa").mouseleave(function(){
    $("#cra4").stop().animate({
        top:"0px",
          }, { duration: 300, queue: false });
  $("#craa4").stop().animate({
        top:"0px",
          }, { duration: 300, queue: false });
     $("#crh4").stop().animate({
        opacity:0,
         top:"0px", 
  },  { duration: 300, queue: false });
});
$("#cr4, #cra4, #cr4aa").mouseleave(function(){       
  $("#craa4").css({
    color:"",
}, function() {
});   
});     
    
//써어클5    
$("#cr5, #cra5, #cr5aa").mouseenter(function(){
    $("#cra5").stop().animate({
        top:"-30px",
        opacity:0,
          }, { duration: 300, queue: false });
  $("#craa5").stop().animate({
        top:"-30px",
          }, { duration: 300, queue: false });
     $("#crh5").stop().animate({
        opacity:1,
         top:"-30px", 
  },  { duration: 300, queue: false });
});
$("#cr5, #cra5, #cr5aa").mouseenter(function(){       
  $("#craa5").css({
    color:"#d50055",
}, function() {

});   
});  
$("#cr5, #cra5, #cr5aa").mouseleave(function(){
    $("#cra5").stop().animate({
        top:"0px",
        opacity:1,
          }, { duration: 300, queue: false });
  $("#craa5").stop().animate({
        top:"0px",
          }, { duration: 300, queue: false });
     $("#crh5").stop().animate({
        opacity:0,
         top:"0px", 
  },  { duration: 300, queue: false });
});
$("#cr5, #cra5, #cr5aa").mouseleave(function(){       
  $("#craa5").css({
    color:"",
}, function() {
});   
});     
    

    

    
    
    
    
//외부 행사 링크 호버 이벤트 
//포스터1    
$("#jq1, #jqp1, #jqt1").mouseenter(function(){
    $("#jqp1").stop().animate({
        top:"-26px",
        borderWidth:8
      }, { duration: 300, queue: false });
    // Animation complete.
 
     $("#jqpa1").stop().animate({
        opacity:1,
         top:"42px",
      },  { duration: 300, queue: false });
});

   
    
    
$("#jq1, #jqp1, #jqt1").mouseenter(function(){       
  $("#jqt1").css({
    color:"#d50055",
}, function() {

});   
});  
$("#jq1, #jqp1, #jqt1").mouseleave(function(){
    $("#jqp1").stop().animate({
        top:"0px",
        borderWidth:4
      }, { duration: 300, queue: false });
    // Animation complete.
 
     $("#jqpa1").stop().animate({
        opacity:0,
         top:"72px"
      },  { duration: 300, queue: false });
});
    
    
$("#jq1, #jqp1, #jqt1").mouseleave(function(){       
  $("#jqt1").css({
    color:"",
}, function() {
});   
});     



//포스터2    
 $("#jq2, #jqp2, #jqt2").mouseenter(function(){
    $("#jqp2").stop().animate({
        top:"-26px",
        borderWidth:8
      }, { duration: 300, queue: false });
    // Animation complete.
 
     $("#jqpa2").stop().animate({
        opacity:1,
         top:"42px",
      },  { duration: 300, queue: false });
});

    
$("#jq2, #jqp2, #jqt2").mouseenter(function(){       
  $("#jqt2").css({
    color:"#d50055",
}, function() {

});   
});  
$("#jq2, #jqp2, #jqt2").mouseleave(function(){
    $("#jqp2").stop().animate({
        top:"0px",
        borderWidth:4
      }, { duration: 300, queue: false });
    // Animation complete.
 
     $("#jqpa2").stop().animate({
        opacity:0,
         top:"72px"
      },  { duration: 300, queue: false });
}); 
    
$("#jq2, #jqp2, #jqt2").mouseleave(function(){       
  $("#jqt2").css({
    color:"",
}, function() {
});   
});     


//포스터3        
$("#jq3, #jqp3, #jqt3").mouseenter(function(){
    $("#jqp3").stop().animate({
        top:"-26px",
        borderWidth:8
      }, { duration: 300, queue: false });
    // Animation complete.
 
     $("#jqpa3").stop().animate({
        opacity:1,
         top:"42px",
      },  { duration: 300, queue: false });
});
$("#jq3, #jqp3, #jqt3").mouseenter(function(){       
  $("#jqt3").css({
    color:"#d50055",
}, function() {
});   
});  
$("#jq3, #jqp3, #jqt3").mouseleave(function(){
    $("#jqp3").stop().animate({
        top:"0px",
        borderWidth:4
      }, { duration: 300, queue: false });
    // Animation complete.
 
     $("#jqpa3").stop().animate({
        opacity:0,
         top:"72px"
      },  { duration: 300, queue: false });
}); 
$("#jq3, #jqp3, #jqt3").mouseleave(function(){       
  $("#jqt3").css({
    color:"",
}, function() {
});   
});         

    
// 포스터4        
$("#jq4, #jqp4, #jqt4").mouseenter(function(){
    $("#jqp4").stop().animate({
        top:"-26px",
        borderWidth:8
      }, { duration: 300, queue: false });
    // Animation complete.
 
     $("#jqpa4").stop().animate({
        opacity:1,
         top:"42px",
      },  { duration: 300, queue: false });
});   
$("#jq4, #jqp4, #jqt4").mouseenter(function(){       
  $("#jqt4").css({
    color:"#d50055",
}, function() {
});   
});  
$("#jq4, #jqp4, #jqt4").mouseleave(function(){
    $("#jqp4").stop().animate({
        top:"0px",
        borderWidth:4
      }, { duration: 300, queue: false });
    // Animation complete.
 
     $("#jqpa4").stop().animate({
        opacity:0,
         top:"72px"
      },  { duration: 300, queue: false });
}); 
$("#jq4, #jqp4, #jqt4").mouseleave(function(){       
  $("#jqt4").css({
    color:"",
}, function() {
});   
});         

    
    
    
    
    
    
    
    
    
    
    
    
    /*    
  $("p").mouseout(function(){
    $("p").css("background-color", "lightgray");
  });
   
    
    
 $( "#clickme" ).click(function() {
  $( "#book" ).animate({
    opacity: 0.25,
    left: "+=50",
    height: "toggle"
  }, 5000, function() {
    // Animation complete.
  });
});   
*/    




    
    
    
    

function nightmode(){
var de = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("nt");
var child2 = document.getElementById("nt2");    
parent.style.backgroundColor = "#000"
child1.style.color = "white";
child2.style.color = "white";    
}, 100);};
    
var de1 = function(){setTimeout(function(){
var parent = document.getElementById("oneaboveall");
var child1 = document.getElementById("nt");
var child2 = document.getElementById("nt2");    
parent.style.backgroundColor = "#fff"
child1.style.color = "black";
child2.style.color = "black";    
}, 100);};


var night = document.getElementById("nightmode") 
if(night.checked == true)
de();
else
de1();
};
    
    
$('.slider').bxSlider({
    mode:"fade", auto:"true", pagerCustom: "#bar_pager", autoControls: true, autoControlsSelector: ".pause_n_play"
        ,nextSelector: ".banner_control .right", prevSelector:".banner_control .left"
    });    
</script>    
    
    

    


 
   
    
    
    
    
    
    
    
    /*
function wrapup(){
var wrap = document.querySelector(".main_banner_wrap");
var wrap_ani = wrap.style;
wrap_ani.animationName = "mymy";    
}*/


</html>