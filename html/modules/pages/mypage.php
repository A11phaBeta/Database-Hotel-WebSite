<?php
@session_start();
require_once('./modules/header.php');
?>

<article class="container-fluid">

    <div class="left-panel">
        <h4>마이페이지</h4>
        <ul>
            <li id="membership" class="active">나의 멤버쉽 정보</li>
            <li id="booking">예약확인 / 취소</li>
            <li id="coupon">쿠폰함</li>
            <li id="qna">문의내역</li>
            <li id="information">개인정보</li>

            <?php
                if($_SESSION['staff_id'] > 0){
                    echo '<a href="./modules/pages/management/index.php">관리자 페이지</a>';
                }
            ?>

        </ul>
    </div>

    <div class="right-panel">
        <iframe id="frame" src="./modules/pages/mypage/membership.php" frameborder="0"></iframe>
    </div>

    <script>
        $(document).ready(function(){
            document.getElementById('frame').contentDocument.location.reload(true);
            $('li').click(function(){
                $('.active').attr('class', '');
                $(this).attr('class', 'active');
                $('iframe').attr('src', "./modules/pages/mypage/"+$(this).attr('id') + ".php")
            });
        });
    </script>
</article>

<?php

require_once('./modules/footer.php');

?>
