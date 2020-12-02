<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- 상단 -->
  <header>
    <!-- 로그인, 회원가입 -->
    <div class="loginSign">
      <a href="mypage/membership.php" class="login">마이페이지</a>
      <a href="main.php" class="sign">로그아웃</a>
    </div>
    <!-- 상단 메뉴 -->
    <nav>
      <div class="menu">
        <div class="menu1">
          <a href="roomList.php">예약하기</a>
        </div>
        <div class="menu2">
          <a href="introduce.php">호텔소개</a>
        </div>
        <a href="main.php"><img src="img/logo.png" class="logo" /></a>
        <div class="menu3">
          <a href="customerService.php">고객문의</a>
        </div>
        <div class="menu4">
          <a href="notice.php">게시판</a>
        </div>
      </div>
    </nav>
  </header>

  <!-- 메인 -->
  <main class = main_3>
    <div class="list_page">
      예약하기 > 객실선택 > 객실 예약하기
    </div>
    <div class="list_page_left">
      <div><img src="img/room_img.png" class="room_img_2"></div>
      <div class="room_title">
        객실 종류: <?php  session_start();
        switch($_SESSION['cubaM']){
        case 1:
          echo " 스탠다드 싱글";
          break;
        case 2:
          echo " 스탠다드 더블";
          break;
        case 3:
          echo " 스탠다드 쿼터";
          break;
        };?>
      </div>
      <div class="checkin_checkout">
        체크인-체크아웃 : <br><br><?php echo $_SESSION["check_in"] ?>~ <?php echo $_SESSION["check_out"]?>
      </div>
      <div class="room_title2">
        객실 이름 : 615호
      </div>
      <div class="room_people">
        투숙 인원<br><br><?= "어른".$_SESSION["adultN"]?>, <?= "어린이".$_SESSION["childN"]?>
      </div>
      <div class="room_price2">
        요금 상세 내역
        <ul>
          <li>객실요금(금액) : &emsp;450,000원</li>
          <li>부가세 :&emsp;&emsp;&emsp;&emsp;&emsp;50,000원</li>
        </ul>
        <hr class="three">
      </div>
      <div class="room_totalprice">
        총 예약금액<br><br>&emsp;&emsp;<a class="price34">500,000원</a>
      </div>
    </div>
  <form method="post" action="../api/modules/cardInfo.php">
    <div class="list_page_right">
      <div class="booking_information">
         예약자 정보입력
      </div>
      <div class="booking_name">
        * 성명 : <?php echo $_SESSION["username"];?>
      </div>
      <div class="booking_email">
        * 이메일 : <?php echo $_SESSION["useremail"];?>
      </div>
      <div class="booking_phonenumber">
        * 연락처 : <?php echo "0".$_SESSION["usercontact"];?>
      </div>
      <div class="booking_creditinformation">
        신용카드 정보
      </div>
      <div class="booking_creditinformation2">
        결제 안내
        <div class="selectbox_card">
          <select name="cardname">
            <option value="0">&nbsp;카드 선택</option>
            <option value="하나 BC">&nbsp;하나 BC</option>
            <option value="비씨카드(페이북)">&nbsp;비씨카드(페이북)</option>
            <option value="제주카드">&nbsp;제주카드</option>
            <option value="씨티카드">&nbsp;씨티카드</option>
            <option value="신협카드">&nbsp;신협카드</option>
            <option value="현대카드">&nbsp;현대카드</option>
            <option value="하나카드">&nbsp;하나카드</option>
            <option value="KB증권(현대증권)">&nbsp;KB증권(현대증권)</option>
            <option value="전북카드">&nbsp;전북카드</option>
            <option value="카카오뱅크">&nbsp;카카오뱅크</option>
            <option value="KDB산업">&nbsp;KDB산업</option>
            <option value="하나(외환)">&nbsp;하나(외환)</option>
            <option value="광주카드">&nbsp;광주카드</option>
            <option value="케이뱅크">&nbsp;케이뱅크</option>
            <option value="KB 국민">&nbsp;KB 국민</option>
            <option value="신한카드">&nbsp;신한카드</option>
            <option value="롯데카드">&nbsp;롯데카드</option>
            <option value="NH채움">&nbsp;NH채움</option>
            <option value="우체국카드">&nbsp;우체국카드</option>
            <option value="우리카드">&nbsp;우리카드</option>
            <option value="저축은행">&nbsp;저축은행</option>
            <option value="MG새마을">&nbsp;MG새마을</option>
            <option value="삼성카드">&nbsp;삼성카드</option>
            <option value="수협카드">&nbsp;수협카드</option>
          </select>
        </div>
        <div class="booking_creditnumber">
          신용카드 번호<br><br>
          <input type="text" class="moveNumber" name="moveNumber1" onKeyup="inputMoveNumber(this);" maxlength="4"/>&nbsp;-&nbsp;
          <input type="text" class="moveNumber" name="moveNumber2" onKeyup="inputMoveNumber(this);" maxlength="4"/>&nbsp;-&nbsp;
        	<input type="text" class="moveNumber" name="moveNumber3" onKeyup="inputMoveNumber(this);" maxlength="4"/>&nbsp;-&nbsp;
        	<input type="text" class="moveNumber" name="moveNumber4" maxlength="4"/>
        </div>
        <div class="booking_credityear">
          카드 유효기간<br><br>
          <input type="text" class="validThru" name="validThhru" onKeyup="inputValidThru(this);" placeholder="MM/YY" maxlength="5"/><br><br>
        </div>
        <div class="booking_creditcvc">
          CVC<br><br>
          <input type="text" placeholder="3자리" name="CVC" maxlength="3"/><br><br>
        </div>
      </div>
      <div class="booking_privacy">
        개인정보 수집동의&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="privacy" value="동의"><a class= "booking_privacy_checklist">개인정보 수집 이용동의</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Database_Hotel_Website_Privacy.php" class="booking_look_privacy"><u>약관보기</u></a>
      </div>
      <div class="booking_cancel">
        취소 규정&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="privacy1" value="동의"><a class= "booking_privacy_checklist">취소규정 동의</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Database_Hotel_Website_Privacy.php" class="booking_look_privacy"><u>약관보기</u></a>
      </div>
    </div>
    <div class="btn_area3">
      <button type="submit" id="btnJoin" >
        <span>예약하기</span>
      </button>
    </div>
  </form>
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
  <script src="js/mainBookingBar.js"></script>
  <script src="js/take.js"></script>
</body>
</html>
