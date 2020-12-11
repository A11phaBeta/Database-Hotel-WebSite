<?php
@define('DB_HOST', 'localhost');
@define('DB_USER', 'alld');
@define('DB_PASS', 'alp03100716');
@define('DB_NAME', 'alld');


$conn = mysqli_connect(DB_HOST, 'alld', DB_PASS, DB_NAME);


if(!$conn){
  echo json_encode(array('result'=>'fail', 'cause'=>'DATABASE_CONNECTION_ERROR')); exit;
}

$stmt = $conn->prepare("set session character_set_connection=utf8;");
$stmt->execute();

$stmt = $conn->prepare("set session character_set_results=utf8;");
$stmt->execute();

$stmt = $conn->prepare("set session character_set_client=utf8;");
$stmt->execute();





 ?>
