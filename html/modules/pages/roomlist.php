<?php
session_start();
require_once('./modules/header.php');

if(isset($_POST['checkin']) && isset($_POST['checkout'])){
    if((strtotime($_POST['checkin']) >= strtotime($_POST['checkout']))){
        echo "<script>alert('체크인 날짜가 체크아웃 날짜보다 늦거나 같을 수 없습니다.');location.href='./?roomlist';</script>";
    }

    else{
        $_SESSION['checkin'] = $_POST['checkin'];
        $_SESSION['checkout'] = $_POST['checkout'];
        $_SESSION['adult'] = $_POST['adult'];
        $_SESSION['child'] = $_POST['child'];
    }
}
else{

}

?>
    <article class="container-fluid">
        <div class="container-fluid booking-form" id="booking-from">
            <form action="./?roomlist" method="post">
            <table class="container-fluid">
                
                <thead>
                   
                </thead>
                <tbody>
                    <tr>
                        <th width="23%">체크인</th>
                        <th width="23%">체크아웃</th>
                        <th width="23%">성인</th>
                        <th width="23%">어린이</th>
                        <th  width="*" rowspan="2"><button type="submit">Search</button></th>
                    </tr>
                    <tr>
                        <?php
                            if(!isset($_SESSION['checkin'])){
                                echo '<th><input type="date" name="checkin" value="'.date("Y-m-d").'" required></th>';
                            }else{
                                echo '<th><input type="date" name="checkin" value="'.$_SESSION['checkin'].'" required></th>';
                            }
                        ?>

                        <?php
                            if(!isset($_SESSION['checkout'])){
                                echo '<th><input type="date" name="checkout" value="'.date("Y-m-d").'" required></th>';
                            }else{
                                echo '<th><input type="date" name="checkout" value="'.$_SESSION['checkout'].'" required></th>';
                            }
                        ?>
                        
                        
                        <th>
                            <div class="number-counter">
                                <input type="number" name="adult" value="<?=$_SESSION['adult']?>" min="1" />
                            </div>
                        </th>
                        <th>
                            <div class="number-counter">
                                <input type="number" name="child" value="<?=$_SESSION['child']?>" min="0" />
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
        

        <div class="container-fluid intro-hotel bg-white" id="intro-hotel">
            <h4>객실리스트</h4>
            
            <?php
                if(isset($_SESSION['checkin'])){
                    require_once('./apis/modules/room.php');

                    $res = getRoomList();
                    $resObj = json_decode($res, true);

                    
                    for($i=0;$i<$resObj['header']['count'];$i++){
                        $jsonObj = json_decode(getRoomInfo($resObj['body'][$i]['room_type_id']), true);
                        echo '<div class="container-fluid room-block">
                                <img src="./assets/images/standard_room.jpg" alt="" width="200" height="135">
                                <div class="room-info">
                                    <p name="room-name">'.$resObj['body'][$i]['room_name'].'</p>
                                    <p name="room-desc">'.$resObj['body'][$i]['description'].'</p>
                                    <p name="room-price">'.number_format($resObj['body'][$i]['base_price']).'원</p>
                                    
                                    <button onclick="location.href=\'./?roominfo&type='.$resObj['body'][$i]['room_type_id'].'\'"> 세부정보 </button>
                                    ';
                        if(strcmp($resObj['body'][$i]['isbook'], 'true') == 0){
                            echo '<button class="already-book"> 예약하기 </button>';
                        }else{
                            if($jsonObj['max_people'] < $_SESSION['adult'] + $_SESSION['child']){
                                echo '<button class="already-book" onclick="alert(\'최대인원을 초과하여 예약할 수 없습니다.\')"> 최대인원 초과 </button>';
                            }else{
                                echo '<button onclick="location.href=\'./?booking&roomtype='.$resObj['body'][$i]['room_type_id'].'\'"> 예약하기 </button>';
                            }
                            
                        }
                                    
                        echo '</div></div><hr>';
                    }

                    
                }else{
                    echo "<p> 채크인 / 체크아웃 / 인원수를 체크하여 검색 버튼을 눌려주세요. </p>";
                }
            ?>
        </div>
    </article>

<?php

require_once('./modules/footer.php');

?>
