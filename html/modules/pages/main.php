<?php
session_start();
require_once('./modules/header.php');

?>
    <article class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner  h-50">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./assets/images/slider1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block"> <h5>12월 크리스마스 특별선</h5> <p>이번 크리스마스는 가족과 함께 "CDS HOTEL"에서</p> </div>
                </div>
                <div class="carousel-item">
                <img class="d-block" src="" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block" src="" alt="Third slide">
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
                        <th  width="*" rowspan="2"><input type="submit" href="./?roomlist" value="Search"></input></th>
                    </tr>
                    <tr>
                            <th><input type="date" name="checkin" value="<?=date("Y-m-d")?>" required></th>
                            <th><input type="date" name="checkout" value="<?=date("Y-m-d", strtotime("+1 day", strtotime(date("Y-m-d"))))?>" required></th>
                            <th>
                                <div class="number-counter">
                                    <input type="number" name="adult" value="1" min="1" required/>
                                </div>
                            </th>
                            <th>
                                <div class="number-counter">
                                    <input type="number" name="child" value="0" min="0" required/>
                                </div>
                            </th>

                    </tr>
                </tbody>
            </table>
        </form>
        </div>
        <div class="container-fluid intro-hotel bg-white" id="intro-hotel">
            <h4>호텔소개</h4>

            <img width="1078" src="./assets/images/hotelview.jpg" alt="">

            <div class="intro-content">
                <h4>경복궁의 뷰를 호텔에 담다</h4>
                <p>CDS Hotel를 찾아주신 수많은 국빈분들은 '경복궁 야경'을 잊지 못한다고 하셨습니다. 경복궁 바로 앞에 위치하여 아름다운 야경 뷰를 관람하실 수 있습니다.</p>
            </div>

            <div class="intro-content">
                <h4>최고의 호텔</h4>
                <p>CDS Hotel은 '최고의 호스피탈리티 기업'을 목표로 오랜 세월동안 품위와 전통을 유지하며 고객들의 마음을 사로잡아 왔습니다.</br>세계 최고의 럭셔리 호텔들과 어깨를 나란히 하는가 하면 전통이라는 지붕 위에 모더니즘적 디자인 요소를 가미, 삶의 여유와 품격을 한층 높여주는 </br>프리미엄 라이프 스타일 공간으로 변화를 거듭해 왔습니다.</p>
            </div>

            <div class="intro-content">
                <h4>찾아오시는 길</h4>
                <iframe

                height="450"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBGw_aq4BnMTJoxbApe-efaZLsIT3u5_4Y
                    &q=서울특별시 종로구 세종로 사직로 161" allowfullscreen>
                </iframe>
            </div>
        </div>

        <div class="container-fluid intro-hotel" id="contact">
            <h4>고객문의</h4>

            <img width="1078" src="./assets/images/hotelview.jpg" alt="">

            <div class="intro-content">
                <h4>고객님의 소중한 의견을 남겨주세요</h4>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">고객님 성함</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="홍길동">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">회신드릴 이메일</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">문의사항</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">문의사항 접수하기</button>
                </form>
            </div>


        </div>
    </article>

<?php

require_once('./modules/footer.php');

?>
