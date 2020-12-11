<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'alld');
define('DB_PASS', 'alp03100716');
define('DB_NAME', 'alld');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if(!$conn){
  echo json_encode(array('result'=>'fail', 'cause'=>'DATABASE_CONNECTION_ERROR')); exit;
}




 ?>
