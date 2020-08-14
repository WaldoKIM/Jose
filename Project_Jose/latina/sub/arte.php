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
    <link rel="stylesheet" type="text/css" href="arte.css"/>
    <style>
.site_link .arrow1 {display:inline-block; width: 30px; height: 30px; background:url(../images/arrow_footer.png)no-repeat center; animation:spin 1s forwards; animation-play-state: running; text-indent: -99999px;position: absolute; top:18px;}
.site_link .arrow2{display:inline-block; width: 30px; height: 30px;background:url(../images/arrow_footer.png)no-repeat center;  animation:spin1 1s forwards; animation-play-state: running; text-indent: -99999px;position: absolute; top:18px;}
@keyframes spin1 {100% {transform: rotate(180deg);}} 
@keyframes spin {0% {transform: rotate(180deg);}
                100% {transform: rotate(360deg);}} 
    </style>
    <title>전시 안내</title>
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
<h1 class="title">전시 안내</h1>
<span class=line1></span>
<div class="shortcut">
	<h2>항목별 바로가기</h2>
	<ul>
		<li class="shortcuta"><a href="cappilla.php">박물관</a></li>
		<li class="shortcutb"><a href="#general">미술관</a></li>
		<li class="shortcutc"><a href="verdacappilla.php">종교관(Cappilla)</a></li>
		<li class="shortcutd"><a href="verdajardin.php">야외전시</a></li>
	</ul>
</div>
<section class="first"> 
<div id="general"></div>
<dl>
    <dt><h2>박물관</h2></dt>
    <dd><h3>중앙홀</h3>
    <p>중앙홀에 들어서면 제일 처음 스페인 양식의 돌로 만들어진 분수대를 볼 수 있다. 스페인 식 성당이나 큰 저택에서는 중앙홀을 만들고 그 가운데에 분수대를 즐겨 만들었다. 문화원의 분수대는 잔잔한 라틴 음악과 어울려 넓은 홀 안에 중남미의 고즈넉한 정취를 느낄 수 있게 만들었다. 홀을 둘러가면서 사면의 벽에는 성화와 성물들, 그리고 조각품들이 있고 120년 된 스타인웨이 그랜드 피아노가 놓여 있다. 이 피아노는 문화원에서 특별 행사로 열리는 음악제 때마다 그 아름다운 음색으로 제 몫을 다하고 있다.<br>
박물관 중앙홀 천장에는 나무로 조각한 금빛 태양상이 있다. 중남미 인들에게 태양은 가장 주된 신봉의 대상이었다. 주변으로는 창이 있어 중앙홀 내부에 자연 채광이 이루어 질 수 있게 설계되었다.</p></dd>
    <dd><h3>제 1 전시실&#40;토기실&#41;</h3>
    <p>기원전 3,000년경 멕시코와 페루고원지대에 정착한 인디오들 중 가마솥 속에서 구운 토기를 사용하기 시작, 신석기시대(Neolitico) 문화가 열리고 올메카(Olmeca)와 차빈(Chavin)이 초기 토착문화를 정착시킵니다. A.D 300-900년경의 마야(Maya) 고전시기(Periodo Clasico) 문화가 유카탄 반도와 과테말라 일원에 그리고 남미 페루사막지대에 모치까(Mochica) 문화가 그 절정에 달하는데, 아스떼까(Azteca)와 잉카(Inca)가 단연 주목할 만한 발전상을 보였다.</p>
    
<p>금.동을 이용한 고도의 금속문화, 피라미드(Piramides) 건축, 모직, 면직 및 염색기술 등 다양한 예술성을 지닌 문화재들이 정복자 (conquistadores)에 의해 합스부르크(Habsburg) 왕조에 조공으로 보내져 신대륙의 높은 문화수준에 왕궁은 찬탄을 일으켰다. 
인디오 문화는 B.C1000년전쯤 매우 세련된 토기를 생산하게 되었는데 Pre-Colombiano 문화의 가장 대표작인 예술품으로 높이 평가되고 있다.</p>
  
<p>본 전시관에는 주로 멕시코-중미일대(Meso-America)의 일부 토기가 수집 전시되고 있으며 마야 토기(A.D 550-950)와 함께 코스타리카, 파나마 일대의 쪼로떼가(Chorotega-A.D 1,000-1,400) 토기, 니꼬야(Nicoya), 반도의 메따떼(Metate A.D 300-700), 베라끄루스(Veracruz) 지방의 올메까(Olmeca)와 꼴리마(Colima-B.C 100-A.D 250) 토기등이 진열되고 있다.</p></dd>
    <dd><h3>제2 전시실&#40;석기/목기실&#41;</h3>
    <p>이 전시관에는 코스타리카의 과나까스테-니꼬야 (Guanacaste-Nicoya)지방의 메따떼(Metate:A.D 300-700) 와 믹스떽(Mixtec:A.D 900-1200)의 메따떼, 특히 멕시코 똘데까(Toltera: A.D 900-1200)왕조의 수도 뚤라(Tula)의 껫살꼬아뜰(Quetzalcoatl)석조물과 카리브해 따이노(Taino)족의 사람모양을 한 조각석기 쎄미(Cemi) 도끼, 방망이 등 석기가 전시되어 있다. 껫살꼬아뜰은 날개가 달린 뱀의 형상으로서 당시 인디오들의 영혼과 물질을 혼합한 신비의 상징이었다. 따이노족은 남미대륙 북단 아마존 지역 에서 카누를 이용해서 이주하여 15세기 말 스페인 정복 당시 도미니카 공화국 일대 에서 고도의 문화를 개화시켰다. 본 전시관에는 이들의 의례용 의자인 두호(duho) 가 여러 점 전시되어 있다. 아이띠(Haiti) 마호가니 조각물들과 각 전시관 사이의 복도에 카톨릭과 인디오 종교가 제설혼합된 요소를 보여주는 중남미의 종교화와 각국의 현대화, 조각물들도 감상할 수 있다.   
    </p></dd>
    <dd><h3>제3 전시실&#40;가면실&#41;</h3>
   <p> 다양한 멕시코의 가면문화는 인디오들의 여러 모양의 상징적 가면들을 영혼과 직결하는 문화로 발전시킨 것이 그 기원이었다. </p>
<p>멕시코 동해안 지대의 또또낙(Totonac)인디오들은 가면으로 얼굴을 덮음으로써 일상생활로부터 잠시 자신의 정체와 영혼을 해방시키고자 했고 가면을 씀으로써 새 얼굴, 새로운 에고(ego)의 인간성과 영혼을 대신한다고 믿었다. </p>
<p>나무, 가죽, 천, 철기, 석기, 토기 등 다양한 재료와 색채를 이용한 가면이 축제(fiesta), 카니발(Carnabal), 의식(Ceremonia)등에 사용되며 신(Dios), 마귀(Demonio), 동물(Animal), 인어(Sirena), 2중가면(Doble Cara), 죽음(Muerte), 귀족(Marquez), 천사(Angel), 나비(Mariposa)등 다양하다. 죽은 자는 말이 없다는 뜻에서 죽음의 가면에는 입이 없다. 주로 서해안 게레로(Guerrero), 나야릿(Nayarit), 미초아깐(Michoacan), 오아하까(Oaxaca)지방이 주산지이다. 돌 가면 중에는 떼오띠우아깐 (Teotihuacan: A.D 450-650)의 비취가면이 대표적이다.</p></dd>
    <dd><h3>제4 전시실&#40;생활공예실&#41;</h3>
        <p>중남미 사람들이 사용하던 생활용품들이 전시되어있는 공간이다. 농기구, 다리미, 가구, 재봉틀 등과 같은 일반 생활용품들과 악기 등이 전시되어 있다.</p>
<p>중남미에는 많은 양의 구리가 생산되고 있다. 망치로 일일이 두들겨 만들어 표면에는 두드린 자국이 무늬처럼 남아있고, 물 항아리에서 음식 그릇까지 다양한 모양과 쓰임새의 구리그릇이 있다.</p>
<p>중남미 사람들은 일상생활 속에서 음악과 춤을 즐겼다. 이들의 음악은 원주민 전통 악기와 유럽 악기, 특히 기타와 하프 등이 섞여 있으며 각 지역마다 특색 있는 민속음악과 춤을 가지고 있다. 대나무를 엮어서 만든 바호네스(혹은 샴뽀냐), 아코디언처럼 생긴 반도네욘, 북처럼 두드려 소리를 내는 악기 등 다양하다.</p></dd>
</dl>
</section>
	
<section>
<div id="location"></div>
<dl>
    <dt>미술관</dt>
    <dd>제1관</dd>
    <dd>제2관</dd>
</dl>
</section>

<section>
<div id="booking"></div>
<dl>
    <dt>종교관</dt>
    <dd>까삐야(cappilla)</dd>
</dl>
</section>

<section>
<div id="inquiry"></div>
<dl>
    <dt>야외 전시물</dt>
    <dd>조각공원</dd>
    <dd>도자벽화</dd>
</dl>
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