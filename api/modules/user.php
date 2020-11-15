<?php

function doLogin(){
  if(!isset($_POST['id']) || !isset($_POST['pw'])){
    return json_encode(array('result'=>'fail', 'cause'=>'DISMATCHED_PARAMETER'));
  }

  include "./config/DBConfig.php";

  $stmt = $conn->prepare("select count(*) from user_information where user_web_id=? and user_password=?");
  @$stmt->bind_param("ss", trim($_POST['id']), trim($_POST['pw']));
  $stmt->execute();
  $res = $stmt->get_result();

  $row = mysqli_fetch_assoc($res);

  if($row['count(*)'] == 0){
    return json_encode(array('result'=>'fail', 'cause'=>'NON_EXIST_USER'));
  }else{
    return json_encode(array('result'=>'success', 'cause'=>'EXIST_USER'));
  }
}


 ?>
