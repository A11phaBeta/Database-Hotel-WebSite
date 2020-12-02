<?php
  $email=$_POST["email"];
  $password=$_POST["password"];

  $con = mysqli_connect("localhost", "root", "", "hotel");

  $sql = "select * from user_information where email='$email'";
  $res = mysqli_query($con, $sql);
  $num_math = mysqli_num_rows($res);




  $row=mysqli_fetch_array($res);
  $db_pass=$row["user_password"];
  $db_name=$row["user_name"];

  if($password != $db_pass)
  {
    echo ("<script> alert('틀림')
                    history.go(-1)
                    </script>
                    ");
                    exit;
  }
  else {
    session_start();
    $_SESSION["username"]=$row["user_name"];
    $_SESSION["userpassword"]=$row["user_password"];
    $_SESSION["useremail"]=$row["email"];
    $_SESSION["usercontact"]=$row["contact"];
    $_SESSION["usergender"]=$row["gender"];

    echo ("
          <script>
            location.href='../../FrontExample/roomList.php'
            </script>
            ");
  }

  ?>
