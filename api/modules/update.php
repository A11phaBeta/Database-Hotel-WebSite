<?php
$userpassword=$_POST["password"];
$username=$_POST["name"];
$usercontact=$_POST["contact"];

session_start();
$useremail=$_SESSION["useremail"];

$con = mysqli_connect("localhost", "root","","hotel");
$sql = "update user_information set user_password='$userpassword', user_name='$username', contact='$usercontact' where email='$useremail'";
$sql1 = "select * from user_information where email='$useremail'";

mysqli_query($con, $sql);
echo ("<script>
alert('수정이 완료되었습니다.')
location.href='../../FrontExample/mypage/membership.php'
</script>");
$res = mysqli_query($con, $sql1);
$row=mysqli_fetch_array($res);
$_SESSION["username"]=$row["user_name"];
$_SESSION["userpassword"]=$row["user_password"];
$_SESSION["usercontact"]=$row["contact"];
 ?>
