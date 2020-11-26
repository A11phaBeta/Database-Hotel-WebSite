<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>로그인</title>
  <link rel="stylesheet" href="./styles/style.css">

</head>

<body>
  <!-- 상단 -->
  <header>
    <div class="loginSign">

      <?php
      if(!isset($_SESSION['user_name'])){
        echo '<a href="./?login&mode=" class="login">로그인</a>
        <a href="signUp.html" class="sign">회원가입</a>';
      }else{
        echo '<a href="./?login&mode=" class="login">마이페이지</a>
        <a href="./api/apiControl.php/?logout" class="sign">로그아웃</a>';
      }

       ?>
    </div>
    <!-- 상단 메뉴 -->
    <nav>
      <div class="menu">
        <div class="menu1">
          <a href="roomList.html">예약하기</a>
        </div>
        <div class="menu2">
          <a href="introduce.html">호텔소개</a>
        </div>
        <a href="main.html"><img src="./assets/img/logo.png" class="logo" /></a>
        <div class="menu3">
          <a href="customerService.html">고객문의</a>
        </div>
        <div class="menu4">
          <a href="notice.html">게시판</a>
        </div>
      </div>
    </nav>
  </header>
