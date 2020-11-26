<?php

function getRoomList(){

  include "./api/config/DBConfig.php";

  $stmt = $conn->prepare("select * from room_type");
  $stmt->execute();
  $res = $stmt->get_result();

  $jsonObj = array();
  $jsonObj['body'] = array();
  $count = 0;

  while($row = mysqli_fetch_assoc($res)){
    array_push($jsonObj['body'], array('room_type_id' => $row['room_type_id'], 'room_name' => $row['room_name'], 'base_price' => $row['base_price'], 'addfee_price' => $row['addfee_price'], 'description' => $row['description'], 'image_file' => $row['image_file']));
    $count++;
  }

  if($count == 0){
    $jsonObj['header'] = ['result' => 'fail', 'cause' => 'not_found'];
  }else{
    $jsonObj['header'] = ['result' => 'success', 'cause' => 'found', 'count' => $count];
  }

  return json_encode($jsonObj);
}

 ?>
