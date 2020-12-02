<?php
session_start();
$_SESSION["username"]=0;
echo("<script>alert('로그아웃 되었습니다.')
location.href='../../FrontExample/main.php'</script>");
 ?>
