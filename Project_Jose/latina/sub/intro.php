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
   <!-- <link rel="stylesheet" type="text/css" href="../index.css"/> -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
       <link rel="icon" href="../favicon.ico" type="image/x-icon">         
    <link rel="stylesheet" type="text/css" href="sub.css"/>
    <link rel="stylesheet" type="text/css" href="intro.css"/>
    <style>
.site_link .arrow1 {display:inline-block; width: 30px; height: 30px; background:url(../images/arrow_footer.png)no-repeat center; animation:spin 1s forwards; animation-play-state: running; text-indent: -99999px;position: absolute; top:18px;}
.site_link .arrow2{display:inline-block; width: 30px; height: 30px;background:url(../images/arrow_footer.png)no-repeat center;  animation:spin1 1s forwards; animation-play-state: running; text-indent: -99999px;position: absolute; top:18px;}
@keyframes spin1 {100% {transform: rotate(180deg);}} 
@keyframes spin {0% {transform: rotate(180deg);}
                100% {transform: rotate(360deg);}} 
    </style>
    <title>문화원 소개</title>
</head>
<body onload="">
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
       <li class="cov"></li>
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
<h1 id="general" class="title">문화원 소개</h1>
    <span class=line1></span>
<div class="shortcut">
	<h2>주요안내 바로가기</h2>
	<ul>
		<li  class="shortcuta"><a href="#general">문화원 약력</a></li>
		<li class="shortcutb"><a href="#location">설립자 소개</a></li>
		<li class="shortcutc"><a href="#booking">후원 안내</a></li>
		<li class="shortcutd"><a href="#inquiry">채용 및 자원봉사 안내</a></li>
	</ul>
</div>
<section class="first">
<div class=first_div>
<h2 class="clear">중남미 문화원 소개</h2>
<div class="text">
<p> 중남미문화원은 1992년 중남미에서 30여년간 외교관 생활을 하셨던 이복형 대사와 그의 부인이신 홍갑표 이사장이 그 지역의 풍물을 모아 세운 문화의 장이다.</p>
<br>
<p> 일반인에게 아직은 낯선 중남미 지역의 문화와 예술에 대한 이해를 돕고, 청소년들에게는 세계화 사회교육의 일환으로 꿈과 이상과 건전한 세계관을 심어주기 위한 취지로 건립되었다.</p>
<br>
<p> 현재 중남미 문화원은 일반 개인 및 단체는 물론 학회, 외교단, 기업과 교육 기관 등에서 많이 이용하고 있으며 앞으로 문화, 예술의장소로서, 향토의 테마 문화 공간으로 육성해 나가고자 한다.</p>
<br>
<p> 박물관(1994년 건립)에는 중남미의 대표적 문화인 마야, 아즈텍, 잉카 유물 등이 고대에서 현대에 이르기까지 다양하게 전시되어 있고, 미술관(1997년 건립)에는 중남미를 대표하는 작가들의 그림과 조각들이 전시되어 있다. 또한 조각공원(2001년 조성)을 비롯한 야외에는 중남미 12개국 등의 현대 조각가들의 작품이 공원 및 산책로, 휴식공간 곳곳에 자리잡고 있어 예술품을 통한 중남미 문화의 정취를 느낄 수 있게 마련되었다.</p>

</div>
<div class="imgs">
<img src="../images/vertical1.png" alt="문화원 전경 사진">
</div>
<div id="location" class="anchor1"></div>
</div>
</section>


<section class="founder">
<h2>설립자 소개</h2>
<div class=principal>
<strong class="pname"> 이 복 형 원장 </strong>
<p class="ptext">
저는 거의 30년간을 중남미 지역에 외교관으로 있었습니다. 제 인생에서 가장 왕성하게 활동했던 중요한 시기를 전부 그곳에서 보낸 셈입니다. 
주 멕시코 대사를 지내면서 1세기 전에 유카탄 반도에서 쿠바에 이르기까지 새로운 삶을 찾아 꿈을 안고 떠난 우리 이민의 후손들을 만나 보았습니다. 
중남미의 나라들은 우리 나라가 어렵고 고달팠던 시절에 우리를 도와주었던 고마운 나라들입니다. 약 25,000년 전에 베링해를 건너 아메리카대륙으로 흘러간 종족이 우리와 같은 문화의 뿌리를 가졌다는 것을 상기하지 않아도 중남미 지역의 선주민 문화는 서구문화와는 달리 친근하고 동양적이며, 우리 전통문화와 같은 느낌조차 줍니다. 늘 고국이 그리운 외교관 생활을 오래하면서 이토록 문화적으로 친근한 지역에서 근무했던 것을 행운이라고 여깁니다. 
취미 삼아 수집을 하다가 박물관 건립의 꿈을 키우게 되었고, 공직 생활을 은퇴하고 나서 그 꿈을 실천하고자 노력했습니다. 이제 박물관이 문을 연지 15년째를 맞았습니다. 지금까지도 각계 각층에서 많은 분들께서 저희 박물관을 찾아주셔서 설립자로서 감격의 기쁨을 누렸습니다. 
앞으로도 정부 각 관계기관, 학계, 기업, 교육기관에서 본 문화원을 많이 이용하기를 바랍니다.
특히, 1997년 개관한 미술관은 문화. 예술계에서 이용하기를 부탁 드립니다. 
나아가 아시아 지역에서는 중남미 문화를 소개하는 유일한 문화공간으로 우리 국민뿐 아니라 우리 나라를 찾는 외국인들까지도 중남미 문화를 접하는 공간으로 활용되기를 바랍니다.
</p>
</div>

<div class="imgs">
<img class="portrait1" src="../images/portrait4.png" alt="이복형 문화원장 초상">
<img class="portrait2" src="../images/portrait3.png" alt="이복형 문화원장 초상">
<div class="imgs2">
<img class="portrait3" src="../images/portrait1.png" alt="홍갑표 이사장 초상">
<img class="portrait4" src="../images/portrait2.png" alt="홍갑표 이사장 초상">
</div>
</div>
<div class="boss">
<p class="btext">
<strong class="bname">홍 갑 표 이사장</strong>
30여 년 동안 외교관생활을 하는 남편을 내조하면서 벼룩시장에서 하나하나 소품을 수집하고 주변의 지인들로부터 받은 작품을 모아 남편의 정년퇴임과 함께 경기도 고양시에 중남미 문화원을 개관하였다. 처음엔 도와주는 사람 없이 오직 문화를 사랑하는 일념으로 홀로 시작하며 힘든 세월을 거친 게 어느새 15년을 넘고 있다. 그녀는 정말 바쁜 사람이다. 문화원의 크고 작은 일은 모두 그녀의 몫이며 예술을 이해하고 사랑하며 문화원을 찾는 사람은 누구를 보든 반갑게 맞이한다. 그녀는 문화대사다. 그를 만나는 데는 늘 새로운 각오가 필요하다 왜냐하면 그는 항상 새로움을 제시하기 때문이다. 또한 그녀와 대화를 하게 될 때면 항상 능란한 화술에 빠져들곤 한다. 물론 말 장난이나 가식은 전혀 아니다. 누구에게도 뒤지지 않는 예술가적 승부근성이 홍갑표 그녀에게는 운명과도 같은 삶의 전부이기 때문이다. 항상 낮은 데로 임하고 열정적인 그녀 이길 바라며..
</p>
</div>
<div id="booking" class="anchor2"></div>
</section>

<section class="donation">
<h2 id="booking">후원 안내</h2>
<div class="text">
	후원 안내 본문
</div>

<div class ="don_halloffame">후원자 명단 
	<?php echo "<p>여기에 후원자 DB 연동 및 관련 자료 불러오는 쿼리문 작성</p>" ?>
테이블 태그 tfoot 기능을 써먹도록, 리스트 명단 맨 밑에 지금까지 총 후원자 수를 표시
</div>	

<div class="imgs1">
<img src="../images/charity.png" alt="후원을 상징하는 그래픽 디자인 요소">
</div>
<div class="imgs2">
<img src="../images/iloveyou.png" alt="따뜻한 마음을 상징하는 그래픽 디자인 요소">
</div>

<div class="donate">후원하기 링크
<a>후원 페이지로 이동</a>	
</div>
<div id="inquiry" class="anchor3"></div>
</section>

<section class="oportunity">
<h2 id="inquiry">채용 및 자원봉사 안내</h2>
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