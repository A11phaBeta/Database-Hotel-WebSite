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

function doSignUp(){
  $keys = array('name', 'contact', 'email', 'id', 'pw', 'address', 'birth', 'termID');

  for($i=0;$i<count($keys);++$i){
    if(!isset($_POST[$keys[$i]])){
      return json_encode(array('result'=>'fail', 'cause'=>'DISMATCHED_PARAMETER'));
    }
  }

  include "./config/DBConfig.php";

  $stmt = $conn->prepare("select count(*) from user_information where user_web_id=?");
  @$stmt->bind_param("s", $_POST[$keys[3]]);
  $stmt->execute();
  $res = $stmt->get_result();

  $row = mysqli_fetch_assoc($res);

  if($row['count(*)'] > 0){
    return json_encode(array('result'=>'success', 'cause'=>'ALREADY_EXIST_USER'));
  }

  $stmt = $conn->prepare("insert into user_information(user_name, contact, email, user_web_id, user_password, address, birth, time_stamp, comment, point, type_id, term_id, staff_id) VALUES(?,?,?,?,?,?,?,?,'',0,0,?,0)");
  @$stmt->bind_param("ssssssssi", trim($_POST[$keys[0]]),trim($_POST[$keys[1]]),trim($_POST[$keys[2]]),trim($_POST[$keys[3]]),trim($_POST[$keys[4]]),trim($_POST[$keys[5]]), trim($_POST[$keys[6]]),
  date("Y-m-d H:i:s"), $_POST[$keys[7]]);
  $stmt->execute();
    //WORK
  return json_encode(array('result'=>'success', 'cause'=>'ADD_USER'));


}


 ?>
