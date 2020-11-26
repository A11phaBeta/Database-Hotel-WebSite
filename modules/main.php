<?php
session_start();
require_once('./modules/header.php');
 ?>


  <!-- 메인 -->
  <main>
    <div class="container">
      <div class="imageSlide">
        <img src="./assets/img/imageSlide.jpg" class="imgSld" />
      </div>
      <!-- 메인메뉴 예약 바-->
      <div class="bookingMainBar">
        <div class="bookingSelect">
          <!-- 체크인, 체크아웃, 객실, 인원 수 -->
          <form name="search-form" action="./?roomList" method="post">
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
                          <input type="date" id="currnetDate" class="date"/>
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
                          <input type="date" id="currnetDate1" class="date"/>
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
                          <img src="./assets/img/cntDown.png" alt="" width="10" height="10" class="countDown" />
                        </div>
                      </td>
                      <td>
                        <input type="text" name="num" value="1" id="" class="num" />
                      </td>
                      <td>
                        <div>
                          <img src="./assets/img/cntUp.png" alt="" width="10" height="10" class="countUp" />
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
                          <img src="./assets/img/cntDown.png" alt="" width="10" height="10" class="countDown" />
                        </div>
                      </td>
                      <td>
                        <input type="text" name="num" value="1" id="" class="num" />
                      </td>
                      <td>
                        <div>
                          <img src="./assets/img/cntUp.png" alt="" width="10" height="10" class="countUp" />
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
                          <img src="./assets/img/cntDown.png" alt="" width="10" height="10" class="countDown" />
                        </div>
                      </td>
                      <td>
                        <input type="text" name="num" value="0" id="" class="num" />
                      </td>
                      <td>
                        <div>
                          <img src="./assets/img/cntUp.png" alt="" width="10" height="10" class="countUp" />
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <input type="submit" name="submit" class="searchRoom" value="search">
            </input>
          </form>
          <!-- 방 검색 -->

        </div>
      </div>
      <!-- 행사 이미지 -->
      <div class="eventPage">
        <img src="./assets/img/image1.jpg" class="imgSld" />
      </div>
      <div class="eventPage">
        <img src="./assets/img/image2.jpg" class="imgSld" />
      </div>
      <div class="eventPage">
        <img src="./assets/img/image3.jpg" class="imgSld" />
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
  <script src="js/mainBookingBar.js"></script>
</body>
</html>
