<?php
require_once('./modules/header.php');
 ?>
  <!-- 메인 -->
  <main>
    <div class="welcome">
      저희 소프트호텔에 오신 것을 환영합니다.
    </div>
    <div class="login-form">
      <form action="./api/apiControl.php?login" method="post">
        <div class="login_ID">아이디</div>
        <input type="text" name="id" class="text-field" placeholder="e-mail" required>
        <div class="login_ID">비밀번호</div>
        <input type="password" name="pw" class="text-field" placeholder="password" required>
        <input type="submit" value="로그인" class="submit-btn">
        <input type="hidden" name="Return" value="<?=$_GET['mode']?>">
      </form>

      <div class="links">
        <a href="lostpassword.html">비밀번호를 잊어버리셨나요?</a>
        <a href="signUp.html" class="sign_up">회원가입</a>
      </div>
    </div>
  </main>

  <!-- 하단 -->
  <footer>
    <div class="bottomMenu">
      <ul>
        <li><a style="text-align: left;" href="roomList.html">예약하기</a></li>
        <li><a href="introduce.html">호텔소개</a></li>
        <li><a style="text-align: right;" href="customerService.html">고객문의</a></li>
        <li><a style="text-align: right;" href="notice.html">게시판</a></li>
      </ul>
    </div>
    <div class="bottomMid">
      <div class="bottomLogo">
        <a href="main.html"><img src="./assets/img/logo.png" class="bottomLogo" /></a>
      </div>
      <div>
        <img class="snsLogo" src="./assets/img/snsLogo.png">
      </div>
      <div>
        <img class="bottomWord" src="./assets/img/bottomWords.png">
      </div>
    </div>
    <div>
      <img class="copyright" src="./assets/img/copyright.png">
    </div>
  </footer>
</body>

</html>
