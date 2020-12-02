<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>로그인</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- 상단 -->
  <script type="text/javascript" language="javascript">
      	function btn_js_alert_click(){
      	  document.find_lostpass.submit();
          document.location.href="loginpage.php";
      	}
  </script>
  <header>
    <div class="loginSign">
      <a href="loginpage.php" class="login">로그인</a>
      <a href="signUp.php" class="sign">회원가입</a>
    </div>
    <!-- 상단 메뉴 -->
    <nav>
      <div class = "menu">
        <div class= "menu1">
          <a href="roomList.php">예약하기</a>
        </div>
        <div class = "menu2">
          <a href="introduce.php">호텔소개</a>
        </div>
        <a href="main.php"><img src="img/logo.png" class="logo"/></a>
        <div class = "menu3">
          <a href="customerService.php">고객문의</a>
        </div>
        <div class = "menu4">
          <a href="notice.php">게시판</a>
        </div>
      </div>
    </nav>
  </header>
  <!-- 메인 -->
  <main>
    <div class="lostpasswordfind">
      <a class="lostpasswordfind1">비밀번호 찾기</a><br><br>
      <a class="lostpasswordnotice">비밀번호를 등록하신 이메일로 발송해 드립니다.</a>
    </div>
    <div class="login-form">
      <form name="find_lostpass" method="post" action="../api/modules/findpwd.php">
        <div class="login_ID">아이디</div>
        <input type="text" name="email" class="text-field" placeholder="e-mail">
        <div class="login_ID">성명</div>
        <input type="password" name="name" class="text-field" placeholder="성명">
        <input type="submit" value="이메일 발송" class="submit-btn" onClick="btn_js_alert_click();">
      </form>
    </div>
  </main>

  <!-- 하단 -->
  <footer>
    <div class="bottomMenu">
      <ul>
        <li><a style="text-align: left;" href="roomList.php">예약하기</a></li>
        <li><a href="introduce.php">호텔소개</a></li>
        <li><a style="text-align: right;" href="customerService.php">고객문의</a></li>
        <li><a style="text-align: right;" href="notice.php">게시판</a></li>
      </ul>
    </div>
    <div class="bottomMid">
      <div class="bottomLogo">
        <a href="main.php"><img src="img/logo.png" class="bottomLogo" /></a>
      </div>
      <div>
        <img class="snsLogo" src="img/snsLogo.png">
      </div>
      <div>
        <img class="bottomWord" src="img/bottomWords.png">
      </div>
    </div>
    <div>
      <img class="copyright" src="img/copyright.png">
    </div>
  </footer>
</body>

</html>
