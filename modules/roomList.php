<?php
session_start();
require_once('./modules/header.php');

 ?>

  <!-- 메인 -->
  <main>
    <div class="container">
      <!-- 메인메뉴 예약 바-->
      <div class="bookingMainBar">
        <div class="bookingSelect">
          <!-- 체크인, 체크아웃, 객실, 인원 수 -->
          <form>
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
                          <input type="date" id="currnetDate" class="date" />
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
                          <input type="date" id="currnetDate1" class="date" />
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
          </form>
          <!-- 방 검색 -->
          <a class="searchRoom" href="roomList.html">
            <p>search</p>
          </a>
        </div>
      </div>
      <!-- 객실리스트 -->
     <div class="rList">
       <a>객실 선택</a>
       <hr class="two">
     </div>

     <?php

     require_once('./api/modules/room.php');

     $res = getRoomList();
     $resObj = json_decode($res, true);

     if(strcmp($resObj['header']['result'], "success") == 0){
       for($i=0;$i<$resObj['header']['count'];$i++){
         echo '<div class ="roomList">
           <a><img src="./assets/img/'.$resObj['body'][$i]['image_file'].'" class="room_img"></a>
           <div class= "roomtitle">
             <a class="roommaintitle">'.$resObj['body'][$i]['room_name'].'<br><br></a><a>'.$resObj['body'][$i]['description'].'</a>
           </div>
           <div class="btn_area2">
             <button type="button" id="btnJoin" onclick="location.href=\'roomList_loginpage.html\'">
               <span>예약하기</span>
             </button>
           </div>
           <div class="room_price"><a class="room_price1">'.$resObj['body'][$i]['base_price'].'~</a>
             <div class="roomdate">1박</div>
          </div>
         </div>';
       }
     }else{

     }

      ?>



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
