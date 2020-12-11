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

        <?php
            session_start();
            require_once('../../../apis/modules/user.php');

            $jsonObj = json_decode(getMembershipInfo($_SESSION['user_id']), true);
        ?>
        <div class="header">
          my page > 나의 멤버쉽 정보
        </div>
        <div class="title">
          나의 멤버쉽 정보
        </div>
        <hr class = "five">
        <div class="information">
          <?=$jsonObj['user_info']['user_name']?>님의 소프트 등급 및 포인트에 대한 안내입니다.
        </div>
        <table class = "table">
          <thead>
          <tr>
            <th>이름</th>
            <th>고객 번호</th>
            <th>고객 등급</th>
            <th>포인트</th>
          </tr>
          </thead>
          <tr>
            <td><?=$jsonObj['user_info']['user_name']?></td>
            <td><?=$jsonObj['user_info']['user_id']?></td>
            <td>CLASSIC</td>
            <td><?=$jsonObj['user_info']['point']?></td>
          </tr>
        </table>
        <div class="title">
          이용실적
          <!-- <input type="button" name="등급별 혜택 보기" value="등급별 혜택 보기" class = "mypage_main_button1"> -->
        </div>
        <hr class="five">
        <table class="table">

            <thead>

                <tr>
                    <th>투숙횟수</th>
                    <th>투숙일수</th>
                    <th>결제금액</th>
                </tr>
            </thead>
          
          <tr>
            <td class = "td5"><?=$jsonObj['book_info']['bookCnt']?>회</td>
            <td class = "td6"><?=$jsonObj['book_info']['sleepDays']?>일</td>
            <td class = "td7"><?=number_format($jsonObj['book_info']['totalAmount'] + $jsonObj['book_info']['totalVAT'])?>원</td>
          </tr>
        </table>
        
</div>
</body>
</html>