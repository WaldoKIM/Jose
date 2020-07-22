<?php 
    session_start();
    $s_id = isset($_SESSION["uid"])? $_SESSION["uid"] : "";
    $s_name = isset($_SESSION["unombre"])? $_SESSION["unombre"] : "";
    $s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";


    // 로그인 정보 확인
    // echo $_SESSION["uid"]."/".$_SESSION["uname"];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="index.css"/>
         <link href="bxslider-4-4.2.12/src/css/jquery.bxslider.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script src="bxslider-4-4.2.12/src/js/jquery.bxslider.js"></script>
<script>
$(function(){
    $('.slider').bxSlider({
    mode:"fade", auto:"true", pagerCustom: "#bar_pager", autoControls: true, autoControlsSelector: ".pause_n_play"
        ,nextSelector: ".banner_control .right", prevSelector:".banner_control .left"


    
    });
$/*('.slider').slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});    */
    
});

    /*
function wrapup(){
var wrap = document.querySelector(".main_banner_wrap");
var wrap_ani = wrap.style;
wrap_ani.animationName = "mymy";    
}*/
    
</script>
    <title>중남미 문화원</title>
</head>
<body>
<div class="skipMenu">
    <a href="#"><span>바로가기 1</span></a>
    <a href="#"><span>바로가기 2</span></a>
    <a href="#"><span>바로가기 3</span></a>
</div>
    <div class="header">
    <div class="GNB">
    <h1 class="logo"><a href="index.php">중남미<br/>문화원</a></h1>
    <h2 class="GNB_title">전체 메뉴</h2>
      <div class="GNB_position">
      <ul>
      <li class="GNB_intro"><a href="sub/intro.html">문화원 소개</a>
      <ul id="intro">
       <li><a href ="">중남미 문화원</a></li>
       <li><a href ="">설립자 소개</a></li>
       <li><a href ="">후원안내</a></li>
       <li><a href ="">채용 및 자원봉사 안내</a></li>
							</ul></li>
          <li class="GNB_museo"><a href="sub/museo.html" onclick="wrapup()">중남미 개관</a>
       <ul id="museo">
       <li><a href ="">중남미 소개</a></li>
       <li><a href ="">중남미 역사와 문화</a></li>
       <li><a href ="">중남미 국가들</a></li>
       <li><a href ="">지도 자료실</a></li>
       </ul></li>
       <li class="GNB_gallery">
       <a href="sub/gallery.html" onclick="wrapup()">이용 안내</a>
       <ul id="gallery">
       <li><a href ="">이용 안내</a></li>
       <li><a href ="">오시는길</a></li>
       <li><a href ="">예매하기</a></li>
       <li><a href ="">관람문의</a></li>
       </ul>
       </li>
       <li class="GNB_cappilla" onclick="wrapup()">
       <a href="sub/cappilla.html">전시 안내</a>
       <ul id="cappilla">
       <li><a href ="">박물관</a></li>
       <li><a href ="">미술관</a></li>
       <li><a href ="">종교전시관&#40;까삐야&#41;</a></li>
       <li><a href ="">야외전시</a></li>
		</ul></li>
       <li class="GNB_jardin"><a href="sub/jardin.html" onclick="wrapup()">시설 안내</a>
       <ul id="jardin">
       <li><a href ="">차와 식사</a></li>
       <li><a href ="">문화 시설</a></li>
       <li><a href ="">시설 안내도</a></li>
       <li><a href ="">주변 명소</a></li>
       </ul></li>
       <li class="GNB_comida"><a href="sub/comida.html" onclick="wrapup()">문화원 소식</a>
       <ul id="comida">
       <li><a href ="">타코 하우스</a></li>
       <li><a href ="">행사 안내</a></li>
       <li><a href ="">공지사항</a></li>
       <li><a href ="">문화원 소식</a></li>
       </ul>
       </li>
      <li class="GNB_plaza"><a href="sub/plaza.html" onclick="wrapup()">광장</a>
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
                } else if($_SESSION['uid'] == 'rootkim@admin.com' && $s_idx == 1){
                echo "<li><a href='admin/admin.php'><b>관리자모드</b></a></li>";
                echo "<li><a href='login/logout.php'>로그아웃</a></li>";      
            } else{
                echo "<li><a href='login/logout.php'>로그아웃</a></li>";
                echo "<li><a href='login_index.php'>계정정보</a></li>";
            }
        ?>

       <li><a href="">ENG</a></li>
       <li class="day_n_night">
       <a class="day" href="Night">Day mode</a>
       <a class="night" href="Day">Night mode</a></li>
       </ul>
       <label for="nightmode">
			<input type="checkbox" name="nightmode" id="nightmode">
			<span class="check"></span>
		</label> 
       </div>
   </div>
	
   </div>
    <div class="content">
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
    <h2><a href="/information.html#booking">예매하기</a></h2>
    <p>방문하실 날짜를 클릭하세요</p>
    <iframe class="booking_calendar"></iframe>
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
    <ul>
        <li><a href="">신종 코로나 바이러스 관련 문화원 개장 안내</a> <span class="date">2020-03-03</span></li>
        <li><a href="">문화원 내 빠예야 레스토랑 영업 중단 안내</a> <span class="date">2020-03-03</span></li>
        <li><a href="">문화가 있는 날 이용료 할인에 대한 안내</a> <span class="date">2020-03-03</span></li>
        <li><a href="">문화원 야간개장 이벤트-쿠바 재즈의 밤 행사 공지</a> <span class="date">2020-03-03</span></li>
    </ul>
    <a href="/notice.html">더보기</a>
  </div>
  
  <div class="shortcut">
      <h2>자주찾는 메뉴 바로가기</h2>
     <ul>
     <li class="square1"><a href="/introduction.html">문화원소개</a></li>
      <li class="square2"><a href="/introduction.html">오시는 길</a></li>
      <li class="square3"><a href="/programmes.html">전시 안내</a></li>
      <li class="square4"><a href="/news.html">문화원 소식</a></li>
      <li class="circle1">
          <a class="circle" href="/news1.html"></a>
          <a class="title" href="/news1.html">문화원 주변 명소</a></li>
      <li class="circle2">
          <a class="circle" href="/news2.html"></a>
          <a class="title" href="/news2.html">타코 하우스</a></li>
      <li class="circle3">
          <a class="circle" href="/news3.html"></a>
          <a class="title" href="/news3.html">설립자 소개</a></li>
      <li class="circle4">
          <a class="circle" href="board_index.php"></a>
          <a class="title" href="board_index.php">게시판</a></li>
      <li class="circle5">
          <a class="circle" href="/news5.html"></a>
          <a class="title" href="/news5.html">관람문의</a></li>
      </ul>
  </div>
</div>         
   
   <div class="foundation">
       <div class="f_wrap">
       <h2>감사의 말씀</h2>
       <a href="foundation.html">문화원 후원하기</a></div>
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
          <dd class="ex_event1">
          <a class="poster1" href=""></a>
          <a class="title1" href="">&#91;주한 멕시코 대사관&#93;<br/><strong>부에나 비스타 소셜 클럽</strong></a>
          </dd>
          <dd class="ex_event2">
          <a class="poster2" href=""></a>
          <a class="title2" href="">&#91;주한 아르헨티나 대사관&#93;<br/><strong>탱고 데 부에노스 아이레스</strong></a></dd>
          <dd class="ex_event3"><a class="poster3" href=""></a>
          <a class="title3" href="">&#91;소극장 디시인사이드&#93;<br/><strong>대신귀 여운알 파카를 드리겠 습니다</strong></a></dd>
          <dd class="ex_event4"><a class="poster4" href=""></a>
          <a class="title4" href="">&#91;까페 로스 까브로네스&#93;<br/><strong>죽은자들의 밤 만찬회</strong></a></dd>         
      </dl>  
    <div class="events"><a  href="/events.html">문화행사 전체보기/홍보 문의</a></div>    
   </div>
    </div>      
  
  </div>
    
    <div class="footer">
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
    <h3><a class="arrow" href="">관련사이트</a></h3>
<ul>
  <li><a href="">주한아르헨티나대사관</a></li>
  <li><a href="">주한칠레대사관</a></li>
  <li><a href="">주한페루대사관</a></li>
  <li><a href="">주한멕시코대사관</a></li>
</ul>
</div>     
</div>
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
</body>
</html>