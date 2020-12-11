<?php
session_start();
require_once('./modules/header.php');
?>

<article class="container-fluid">
        <div class="container-fluid booking-form" id="booking-from">
            <table class="container-fluid">
                <thead>
                   
                </thead>
                <tbody>
                    <tr>
                        <th width="23%">체크인</th>
                        <th width="23%">체크아웃</th>
                        <th width="23%">성인</th>
                        <th width="23%">어린이</th>
                        <th  width="*" rowspan="2"><a href="">Search</a></th>
                    </tr>
                    <tr>
                        <?php
                            if(!isset($_POST['checkin'])){
                                echo '<th><input type="date" name="checkin" value="'.date("Y-m-d").'" required></th>';
                            }else{
                                echo '<th><input type="date" name="checkin" value="'.$_POST['checkin'].'" required></th>';
                            }
                        ?>
                        
                        <th><input type="date" name="checkout" value="<?=date("Y-m-d", strtotime("+1 day", strtotime(date("Y-m-d"))))?>" required></th>
                        <th>
                            <div class="number-counter">
                                <input type="number" value="1" min="1" />
                            </div>
                        </th>
                        <th>
                            <div class="number-counter">
                                <input type="number" value="0" min="0" />
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php
            require_once('./apis/modules/room.php');

            $jsonObj = json_decode(getRoomInfo($_GET['type']), true);
        ?>
        <div class="container-fluid intro-hotel bg-white" id="intro-hotel">
            <h4><?=$jsonObj['room_name']?> 객실소개</h4>

            <table class="table">
                <thead>
                    <tr>
                        <th class="mypage_question_table1">기본 인원수</th>
                        <th class="mypage_question_table1">기본 요금</th>
                        <th class="mypage_question_table1">추가 인원요금</th>
                        <th class="mypage_question_table1">WIFI / INTERNET</th>
                        <th class="mypage_question_table1">미니바</th>
                        <th class="mypage_question_table1">조식제공</th>
                    </tr>
                </thead>  
            
                <tr>
                    <td class="mypage_question_table1"><?=$jsonObj['base_people']?>인</td>
                    <td class="mypage_question_table1"><?=number_format($jsonObj['base_price'])?>원</td>
                    <td class="mypage_question_table1"><?=number_format($jsonObj['addfee_price'])?>원</td>
                    <td class = "mypage_question_table_td"><?=$jsonObj['wifi']?></td>
                    <td class = "mypage_question_table_td"><?=$jsonObj['minibar']?></td>
                    <td class = "mypage_question_table_td"><?=$jsonObj['morning_meal']?></td>
                </tr>
                
            </table>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner  h-50">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./assets/images/standard_room.jpg" alt="First slide">
                    
                    </div>
                
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            
        </div>

</article>

<?php
require_once('./modules/footer.php');
?>