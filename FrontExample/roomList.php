<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script> function SUBMIT() { document.room.submit();} </script>
</head>

<body>
  <!-- 상단 -->
  <header>
    <!-- 로그인, 회원가입 -->
    <div class="loginSign">
      <?php session_start(); if($_SESSION["username"]){
        echo ("<a href='mypage/membership.php' class='login'>마이페이지</a>");
      }
      else {
        echo '<a href="roomList_loginpage.php" class="login">로그인</a>';
      }?>
      <?php if($_SESSION["username"]){
        echo ('<a href="../api/modules/logout.php" class="sign">로그아웃</a>');
      }
      else {
        echo '<a href="signUp.php" class="sign">회원가입</a>';
      }?>
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
  <main>
<form name="room" method="post" action="../api/modules/book.php">
    <div class="container">
      <!-- 메인메뉴 예약 바-->
      <div class="bookingMainBar">
        <div class="bookingSelect">
          <!-- 체크인, 체크아웃, 객실, 인원 수 -->

            <table>
              <tr>
                <th>체크인</th>
                <th>체크아웃</th>
                <th>객실</th>
                <th>성인</th>
                <th>어린이</th>
              </tr>
              <tr>
                <td>
                  <table>
                    <tr>
                      <td>
                        <div>
                          <input type="date" id="currnetDate" name="currentDate" class="date" />
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
                <td>
                  <table>
                    <tr>
                      <td>
                        <div>
                          <input type="date" id="currnetDate1" name="currentDate1" class="date" />
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
                <td>
                  <table class="numnum">
                    <tr>
                      <td>
                        <div>
                          <img src="img/cntDown.png" alt="" width="10" height="10" class="countDown" />
                        </div>
                      </td>
                      <td>
                        <input type="text" name="num" value="1" id="" class="num" />
                      </td>
                      <td>
                        <div>
                          <img src="img/cntUp.png" alt="" width="10" height="10" class="countUp" />
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
                <td>
                  <table class="numnum">
                    <tr>
                      <td>
                        <div>
                          <img src="img/cntDown.png" alt="" width="10" height="10" class="countDown" />
                        </div>
                      </td>
                      <td>
                        <input type="text" name="num1" value="1" id="" class="num" />
                      </td>
                      <td>
                        <div>
                          <img src="img/cntUp.png" alt="" width="10" height="10" class="countUp" />
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
                <td>
                  <table class="numnum">
                    <tr>
                      <td>
                        <div>
                          <img src="img/cntDown.png" alt="" width="10" height="10" class="countDown" />
                        </div>
                      </td>
                      <td>
                        <input type="text" name="num2" value="0" id="" class="num" />
                      </td>
                      <td>
                        <div>
                          <img src="img/cntUp.png" alt="" width="10" height="10" class="countUp" />
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          <!-- 방 검색 -->
          <a class="searchRoom" href="roomList.php">
            <p>search</p>
          </a>
        </div>
      </div>
      <!-- 객실리스트 -->
     <div class="rList">
       <a>객실 선택</a>
       <hr class="two">
     </div>
     <div class ="roomList">
       <a><img src="img/room_img.png" class="room_img"></a>

       <div class= "roomtitle">
         <a class="roommaintitle">스탠다드 싱글<br><br></a><a>이 방은 침대가 1개 입니다.</a>
       </div>
       <div class="btn_area2">
           <!--<input type="hidden" name="cuba" value="1"/>-->
           <button type='submit' name='cuba' value='1' id='btnJoin'>
           <!-- -->
            <span>예약하기</span>
           </button>
       </div>

       <div class="room_price"><a class="room_price1">500,000~</a>
         <div class="roomdate">1박</div>
      </div>
     </div>
     <div class ="roomList">
       <a><img src="img/room_img.png" class="room_img"></a>
       <div class= "roomtitle">
          <a class="roommaintitle">스탠다드 더블<br><br></a><a>이 방은 침대가 2개 입니다.</a>
       </div>
       <div class="btn_area2">
           <button type='submit' name='cuba' value='2' id='btnJoin'>
           <span>예약하기</span>
         </button>

       </div>
       <div class="room_price"><a class="room_price1">500,000~</a>
         <div class="roomdate">1박</div>
      </div>
     </div>
     <div class ="roomList">
       <a><img src="img/room_img.png" class="room_img"></a>
       <div class= "roomtitle">
         <a class="roommaintitle">스탠다드 쿼터<br><br></a><a>이 방은 침대가 4개 입니다.</a>
       </div>
       <div class="btn_area2">
           <!-- <input type="hidden" name="cuba" value="3"/>-->
           <button type='submit' name='cuba' value='3' id='btnJoin'>
           <span>예약하기</span>
         </button>

       </div>
       <div class="room_price"><a class="room_price1">500,000~</a>
         <div class="roomdate">1박</div>
      </div>
     </div>
    </div>
  </main>
</form>
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
  <script> /*$("button").click(
    function here(){
      var index= $("button").index(this);
      alert(index);
      location.href = "../api/modules/booking.php?cuba=" + index;
      submit();
    }
  )*/</script>
</body>
</html>
