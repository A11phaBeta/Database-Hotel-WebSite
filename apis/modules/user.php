<?php

function doLogin(){
  if(!isset($_POST['id']) || !isset($_POST['pw'])){
    return json_encode(array('result'=>'fail', 'cause'=>'DISMATCHED_PARAMETER'));
  }

  include "./config/DBConfig.php";

  $stmt = $conn->prepare("select count(*), user_id, user_name, staff_id from user_information where user_web_id=? and user_password=?");
  @$stmt->bind_param("ss", trim($_POST['id']), trim($_POST['pw']));
  $stmt->execute();
  $res = $stmt->get_result();

  $row = mysqli_fetch_assoc($res);

  /*if($row['count(*)'] == 0){
    return json_encode(array('result'=>'fail', 'cause'=>'NON_EXIST_USER'));
  }else{
    return json_encode(array('result'=>'success', 'cause'=>'EXIST_USER'));
  }*/

  if($row['count(*)'] == 0){
    echo "<script>alert('아이디 또는 비밀번호를 확인해주세요!');</script>";
    echo "<meta http-equiv='refresh' content='0.1; URL=../../?".$_POST['Return']."'>";
  }else{

    echo "<script>alert('".$row['user_name']." 회원님 환영합니다!');</script>";
    if(!isset($_SESSION)){
      session_start();
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_name'] = $row['user_name'];
      $_SESSION['staff_id'] = $row['staff_id'];
    }

    echo "<meta http-equiv='refresh' content='0.1; URL=../../?'>";
  }

  
}

function doSignUp(){
  $keys = array('name', 'contact', 'email', 'id', 'pw', 'repw','address', 'birth');

  for($i=0;$i<count($keys);++$i){
    if(!isset($_POST[$keys[$i]])){
        return "<script>alert('잘못된 접근입니다!');</script><meta http-equiv='refresh' content='0.1; URL=../../?'>";
    }
  }

  include "./config/DBConfig.php";

  $stmt = $conn->prepare("select count(*) from user_information where user_web_id=?");
  @$stmt->bind_param("s", $_POST[$keys[3]]);
  $stmt->execute();
  $res = $stmt->get_result();

  $row = mysqli_fetch_assoc($res);

  if($row['count(*)'] > 0){
    return "<script>alert('중복된 아이디가 존재합니다!');history.back();</script>";
  }

  if(strcmp($_POST[$keys[4]], $_POST[$keys[5]])){
    return "<script>alert('비밀번호가 서로 일치하지 않습니다!');history.back();</script>";
  }

  $timeStamp = date("Y-m-d H:i:s");
  $stmt = $conn->prepare("insert into user_information(user_name, contact, email, user_web_id, user_password, address, birth, time_stamp, comment, point, type_id, term_id, staff_id) VALUES(?,?,?,?,?,?,?,?,'',0,0,1,0)");
  @$stmt->bind_param("ssssssss", trim($_POST[$keys[0]]),trim($_POST[$keys[1]]),trim($_POST[$keys[2]]),trim($_POST[$keys[3]]),trim($_POST[$keys[4]]),trim($_POST[$keys[6]]),trim($_POST[$keys[7]]),date("Y-m-d H:i:s"));
  $stmt->execute();
    //WORK
    return "<script>alert('성공적으로 회원가입 되었습니다!');</script><meta http-equiv='refresh' content='0.1; URL=../../?'>";

}


function getUserInfo($userID){
  include "./apis/config/DBConfig.php";

  $stmt = $conn->prepare("select count(*), user_id, user_name,email,contact from user_information where user_id=?");
  @$stmt->bind_param("s", $userID);
  $stmt->execute();
  $res = $stmt->get_result();
  $row = mysqli_fetch_assoc($res);
  
  if($row['count(*)'] > 0){
    $jsonObj = ['result' => 'found', 'user_id' => $row['user_id'], 'user_name' => $row['user_name'], 'email' => $row['email'], 'contact' => $row['contact']];
    return json_encode($jsonObj);
  }else{
    $jsonObj = ['result' => 'not_found'];
    return json_encode($jsonObj);
  }
}

function getUserInfo2(){
  include "../../../../apis/config/DBConfig.php";

  $stmt = $conn->prepare("select * from user_information");
  $stmt->execute();
  $res = $stmt->get_result();
  

  $jsonObj = array();
  
  while($row = mysqli_fetch_assoc($res)){
    array_push($jsonObj, array('result' => 'found', 'user_id' => $row['user_id'], 'user_name' => $row['user_name'], 'email' => $row['email'], 'contact' => $row['contact'], 'timestamp' => $row['time_stamp'], 'type_id' => $row['type_id']));
  }

  return json_encode($jsonObj);
}

function getStaffInfo2(){
  include "../../../../apis/config/DBConfig.php";

  $stmt = $conn->prepare("select si.staff_id, si.staff_name, si.position, dt.department_name from staff_information si, department dt where si.department_id = dt.department_id");
  $stmt->execute();
  $res = $stmt->get_result();
  

  $jsonObj = array();
  
  while($row = mysqli_fetch_assoc($res)){
    array_push($jsonObj, array('staff_id' => $row['staff_id'], 'staff_name' => $row['staff_name'], 'position' => $row['position'], 'department_name' => $row['department_name']));
  }

  return json_encode($jsonObj);
}



function getMembershipInfo($userID){
  include "../../../apis/config/DBConfig.php";

  $stmt = $conn->prepare("select ui.user_id as user_id, ui.user_name as user_name, ui.point as point, count(*) as bookCnt, sum(datediff(bl.checkout_date, bl.checkin_date)) as sleepDays, sum(pl.amount) as amount, sum(pl.vat) as vat from user_information ui, booking_log bl, pay_log pl where ui.user_id=? and ui.user_id=bl.user_id and bl.pay_log_id=pl.pay_log_id");
  @$stmt->bind_param("i", $userID);
  $stmt->execute();

  $res = $stmt->get_result();
  $row = mysqli_fetch_assoc($res);

  $jsonObj = array();
  $jsonObj['user_info'] = ['user_id' =>$row['user_id'], 'user_name' => $row['user_name'], 'point' => $row['point']];
  $jsonObj['book_info'] = ['bookCnt' => $row['bookCnt'], 'sleepDays'=>$row['sleepDays'], 'totalAmount' => $row['amount'], 'totalVAT' => $row['vat']];

  return json_encode($jsonObj);
}

function delUser(){
  include "./config/DBConfig.php";

  $stmt = $conn->prepare("delete from user_information where user_id=?");
  @$stmt->bind_param("i", $_GET['userID']);
  $stmt->execute();

  return "<script>alert('정상적으로 사용자 정보가 삭제되었습니다.');location.href='../modules/pages/management/dist/manage_user.php';</script>";
}

 ?>
