<?php
session_start();
$_SESSION["check_in"]=$_POST["currentDate"];
$_SESSION["check_out"]=$_POST["currentDate1"];
$_SESSION["adultN"]=$_POST["num1"];
$_SESSION["childN"]=$_POST["num2"];
$_SESSION["cubaM"]=$_POST["cuba"];

$username=$_SESSION["username"];
$roomnumber=$_SESSION["roomnumber"];
if($username){
  if($roomnumber){
  echo ("<script> location.href='../../FrontExample/booking.php'</script>");
  }
}
else {
  echo ("<script> location.href='../../FrontExample/roomList_loginpage.php'</script>");
}
 ?>
