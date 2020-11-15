<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'Hotel');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$conn){
  echo json_encode(array('result'=>'fail', 'cause'=>'DATABASE_CONNECTION_ERROR'));
}



 ?>
