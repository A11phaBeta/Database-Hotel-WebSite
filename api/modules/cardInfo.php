<?php
session_start();
$cardS=$_POST["cardname"];
$cardN= array($_POST["moveNumber1"],$_POST["moveNumber2"],$_POST["moveNumber3"],$_POST["moveNumber4"]);
$cardNS=$cardN[0].$cardN[1].$cardN[2].$cardN[3];
$cardV=$_POST["validThhru"];
$cardC=$_POST["CVC"];
$regist_day= date("Y-m-d (H:i)");
$checkbox=$_POST["privacy"];
$checkbox1=$_POST["privacy1"];
$roomname=$_SESSION["cubaM"];
$checkin=$_SESSION["check_in"];
$checkout=$_SESSION["check_out"];
$adultnumber=$_SESSION["adultN"];
$childnumber=$_SESSION["childN"];
if($checkbox=='동의' && $checkbox1=='동의'){
  $con = mysqli_connect("localhost","root","","hotel");
  $sql = "insert into card_information(card_name,card_number,card_valid,card_cvc,regist_day) values('$cardS','$cardNS','$cardV','$cardC','$regist_day')";
  $sql1 = "insert into booking_log(room_name,check_in_date,check_out_date,adult_number,child_number,time_stamp) values('$roomname', '$checkin', '$checkout', '$adultnumber', '$childnumber','$regist_day')";
  mysqli_query($con, $sql);
  mysqli_query($con, $sql1);
  echo ("<script> alert('예약완료.'); location.href='../../FrontExample/mypage/membership.php'</script>");

}
else{
  echo ("<script> alert('동의해주세요.') </script>");
  echo ("<script> history.go(-1); </script>");
  exit;
}

 ?>
