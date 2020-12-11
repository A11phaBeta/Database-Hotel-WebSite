<?php
session_start();
require_once('./modules/header.php');
?>

<article class="container-fluid">
    <form action="./apis/apiControl.php?book" method="post">
    <div class="container-fluid intro-hotel bg-white" id="intro-hotel">
        
        <?php
        require_once('./apis/modules/room.php');

        $res = getRoomInfo($_GET['roomtype']);
        $resObj = json_decode($res, true);
        ?>

        <div class="intro-header">
                <div>
                        <h4>예약 정보</h4>
                        <div class="intro-content">
                                <h6>(<?=$resObj['room_name']?>)</h6>
                        </div>
                        <div class="intro-content">
                                <h6>체크인 : <?=$_SESSION['checkin']?> 15시</h6>
                        </div>
                        <div class="intro-content">
                                <h6>체크아웃 : <?=$_SESSION['checkout']?> 14시</h6>
                        </div>
                        <div class="intro-content">
                                <h6>투숙인원 : 어른(<?=$_SESSION['adult']?>명) / 어린이(<?=$_SESSION['child']?>명)</h6>
                        </div>
                        <div class="intro-content">
                        <?php
                                $price = $resObj['base_price'] + ($resObj['addfee_price'] * ((($_SESSION['adult'] + $_SESSION['child']) - $resObj['base_people']) < 0 ? 0 : (($_SESSION['adult'] + $_SESSION['child']) - $resObj['base_people'])));
                        ?>
                        <h6>예약금액 : <?=number_format($price)?>원(VAT 포함가)</h6>
                        </div>
                </div>
                
        </div>
        

        
        
        

        <input type="hidden" name="room_type" value="<?=$_GET['roomtype']?>">
        <input type="hidden" name="room_name" value="<?=$resObj['room_name']?>">
        <input type="hidden" name="checkin" value="<?=$_SESSION['checkin']?>">
        <input type="hidden" name="checkout" value="<?=$_SESSION['checkout']?>">
        <input type="hidden" name="adult" value="<?=$_SESSION['adult']?>">
        <input type="hidden" name="child" value="<?=$_SESSION['child']?>">
        <input type="hidden" name="price" value="<?=round($price/11*10)?>">
        <input type="hidden" name="vat" value="<?=round($price/11)?>">


        <h4>예약자 정보</h4>
        <hr class=" two-grid">

        <?php
            if(isset($_SESSION['user_id'])){
                require_once('./apis/modules/user.php');

                $jsonObj = json_decode(getUserInfo($_SESSION['user_id']), true);
            }else{
                $jsonObj = ['result' => "not_found"];
            }
        ?>

        <div class="intro-content two-grid">
                <h6>성명</h6>
                <?php
                        if(strcmp($jsonObj['result'], "found") == 0){
                               echo '<input type="text" name="userName" value="'.$jsonObj['user_name'].'" placeholder="성명을 입력하세요.">';
                        }else{
                                echo '<input type="text" name="userName" placeholder="성명을 입력하세요.">';
                        }
                ?>
                
        </div>
        <div class="intro-content two-grid">
                <h6>이메일</h6>
                <?php
                        if(strcmp($jsonObj['result'], "found") == 0){
                               echo '<input type="email" name="userEmail" value="'.$jsonObj['email'].'" placeholder="이메일을 입력하세요.">';
                        }else{
                                echo '<input type="email" name="userEmail" placeholder="이메일을 입력하세요.">';
                        }
                ?>
        </div>
        <div class="intro-content two-grid">
                <h6>연락처</h6>

                
                <?php
                        if(strcmp($jsonObj['result'], "found") == 0){
                               echo '<input type="text" name="userPhone" value="'.$jsonObj['contact'].'" placeholder="성명을 입력하세요.">';
                        }else{
                                echo '<input type="text" name="userPhone" placeholder="이메일을 입력하세요.">';
                        }
                ?>
        </div>

        <div class="intro-content two-grid">
                <h6>기타 요청사항</h6>

                <input type="text" name="comment" placeholder="요청사항을 입력해주세요.">
        </div>
        <h4 class=" two-grid">결제 정보</h4>
        <hr class=" two-grid">
        <div class="intro-content two-grid">
                <h6>결제방법</h6>
                <select name="payment">
                    <option value="0">&nbsp;카드 선택</option>
                    <option value="1">&nbsp;하나 BC</option>
                    <option value="2">&nbsp;비씨카드(페이북)</option>
                    <option value="3">&nbsp;제주카드</option>
                    <option value="4">&nbsp;씨티카드</option>
                    <option value="5">&nbsp;신협카드</option>
                    <option value="6">&nbsp;현대카드</option>
                    <option value="7">&nbsp;하나카드</option>
                    <option value="8">&nbsp;KB증권(현대증권)</option>
                    <option value="9">&nbsp;전북카드</option>
                    <option value="10">&nbsp;카카오뱅크</option>
                    <option value="11">&nbsp;KDB산업</option>
                    <option value="12">&nbsp;하나(외환)</option>
                    <option value="0">&nbsp;광주카드</option>
                    <option value="1">&nbsp;케이뱅크</option>
                    <option value="2">&nbsp;KB 국민</option>
                    <option value="3">&nbsp;신한카드</option>
                    <option value="4">&nbsp;롯데카드</option>
                    <option value="5">&nbsp;NH채움</option>
                    <option value="6">&nbsp;우체국카드</option>
                    <option value="7">&nbsp;우리카드</option>
                    <option value="8">&nbsp;저축은행</option>
                    <option value="9">&nbsp;MG새마을</option>
                    <option value="10">&nbsp;삼성카드</option>
                    <option value="11">&nbsp;수협카드</option>
                </select>
        </div>
        <div class="intro-content two-grid">
                <h6>카드번호</h6>
                <input type="text" name="cardnumber" placeholder="카드번호를 입력하세요. ( '-'을 제외하고 입력 )" required>
        </div>
        <div class="intro-content two-grid">
                <h6>카드 유효기간</h6>
                <input type="text" name="expireDate" placeholder="유효기간을 입력하세요. (YYMM)" required>
        </div>
        <div class="intro-content two-grid">
                <h6>CVC</h6>
                <input type="text" name="cvc" placeholder="CVC를 입력하세요." required>
        </div>

        <h4 class=" two-grid">규정 확인</h4>
        <hr class="two-grid">
        <div class="intro-content">
                <label for=""><input type="checkbox" required> 개인정보수집 및 이용에 동의하십니까? <a href="">약관보기</a></label>
        </div>
        <div class="intro-content">
                <label for=""><input type="checkbox" required> 취소규정에 대해서 확인하셨습니까? <a href="">규정보기</a></label>
        </div>
        <div class="intro-content right" >
        <button type="submit" class="btn btn-primary">결제 및 예약하기</button>
        <div>
    </div>
    </form>
</article>

<?php

require_once('./modules/footer.php');

?>