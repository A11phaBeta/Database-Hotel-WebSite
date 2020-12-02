<?php
$useremail=$_POST["email"];
$username=$_POST["name"];

$con = mysqli_connect("localhost", "root", "", "hotel");
$sql = "select * from user_information where email='$useremail' and user_name='$username'";
$rel = mysqli_query($con, $sql);
$row = mysqli_fetch_array($rel);

if(!$row){
  echo("
  <script>
  alert('일치하는 아이디가 없습니다.')
  history.go(-1)
  </script>");
}
else {
  $userpassword=$row['user_password'];
  echo("
  <script>
  alert('$userpassword')
  location.href='../../FrontExample/loginpage.php'
  </script>");
}
 ?>
