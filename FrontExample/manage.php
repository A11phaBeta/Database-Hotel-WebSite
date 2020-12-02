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
    <div class="managerscreen">
      <a href="manage.php">
        <img src="img/logo.png" class="hotelLogo" />
      </a>
      <div class="managerTab">
        <a>관리페이지</a>
      </div>
    </div>
    <!-- 관리자 -->
    <div class="manage">
      <a href="main.php">호텔사이트로 돌아가기</a>
      <a class="manageProflie">000 관리자</a>
    </div>

    <!-- 상단 메뉴 -->
    <nav>
      <div class="manageMenu">
        <ul>
          <li class="m_menu">
            <a href="../FrontExample/managerPage/booking_m.php">예약관리</a>
          </li>
          <li class="m_menu">
            <a href="../FrontExample/managerPage/customer_m.php">고객관리</a>
          </li>
          <li class="m_menu">
            <a href="../FrontExample/managerPage/employee_m.php">직원관리</a>
          </li>
          <li class="m_menu">
            <a href="../FrontExample/managerPage/stock_m.php">재고관리</a>
          </li>
          <li class="m_menu">
            <a href="../FrontExample/managerPage/revenue_m.php">수익통계</a>
          </li>
          <li class="m_menu">
            <a href="../FrontExample/managerPage/question_m.php">문의관리</a>
          </li>
          <li class="m_menu"><a href="../FrontExample/managerPage/site_m.php">사이트관리</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- 메인 -->
  <main>
    <div class="mContainer">

    </div>
  </main>

  <!--- 하단 -->
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
        <a href="manage.php"><img src="img/logo.png" class="bottomLogo" /></a>
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
