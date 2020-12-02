<?php
$pwd=$_POST["password"];
session_start();
$password=$_SESSION["userpassword"];
if($pwd==$password){
  echo ("
  <script> location.href = '../../FrontExample/mypage/privacy.php'
  </script>
  ");
}
else{
  echo ("<script> alert('비밀번호가 틀립니다.')
                  history.go(-1)</script>");
} ?>
