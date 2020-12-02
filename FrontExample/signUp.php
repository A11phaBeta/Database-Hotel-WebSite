<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <main>
    <!-- 상단 -->
    <header>
      <!-- 로그인, 회원가입 -->
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
      <script>function SIGN(){
        document.member_form.submit();
      }
      </script>
    </header>
    <!-- 메인 -->
    <div class = "main_2">
        <div id="wrapper">
        <!-- content-->
        <form name="member_form" method="post" action="../api/modules/signup.php">
        <div id="content">
          <!-- EMAIL -->
          <div class="signUpTitle">회원정보입력</div>
          <div>
            <h3 class="join_title"><label for="email">아이디</label></h3>
            <span class="box int_email">
              <input type="text" id="email" name="email" class="int" maxlength="100" placeholder="email">
            </span>
            <span class="error_next_box">이메일 주소를 다시 확인해주세요.</span>
          </div>
          <!-- PW1 -->
          <div>
            <h3 class="join_title"><label for="pswd1">비밀번호</label></h3>
            <span class="box int_pass">
                <input type="password" id="pswd1" name="pswd1" class="int" maxlength="20">
                <span id="alertTxt">사용불가</span>
                <img src="img/m_icon_pass.png" id="pswd1_img1" class="pswdImg">
            </span>
            <span class="error_next_box"></span>
          </div>
          <!-- PW2 -->
          <div>
            <h3 class="join_title"><label for="pswd2">비밀번호 재확인</label></h3>
            <span class="box int_pass_check">
                <input type="password" id="pswd2" class="int" maxlength="20">
                <img src="img/m_icon_check_disable.png" id="pswd2_img1" class="pswdImg">
            </span>
            <span class="error_next_box"></span>
          </div>
          <!-- NAME -->
          <div>
            <h3 class="join_title"><label for="name">이름</label></h3>
            <span class="box int_name">
                <input type="text" id="name" name="name" class="int" maxlength="20">
            </span>
            <span class="error_next_box"></span>
          </div>
          <!-- BIRTH -->
          <div>
            <h3 class="join_title"><label for="yy">생년월일</label></h3>
            <div id="bir_wrap">
              <!-- BIRTH_YY -->
              <div id="bir_yy">
                  <span class="box">
                      <input type="text" id="yy" name="yy" class="int" maxlength="4" placeholder="년(4자)">
                  </span>
              </div>
              <!-- BIRTH_MM -->
              <div id="bir_mm">
                <span class="box">
                    <select id="mm" name="mm" class="sel">
                        <option>월</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </span>
            </div>
              <!-- BIRTH_DD -->
              <div id="bir_dd">
                <span class="box">
                <input type="text" id="dd" name="dd" class="int" maxlength="2" placeholder="일">
                </span>
              </div>
            </div>
            <span class="error_next_box"></span>
          </div>
          <!-- GENDER -->
          <div>
            <h3 class="join_title"><label for="gender">성별</label></h3>
            <span class="box gender_code">
              <select id="gender" name="gender" class="sel">
                <option>성별</option>
                <option value="M">남자</option>
                  <option value="F">여자</option>
              </select>
            </span>
            <span class="error_next_box">필수 정보입니다.</span>
          </div>
          <!-- MOBILE -->
          <div>
            <h3 class="join_title"><label for="phoneNo">휴대전화</label></h3>
            <span class="box int_mobile">
              <input type="tel" id="mobile" name="number" class="int" maxlength="16" placeholder="전화번호 입력">
            </span>
            <span class="error_next_box"></span>
          </div>
          <!-- JOIN BTN-->
          <div class="btn_area">
            <button type="button" id="btnJoin" onclick="SIGN()">
              <span >가입하기</span>
            </button>
          </div>
        </div>
      </form>
      </div>
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
  <script src="js/main.js"></script>
</body>

</html>
