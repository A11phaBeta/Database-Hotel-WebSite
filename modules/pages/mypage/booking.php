<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../styles/modules/membership.css">
</head>
<body>
<div class="mypage_main">
        <div class="header">
          my page > 예약 확인 / 취소
        </div>
        <div class="title">
          예약 확인 / 취소
        </div>
        <hr class = "five">
        <div class="information">
          객실 예약내역을 확인하실수 있습니다.
        </div>

        <?php
              $startDate = date("Y-m-d");
              $finishDate = date("Y-m-d", strtotime("+1 day", strtotime(date("Y-m-d"))));
              if(isset($_POST['startDate']) && !isset($_POST['finishDate'])){
                $startDate = $_POST['startDate'];
                $finishDate = $_POST['finishDate'];
              }
        ?>
        
        <form action="#" method="post">
        <div class="search-content">
          <div class="search">
            <a class = "mypage_reservation_past"><input type="date" id="currnetDate" value="<?=$startDate?>" name="startDate" class="date"/></a>
            <a class = "mypage_reservation_past1">~</a>
            <a class = "mypage_reservation_past"><input type="date" id="currnetDate" value="<?=$finishDate?>" name="finishDate" class="date"/></a>
            <input type="submit" name="예약 조회" value="예약 조회" class = "mypage_reservation_button">
          </div>
          
        </div>
        </form>
        <div class="information">
          *투숙기간 기준으로 오늘부터 최신 예약 정보가 우선 조회됩니다.
        </div>
        <table class = "table">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>객실</th>
                    <th>체크인/체크아웃</th>
                    <th>성인</th>
                    <th>어린이</th>
                    <th>예약일</th>
                    <th>예약상태</th>
                    <th>취소</th>
                </tr>
            </thead>
          
            <?php
              session_start();
              require_once('../../../apis/modules/book.php');

              $jsonObj = json_decode(getBookingLog($_SESSION['user_id'], $startDate, $finishDate), true);

              if(count($jsonObj) == 0){

              }else{
                for($i=0;$i<count($jsonObj);$i++){
                  echo "<tr>
            
                  <td>".($i+1)."</td>
                  <td>".$jsonObj[$i]['room_name']."</td>
                  
                  <td>".$jsonObj[$i]['checkin_date']." ~ ".$jsonObj[$i]['checkout_date']."</td>
                  <td>".$jsonObj[$i]['adult']."</td>
                  <td>".$jsonObj[$i]['child']."</td>
                  <td>".$jsonObj[$i]['timestamp']."</td>";


                  $diffDate = strtotime(date("Y-m-d")) - strtotime($jsonObj[$i]['checkin_date']);
                  if($diffDate > 0){
                    echo "<td>완료</td>";
                  }else if($diffDate == 0){
                    echo "<td>오늘 입실</td>";
                  }else{
                    echo "<td>예약</td>";
                    echo "<td><a href='../../../apis/apiControl.php?cancelBook&log_id=".$jsonObj[$i]['log_id']."'>취소</a></td>";
                  }
                  
                  echo "</tr>";
                }
              }
              
            ?>
          
          
        </table>
      </div>
</body>
</html>