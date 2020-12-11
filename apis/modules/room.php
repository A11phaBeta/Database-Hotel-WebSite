<?php

function getRoomList(){

    include "./apis/config/DBConfig.php";

  $stmt = $conn->prepare("select * from room_type");
  $stmt->execute();
  $res = $stmt->get_result();

  $jsonObj = array();
  $jsonObj['body'] = array();
  $count = 0;

  while($row = mysqli_fetch_assoc($res)){

    $stmt2 = $conn->prepare("select count(*) from booking_log where ((? between checkin_date and checkout_date) or (? between checkin_date and checkout_date)) and room_type=?");
    @$stmt2->bind_param('ssi', $_SESSION['checkin'], $_SESSION['checkout'], $row['room_type_id']);
    $stmt2->execute();
    $res2 = $stmt2->get_result();

    $row2 = mysqli_fetch_assoc($res2);

    
    if($row2['count(*)'] == 0){
        $isBook = 'false';
        
    }else{
        $isBook = 'true';
    }

    array_push($jsonObj['body'], array('room_type_id' => $row['room_type_id'], 'room_name' => $row['room_name'], 'base_price' => $row['base_price'], 'addfee_price' => $row['addfee_price'], 'description' => $row['description'], 'image_file' => $row['image_file'], "isbook" => $isBook, "count" => $row2['count(*)']));
    $count++;
  }

  if($count == 0){
    $jsonObj['header'] = ['result' => 'fail', 'cause' => 'not_found'];
  }else{
    $jsonObj['header'] = ['result' => 'success', 'cause' => 'found', 'count' => $count];
  }

  return json_encode($jsonObj);
}

function getRoomInfo($room_type_id){
    include "./apis/config/DBConfig.php";

    $stmt = $conn->prepare("select * from room_type where room_type_id=?");
    @$stmt->bind_param("i", $room_type_id);
    $stmt->execute();
    $res = $stmt->get_result();

    $row = mysqli_fetch_assoc($res);

    $jsonObj = array('room_type_id' => $row['room_type_id'], 'room_name' => $row['room_name'], 'base_people' => $row['base_people'],'max_people' => $row['max_people'],'base_price' => $row['base_price'], 'addfee_price' => $row['addfee_price'], 'description' => $row['description'], 'wifi' => $row['wifi'], 'minibar' => $row['minibar'], 'morning_meal' => $row['morning_meal'],'image_file' => $row['image_file']);

    return json_encode($jsonObj);
}

 ?>
