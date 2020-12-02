<?php
session_start();
$check=$_POST["privacy"];
$useremail=$_SESSION["useremail"];
$con=mysqli_connect("localhost","root","","hotel");
$sql="delete from user_information where email='$useremail'";
if(!$check){
  echo ("<script>
  alert('동의해주세요.')
  history.go(-1)
  </script>
  ");
  exit;
}
else {
  mysqli_query($con, $sql);
  $_SESSION["username"]=0;
  echo ("<script>
  alert('탈퇴.')
  location.href='../../FrontExample/main.php'
  </script>
  ");

}
 ?>
