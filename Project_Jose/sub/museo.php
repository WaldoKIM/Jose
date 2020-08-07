<?php 
    session_start();
    $s_id = isset($_SESSION["uid"])? $_SESSION["uid"] : "";
    $s_name = isset($_SESSION["unombre"])? $_SESSION["unombre"] : "";
    $s_idx = isset($_SESSION["unumero"])? $_SESSION["unumero"]:"";


    // 로그인 정보 확인
    // echo $_SESSION["uid"]."/".$_SESSION["uname"];
include "../inc/dbcon.php"; ?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
       <link rel="icon" href="../favicon.ico" type="image/x-icon">         
    <link rel="stylesheet" type="text/css" href="sub.css"/>
    <link rel="stylesheet" type="text/css" href="museo.css"/>
    <style>
.site_link .arrow1 {display:inline-block; width: 30px; height: 30px; background:url(../images/arrow_footer.png)no-repeat center; animation:spin 1s forwards; animation-play-state: running; text-indent: -99999px;position: absolute; top:18px;}
.site_link .arrow2{display:inline-block; width: 30px; height: 30px;background:url(../images/arrow_footer.png)no-repeat center;  animation:spin1 1s forwards; animation-play-state: running; text-indent: -99999px;position: absolute; top:18px;}
@keyframes spin1 {100% {transform: rotate(180deg);}} 
@keyframes spin {0% {transform: rotate(180deg);}
                100% {transform: rotate(360deg);}} 
    </style>
    <title>중남미 개관</title>
</head>
<body>
<div class="skipMenu">
    <a href="#"><span>바로가기 1</span></a>
    <a href="#"><span>바로가기 2</span></a>
    <a href="#"><span>바로가기 3</span></a>
</div>
    <div class="header">
    <div class="GNB">
    <h1 class="logo"><a href="../index.php">중남미<br/>문화원</a></h1>
    <h2 class="GNB_title">전체 메뉴</h2>
      <div class="GNB_position">
      <ul>
      <li class="GNB_intro"><a href="intro.php">문화원 소개</a>
      <ul id="intro">
       <li><a href ="">중남미 문화원</a></li>
       <li><a href ="">설립자 소개</a></li>
       <li><a href ="">후원안내</a></li>
       <li><a href ="">채용 및 자원봉사 안내</a></li>
							</ul></li>
          <li class="GNB_museo"><a href="museo.php">중남미 개관</a>
       <ul id="museo">
       <li><a href ="">중남미 소개</a></li>
       <li><a href ="">중남미 역사와 문화</a></li>
       <li><a href ="">중남미 국가들</a></li>
       <li><a href ="">지도 자료실</a></li>
       </ul></li>
       <li class="GNB_gallery">
       <a href="gallery.php">이용 안내</a>
       <ul id="gallery">
       <li><a href ="">이용 안내</a></li>
       <li><a href ="">오시는길</a></li>
       <li><a href ="">예매하기</a></li>
       <li><a href ="">관람문의</a></li>
       </ul>
       </li>
       <li class="GNB_cappilla">
       <a href="cappilla.php">전시 안내</a>
       <ul id="cappilla">
       <li><a href ="">박물관</a></li>
       <li><a href ="">미술관</a></li>
       <li><a href ="">종교전시관&#40;까삐야&#41;</a></li>
       <li><a href ="">야외전시</a></li>
		</ul></li>
       <li class="GNB_jardin"><a href="jardin.php">시설 안내</a>
       <ul id="jardin">
       <li><a href ="">차와 식사</a></li>
       <li><a href ="">문화 시설</a></li>
       <li><a href ="">시설 안내도</a></li>
       <li><a href ="">주변 명소</a></li>
       </ul></li>
       <li class="GNB_comida"><a href="comida.php">문화원 소식</a>
       <ul id="comida">
       <li><a href ="">타코 하우스</a></li>
       <li><a href ="">행사 안내</a></li>
       <li><a href ="">공지사항</a></li>
       <li><a href ="">문화원 소식</a></li>
       </ul>
       </li>
      <li class="GNB_plaza"><a href="plaza.php">광장</a>
       <ul id="plaza">
        <li><a href ="">게시판</a></li>
		<li><a href ="">기념품점</a></li>
       <li><a href ="">게시판</a></li>
       <li><a href ="">마야달력</a></li>
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
                echo "<li><a href='../login_index.php'>로그인</a></li>";
                } else if($_SESSION['uid'] == 'intkim777@gmail.com' && $s_idx == 1){
                echo "<li><a href='../admin/admin.php'><b>관리자모드</b></a></li>";
                echo "<li><a href='../login/logout.php'>로그아웃</a></li>";      
            } else{
                echo "<li><a href='../login/logout.php'>로그아웃</a></li>";
                echo "<li><a href='../login_index.php'>계정정보</a></li>";
            }
        ?>
       <li><a href="">ENG</a></li>
       <!-- <li class="day_n_night">
       <a class="day" href="Night">Day mode</a>
       <a class="night" href="Day">Night mode</a></li>-->
       <li><span id ="todaysWeather" class="weather"></span></li>
       </ul>
       <label for="nightmode">
			<input type="checkbox" name="nightmode" id="nightmode">
			<span class="check"></span>
		</label> 
       </div>
   </div>
	
   </div>
<main>
<div class="bg">
<div class="title_img"></div>
<div class="main_wrap">
<h1 class="title">중남미 개관</h1>
<span class=line1></span>

<div class="shortcut">
	<h2>주요안내 바로가기</h2>
	<ul>
		<li class="shortcuta"><a href="#general">중남미 소개</a></li>
		<li class="shortcutb"><a href="#location">중남미 역사와 문화</a></li>
		<li class="shortcutc"><a href="#booking">중남미 국가</a></li>
		<li class="shortcutd"><a href="#inquiry">지도 자료실</a></li>
	</ul>
</div>
<div id="general"></div>	
<div id="location"></div>
<div id="booking"></div>
<div id="inquiry"></div>
<section class="intro">
<h2>중남미 소개</h2>
<div class="text">
	중남미 개관 관련 본문
</div>
<div class="imgs">
<img alt="문화원 전경 사진">
</div>
</section>

<section class="founder">
<h2>중남미 역사와 문화</h2>
<div class="text">
	설립자 소개 본문
</div>
<div class="imgs">
<img alt="문화원장 초상">
<img alt="이사장 초상">
</div>	
</section>

<section class="donation">
<h2>중남미 국가</h2>
<div class="text">
	후원 안내 본문
</div>

<div class ="don_halloffame">후원자 명단 
	<?php echo "<p>여기에 후원자 DB 연동 및 관련 자료 불러오는 쿼리문 작성</p>" ?>
테이블 태그 tfoot 기능을 써먹도록, 리스트 명단 맨 밑에 지금까지 총 후원자 수를 표시
</div>	

<div class="imgs">
<img alt="후원을 상징하는 그래픽 디자인 요소">
<img alt="따뜻한 마음을 상징하는 그래픽 디자인 요소">
</div>

<div class="donate">후원하기 링크
<a>후원 페이지로 이동</a>	
</div>
</section>

<section class="oportunity">
<h2>지도 자료실</h2>
<div class="text">
	채용 및 자원봉사 관련 안내 내용 본문
</div>
<div class="job_class">
	지원 가능한 분야에 대한 설명
	각 분야별 상세 모집 요강은 별도 문서로 작성, 링크
	또는 펼치기 접기 기능 활용
	<table>
	<tr>
	<th></th>
	<th>정원</th>
	<th>모집여부</th>
	<th>비고</th>
	</tr>
	<tr>
	<th>문화예술직군</th>
	<td>1</td>
	<td>2</td>
	<td>3</td>
	</tr>
	<tr>
	<th>서비스직군</th>
	<td>4</td>
	<td>5</td>
	<td>6</td>
	</tr>
	<tr>
	<th>사무직군</th>
	<td>7</td>
	<td>8</td>
	<td>9</td>
	</tr>
	</table>
	</div>
<div class="send_cv">
채용 및 자원봉사 관련 이메일 작성 전송
<form>
<fieldset>
<legend>이메일 입력기</legend>
회신 받을 이메일 주소 <input type="email">  <br>
제목 <input type="text" name="title">  <br>
내용 <input type="text" name="text">  <br>
</fieldset>
<button type="submit">보내기</button>
</form>
</div>
</section>
</div>
    </div>    
</main>

 <footer class="footer">
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
        <li><a href="../privacy_policy.html">개인정보취급방침</a></li>
            <li><a href="../privacy_policy.html">이메일집단수집거부</a></li>
        <li><a href="../privacy_policy.html">이용약관</a></li>
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
</footer> 
       
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>
$(function(){
    $(".site_link a").click(function(){
    $("#pop").slideToggle();
}, function(){
    $("#pop").slideToggle();
});
});
</script>
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

</html>