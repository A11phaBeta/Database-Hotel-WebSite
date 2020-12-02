<?php
session_start();
$SelectS=$_POST["period"];
$Scheck_in=$_POST["curDate"];
$Scheck_out=$_POST["curDate1"];
$SindexDate=$_POST["indexDate"];
//echo ("<script> alert('$SindexDate');</script>");
$con= mysqli_connect("localhost", "root", "", "hotel");
$sql="select * from booking_log where check_in_date >= '$Scheck_in'";
$res=mysqli_query($con,$sql);
$num_math = mysqli_num_rows($res);

$sss=array();
$i=0;
while($row=mysqli_fetch_array($res)){
  $sss[$i]=$row["check_in_date"];
  $i++;
  if($i==$num_math)
  break;
};

$_SESSION["date"]=serialize($sss);

echo ("<script> location.href='../../FrontExample/mypage/reservationcheck.php?rownumber=$num_math'</script>");
?>
