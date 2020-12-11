<?php

function addBookingData(){
    include "./config/DBConfig.php";

    session_start();
    $date = date("Y-m-d");
    $userID = 0;

    if(!isset($_SESSION['user_name'])){
        $stmt = $conn->prepare("insert into user_information(user_name,contact,email,user_web_id,user_password, address, birth, time_stamp, comment, point, type_id, term_id, staff_id) values(?,?,?,?,?,'','0000-00-00',?,'',0,1,1,0)");
        @$stmt->bind_param("ssssss", $_POST['userName'], $_POST['userPhone'], $_POST['userEmail'], $_POST['userEmail'], $_POST['userPhone'], $date);
        $stmt->execute();

        $stmt2 = $conn->prepare("select user_id from user_information where user_web_id=? and user_password=?");
        @$stmt2->bind_param("ss", $_POST['userEmail'], $_POST['userPhone']);
        $stmt2->execute();
        $res = $stmt2->get_result();
        $row = mysqli_fetch_assoc($res);
        $userID = $row['user_id'];

    }
    else{
        $userID = $_SESSION['user_id'];
    }

    $stmt = $conn->prepare("insert into pay_log(method_type,escrow,amount,tax_free,vat,language,buyer_id) values(?,0,?,0,?,'kr',?)");
    @$stmt->bind_param("iiii", $_POST['payment'], $_POST['price'], $_POST['vat'], $userID);
    $stmt->execute();

    $stmt = $conn->prepare("select pay_log_id from pay_log where buyer_id=? order by pay_log_id desc");
    @$stmt->bind_param("i", $userID);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = mysqli_fetch_assoc($res);

    $stmt = $conn->prepare("insert into booking_log(user_id, checkin_date, checkout_date, room_type, adult_number, child_number, pay_log_id, comment, charge_staff_id, timestamp) values(?,?,?,?,?,?,?,?,0,?)");
    @$stmt->bind_param("issiiiiss", $userID, $_POST['checkin'], $_POST['checkout'], $_POST['room_type'], $_POST['adult'], $_POST['child'], $row['pay_log_id'], $_POST['comment'], $date);
    $stmt->execute();
    if(isset($_SESSION['user_name'])){
        echo "<script>alert('예약이 완료되었습니다. 예약내역은 마이페이지에서 확인하실 수 있습니다.'); location.href='../?';</script>";
    }else{
        echo "<script>alert('예약이 완료되었습니다. 예약내역은 이메일(아이디) / 전화번호(비밀번호)로 로그인 하신 후 마이페이지에서 확인하실 수 있습니다.'); location.href='../?';</script>";
    }
}

function getBookingLog($userID, $startDate, $finishDate){
    include "../../../apis/config/DBConfig.php";

  $stmt = $conn->prepare("select bl.log_id as log_id, bl.checkin_date as checkin_date, bl.checkout_date as checkout_date, bl.adult_number, bl.child_number, rt.room_name as room_name, bl.timestamp from booking_log bl, room_type rt where bl.user_id=? and bl.room_type=rt.room_type_id and ((bl.checkin_date between ? and ?) or (bl.checkout_date between ? and ?))");
  @$stmt->bind_param("issss", $userID, $startDate, $finishDate, $startDate, $finishDate);
  $stmt->execute();

  $res = $stmt->get_result();

  $jsonObj = array();
  while($row = mysqli_fetch_assoc($res)){
    array_push($jsonObj, array('log_id' => $row['log_id'], 'checkin_date' => $row['checkin_date'], 'checkout_date' => $row['checkout_date'], 'adult' => $row['adult_number'], 'child' => $row['child_number'],'room_name' => $row['room_name'], 'timestamp' => $row['timestamp']));
  }

  return json_encode($jsonObj);
}

function getAllBookingLog(){
  include "../../../../apis/config/DBConfig.php";

  $date = date("Y-m-d");

  $stmt = $conn->prepare("select bl.log_id as log_id, bl.checkin_date as checkin_date, bl.checkout_date as checkout_date, bl.adult_number, bl.child_number, rt.room_name as room_name, ui.user_name, bl.timestamp from booking_log bl, room_type rt, user_information ui where ui.user_id=bl.user_id and bl.room_type=rt.room_type_id");

  $stmt->execute();

  $res = $stmt->get_result();

  $jsonObj = array();
  while($row = mysqli_fetch_assoc($res)){
  array_push($jsonObj, array('log_id' => $row['log_id'], 'name'=>$row['user_name'], 'checkin_date' => $row['checkin_date'], 'checkout_date' => $row['checkout_date'], 'adult' => $row['adult_number'], 'child' => $row['child_number'],'room_name' => $row['room_name'], 'timestamp' => $row['timestamp']));
  }

  return json_encode($jsonObj);
}
function getBookingLog2(){
    include "../../../../apis/config/DBConfig.php";

    $date = date("Y-m-d");

  $stmt = $conn->prepare("select bl.log_id as log_id, bl.checkin_date as checkin_date, bl.checkout_date as checkout_date, bl.adult_number, bl.child_number, rt.room_name as room_name, ui.user_name, bl.timestamp from booking_log bl, room_type rt, user_information ui where ui.user_id=bl.user_id and bl.room_type=rt.room_type_id and ((bl.checkin_date between ? and ?))");
  echo $date;
  @$stmt->bind_param("ss", $date, $date);
  $stmt->execute();

  $res = $stmt->get_result();

  $jsonObj = array();
  while($row = mysqli_fetch_assoc($res)){
    array_push($jsonObj, array('log_id' => $row['log_id'], 'name'=>$row['user_name'], 'checkin_date' => $row['checkin_date'], 'checkout_date' => $row['checkout_date'], 'adult' => $row['adult_number'], 'child' => $row['child_number'],'room_name' => $row['room_name'], 'timestamp' => $row['timestamp']));
  }

  return json_encode($jsonObj);
}


function cancelBook(){
    include "./config/DBConfig.php";

    $stmt = $conn->prepare("delete from booking_log where log_id=?");
    @$stmt->bind_param("i", $_GET['log_id']);
    $stmt->execute();

    return "<script>alert('예약 취소가 완료되었습니다. 환불은 영업일 기준으로 14일 이내 소요됩니다.');history.back();</script>";

}

?>
