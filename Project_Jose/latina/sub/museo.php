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
<article class="intro">
    <h3>중남미 개관</h3>
<p class="float">우리가 보통 중남미 또는 라틴아메리카로 부르는 지역은 미주대륙에서 북미의 캐나다, 미국을 제외한 멕시코와 중미, 카리브해역 및 남미대륙의 국가들을 말한다. 이 지역에는 약 4억 7천만의 인구가 35개의 독립국으로 나누어져 있는데, 인구 1억 6천만의 브라질에서 부터 5만의 세인트 크리스토퍼 네버스등 다양한 형태이다.</p>
<div class="imgsmap">
<img src="../images/mapalatina.jpg" alt="중남미의 지리적 범위">
</div> 
<p>사람이 최초로 이지역에 이주해온 것은, 약 40,000년 전후로 빙하기에 아시아로부터 육지로 연결되었던 베링해협을 통하여 시작되었고 B.C.9000년경에는 미주대륙 최남단인 띠에라 델 후에고(Tierra del Fuego)에 도달하였다. 초기 이주민들은 멕시코와 안데스고원 지대에 정착하였고, 인디오(Indio)로 불리는 이들은 BC7000년부터 농경사회를 형성하였다. 여러 부족 사회들로 구성된 인디오들 중에 메소 아메리카(Meso America)와 안데스(Andes) 지방에 국가 형태를 갖춘 부족이 형성되고 16세기초 스페인 정복이 시작되기 전에 인구 5만-10만의 도시들이 형성되는데 멕시코 아스떼까(Azteca) 제국의 수도인 떼노치띠뜰란(Tenochtitlan)과 페루 잉카(Inca) 제국의 수도인 꾸스꼬(Cuzco)가 그 대표적인 도시들이다. 특히 고도의 수학과 천문학, 섬세한 건축과 고유문자를 보유하였던 멕시코 유까딴(Yucatan)-중미일원의 마야(Maya)족도 값진 세계 일류 문화 유산을 남기고 오늘까지 그 후손들이 존재한다.</p> 

<p> 콜롬부스(Cristobal Colon)가 1492년 우연히 아메리카 대륙을 발견(콜롬부스는 서방항해로 아시아에 도착할 목적이었음)한 후 4회의 항해끝에 1518년 싼또 도밍고(Santo Domingo)에 총독부를 설치하고 에르난 꼬르떼스(Hernan Cortes)가 1521년 멕시코의 아스떼까 제국을 정복하고 프란시스코 삐사로(Francisco Pizarro)가 1533년 잉카제국을 정복함으로써 3세기여에 걸친 유럽 식민시대가 열린다.</p> 

<p>중.남미 제국은 불란서 혁명의 영향을 받아 1804년 독립한 아이티(Haiti)를 위시로 대부분 19세기 초반부터 독립을 성취하였다. 그러나 왕권을 대신한 정통성의 문제와 구식민지 체제에 집착하는 보수파와 근대화를 추구하는 자유파의 투쟁, 중앙집권파와 분리파의 대립, 열강의 개입, 독재와 군부 쿠데타등으로 독립 후 시행착오의 악순환을 겪었다.<br>

혁명, 폐쇄적 민족주의, 사회 민주주의, 독재 등 악순환을 반복하다가 라틴 아메리카 제국은 80년대의 민주화 과정을 걸쳐 최근 정치면에서 민정안착과 누적 외채문제를 위시 경제, 사회적 난관 극복, 경제 통합, 외교의 다변화에 박차를 가하면서 과감한 개방, 자유화 정책하에 우리나라와도 협력 증대, 강화를 추구하고 있다.</p>


    <h3>지역적 특성</h3>

<P>멕시코 면적은 약 197만 평방킬로미터로 알래스카를 제외한 미국본토 면적의 4분의 1에 해당된다. 국토의 대부분이 고원지대이며 태평양 쪽으로는 좁은 평야지대가 있고, 멕시코만 유역에는 넓은 연안 평야지대가 있다. 산유국으로 다른 천연자원도 풍부하다.
중미지역에는 7개 독립국이 있는데, 대부분이 산악, 고원, 계곡 및 해안 평야로 구성된 소국들이다. 기후는 멕시코와 비슷해서 온대성 고원지대에 주로 거주한다.</P>

<P>카리브해 즉, 서인도 지역은 13개 독립국과 식민도서로 구성되어있다. 쿠바, 아이티, 도미니카 공화국을 제외하면 대부분이 소국들이다. 쿠바는 이들 중 가장 큰 국가이며 사탕수수가 주산물이다. 라-에스빠뇰라(La Espanola)섬은 서부에 아이티, 동부에 도미니카 공화국이 자리잡고 있다. 이들 두 나라는 산악국가로 강우량이 풍부하다.</P>

<P>남미 지역에는 12개 독립국과 1개 프랑스령 식민지가 있다. 이들 지역에는 세계 최대의 산맥인 안데스(Andes) 고지대 등 산악지대가 많고, 대부분의 거주지역이 해발 3,000미터 이상의 고지대에 자리잡고 있다. 그러나 대륙의 5분의 3이 낮은 평야지대를 형성하고 있다. 아르헨티나의 팜파(Pampas), 브라질의 셀바(Selvas), 베네수엘라의 야노(Llanos) 등이다. 이 세 지역에는 모두 커다란 강이 있는데 아르헨티나의 라쁠라타 강, 브라질의 아마존 강, 베네수엘라의 오리노꼬 강이 그것이다. 또한 볼리비아늬 띠띠까까(Titicaca)호수가 해발 3,686미터에 자리잡고 있다. 콜럼비아에서 페루에 이르는 안데스 산맥은 빙하가 많고 지진과 화산폭발이 잦은 곳이다.</P>

</article>
<div class="imgs">
<img alt="문화원 전경 사진">
</div>
</section>

<section class="founder">
<h2>중남미 역사와 문화</h2>
<article class="historia">
<h3>최초의 아메리카대륙인</h3>

<p>구대륙인 아시아나 유럽에 비해 아메리카에서 인류가 살기 시작한 것은 그다지 오래지 않은 약 2-3만년 전이다. 최후의 빙하기가 끝날 무렵 몽고족들이 시베리아에서 베링해를 거쳐 알래스카를 통해 북아메리카로 들어왔다. 그들은 오랜 세월에 걸쳐 북에서 남으로 서서히 남하해 내려왔다. 멕시코 계곡에서 약 1만년 전의 맘모스와 인골이 발견되는 것으로 미루어, 당시 인류는 수렵 민이었음을 알 수 있다. 사냥을 주축으로 하는 수렵민의 생활은 기원전 6000년에서 4000년에 걸쳐 절정기를 이루었다. 기온도 높고 강수량도 풍부했다.<br>
그러나 기원전 3000년 전, 즉 지금부터 약 5000년 전 기온이 내려가면서 건조현상이 나타났다. 이에 따라 인류는 새로운 생활방식을 찾았는데, 이것이 바로 농경의 시작이었다. <br>
농경은 기원전 7000년경부터 식물을 채집하면서 반 정착생활을 하면서 시작되었는데, 이들 수렵 민은 기원전 5000년경에 이르러 감자와 고추의 재배법을 익혔다. 기원전 3000년경에는 원시적이지만 옥수수를 재배할 줄 알았으며, 이때부터 메따떼(Metate)라 불리는 돌절구가 쓰이기 시작했다. 한편 에콰도르에 페루에 이르는 해안에서는 풍부한 어족 자원에 힘입어 어로 생활이 시작되었다. 그러나 이들도 기원전 2500년에서 1200년에 이르러서는 반농. 반어적인 생활형태를 띠게 되었다.</p>


<p>올메카(Olmeca)문화</p>

<p>멕시코 계곡을 중심으로 기원전 1500년경부터 옥수수 농경이 펼쳐졌다. 약 500년이 지난 후 멕시코만 연안에서 일어난 올메까 문화는 '자가야'신을 중심으로 한 고도로 체계적인 종교를 지니고 있었다. 베라꾸르즈(Veracruz)근처의 라 벤따(La Venta)지역에는 올메까 문화의 특징 인 눈을 치켜 뜨고 반달 모양으로 입의 양쪽 끝을 아래로 구부린 거대한 인간형상의 석조상, 피라미드, 검은 토기 등이 발견된다. 특히 인간과 동물의 결합상, 괴기 인간상 등은 중미 인들의 사상적 근간을 이루었다. 이 문화는 기원전 1000-600년경이 전성기였다.</p>

<p> 떼오띠우아칸(Teotihuacan)문화 </p>

<p>멕시코 시티의 북부지역 분지에서 발생한 떼오띠우아깐 문화는 기원전 200년경에 시작되었으며, 서기 100년에서 300년경에는 태양의 피라미드(Piramide del Sol)와 달의 피라미드 (Piramide de la Luna)가 세워졌고, 물의 신 뜰랄록(Tlaloc)에 대한 신앙이 시작되었다. 신전과 신관을 중심으로 하는 대도시가 이루어지고 거대한 신전이 축조되었으며 그곳에는 새의 털을 지닌 뱀의 신인 께잘꼬아뜰(Quetzalcoatl)이 있었다. 그는 인간과 신의 중개자이며 사람들의 생활을 지배하는 정치적 지도자였다. 9세기 중엽 북쪽에서 온 침입자에게 멸망 당했다.</p>

<p>사뽀떼까(Zapoteca)족</p>

<p>서기 600년에서 900년경에 멕시코 고원의 남쪽에 있는 오아하까(Oaxaca)분지를 중심으로 새로운 문명이 발생했다. 돌조각과 상형문자, 천문학이 발달하였고, 윗니를 드러내며 웃는 모습이 특징인 토기를 만들었다.</p>

<p> 마야(Maya)문명</p>

<p>마야 문명은 고전기와 신 제국으로 나뉘는데, 고전 마야 문명은 서기 320년경에 시작되었다. 그들은 석 조각 등을 세우고 연호를 기록하였으며, 태양력에 의한 1년을 365일로 정했고, 춘분과 추분도 알고 있었다. 과떼말라의 띠깔(Tikal), 왁샥뚠, 까미날퓨등이 고전 마야 문명의 중심지이다. 고전 마야문명은 서기 600년경까지 계속된다. 600년에서 약 200년간은 고전 마야 문명의 절정기인데, 이때 그들은 2미터에서 10미터에 달하는 거대한 돌기둥 위에 마야 숫자를 기록해 놓았다. 온두라스의 꼬빤(Copan), 멕시코의 빨렌께(Palenque)가 그 중심지역이다. 금속기를 몰랐던 마야인은 모든 물건을 돌로 만들었으며, 천문학과 수학이 매우 발달했다. 그들은 정령의 개념을 알았으며 20진법을 사용하였다. 10세기 말엽 마야문명 은 갑자기 종말을 고하는데, 그 원인에 대해 아직 잘 모르고 있다.<br>
신 마야 제국은 10세기 말에서 11세기 초에 똘떼까족이 북방에서 유까딴 반도로 이동해 오면서 시작되었다. 치첸잇싸(Chichen Itza)가 중심지이며 께잘꼬아뜰이 주신이었다. 살아있는 인간을 제단에 안치시키고 그 심장을 석재 칼로 도려내어 바치는 인신공양은 최고의 의식이었다. 치첸잇싸와 더불어 욱스말(Uxmal)과 마야빤 (Mayapan)등 3대 도시는 마야 문명의 르네상스를 이루었다. 그러나 고전 마야시대가 정교하고 충실함에 비해 신 마야 예술은 과거의 모방에 그치고 있다. 고전기의 표현이 매우 사실적인데 반해, 르네상스기에는 추상화한 기하학적 문양이 많이 쓰였다. 그들은 또한 카카오에서 초콜릿을 만들기도 했고 치끌레 나무에서 츄잉껌을 만들어냈다. 천연고무 또한 중요한 수출품으로 등장했다. <br>
이러한 후기 마야 문명은 15세기 중엽에서 16세기 초엽에 이르러서는 권력싸움이 극대화되어 거의 무정부 상태에 이르렀다. 16세기 초 스페인인이 이곳에 왔을 때는 이미 찬란한 마야 문명 은 존재하지 않았다.</p>

    <p> 모치카(Mochica)문화 </p> 

<p>페루 북부지방을 중심으로 고대의 옥수수신인 자가야를 섬겼던 모치까족은 떼오띠우아깐보다 도 금속을 먼저 사용했으며 전쟁을 많이 했던 종족이었다. 전쟁에 대한 기록은 모치까의 토기에 생생히 남겨져 있다. 1520년 아스떼까의 마지막 왕 목떼수마(Moctezuma)는 께잘꼬아뜰 전설을 믿었고, 이는 꼬르떼스(Cortez)에 의한 아스떼까 멸망을 앞당기게 했다. 사실 아스떼까라는 이름은 이 종족이 어딘가 동화 속의 나라 아스트란에서 온 것 같다고 생각한 스페인 인들이 붙인 이름이다. 그들은 스스로를 테노치까라 불렀다. 또한 나우아족 또는 멕시까(Mexica)족으로도 불렸다.</p> 

<p> 미슈떼까(Mixteca)문명</p> 

<p>멕시코 남부에서는 사뽀떼까족의 뒤를 이어 몬떼 알반(Monte Alban)과 미뜰라(Mitla)를 중심 으로 미슈떼까 문명이 번성했다. 그들은 금속 세공과 회화에 특이한 재능을 발휘하였다.</p>

<p> 챠빈(Chavin)문화 </p> 

<p>남미 에콰도르 지역에서 기원전 1000년에서 400년경에 발달한 초기문화로 건축과 도자기에서 뛰어났다.</p>

<p> 잉카(Inca)문명 </p>

<p>3세기 초, 만코까빡이 그의 일족을 끌고 페루의 쿠스코(Cuzco)계곡에 도착했다. 사실 그들이 어디서 왔는지는 아직초대왕 만코까빡에서 8대 비라코차 그리고 잉카까지 약 200년간은 전통 잉카제국 시대이다. 외침을 물리치고 쿠스코 계곡을 평정하고 태양신의 숭배와 농업을 주축으로 하는 잉카제국은 최고의 전성기를 누렸다. <br>
15세기 중엽, 제9대 빠치쿠치 잉카 유빵끼(Yupanqui)가 왕이 되었다. 그는 태양신의 신전을 건립하고, 우르밤바와 비루가밤바를 정복했다. 1471년 빠치쿠치가 아들 또빠잉카에게 왕위를 물려줄 무렵 잉카는 볼리비아에서 칠레에 이르기까지 약 4800킬로미터의 대제국을 거느렸다. <br>
잉카의 석조건축물은 최고의 수준이며, 태양신이 최고의 신이었다. 1525년 와스카르가 12대왕이 되었고, 이때 왕권다툼으로 허수아비 13대왕이 스페인 인들에 의해 추대되었으나 1533년 11월15일 삐사로의 쿠스코 입성으로 잉카는 멸망했다. <br>
쿠스코나 마추피추(Machu Pichu)는 잉카의 실존을 밝혀주는 살아있는 박물관이다. 고고학적으로 증명되지 않았다.</p>


<p> 따이노(Taino)족 </p> 

<p>카리브해 에스빠뇰라 섬에 살았던 아라왁(Arawak)인디언으로 스페인 정복 후 100년만에 멸족 되었다. 돌과 나무 공예품으로 유명하다.</p>

</article>
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
	지도자료실 바로가기
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