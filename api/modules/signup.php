<?php
  /* 아이디 - 이메일
    비밍번호
    이름
    생년월일
    성별
    휴대전화
    */
    $email = $_POST["email"];
    $password = $_POST["pswd1"];
    $name = $_POST["name"];
    $birth = $_POST["yy"];//+$_POST["mm"]+$_POST["dd"];
    $gender = $_POST["gender"];
    $phoneNum = $_POST["number"];

    $con = mysqli_connect("localhost", "root", "", "hotel");

    $sql = "insert into user_information(user_name, contact, email, user_password, birth, gender) values('$name', '$phoneNum', '$email', '$password', '$birth', '$gender')";

    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
        <script> location.href='../../FrontExample/loginpage.php';
        </script>
        ";
        ?>
