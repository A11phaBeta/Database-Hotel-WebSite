

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>호텔 웹 사이트</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/modules/<?=$convQuery?>.css">
    <link rel="stylesheet" href="./styles/footer.css">

    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>
<body>
    <header class="container-fluid">
            <!-- Image and text -->
            <nav class="navbar navbar-light">
                <a class="nav-link" href="./?roomlist">예약하기</a>
                <a class="nav-link" href="./?#intro-hotel">호텔소개</a>
                <a class="navbar-brand" href="./?">
                    <img src="./assets/images/logo.png" width="120" height="120" class="d-inline-block align-top" alt="" loading="lazy">
                </a>
                <a class="nav-link" href="./?#contact">고객문의</a>
                <a class="nav-link" href="">게시판</a>
            </nav>

            <div class="login-div">
            <?php
                if(!isset($_SESSION['user_name'])){
                    echo '<a href="./?login&mode=">로그인</a>
                    <a href="./?signup">회원가입</a>';
                }else{
                    echo '<a href="./?mypage">마이페이지</a>
                    <a href="./apis/apiControl.php?logout">로그아웃</a>';
                }

       ?>

            </div>

    </header>
