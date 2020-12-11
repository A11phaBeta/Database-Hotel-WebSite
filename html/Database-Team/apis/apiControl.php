<?php

header('Content-Type: text/html; charset=utf-8');
if(strlen($_SERVER['QUERY_STRING']) == 0){
  echo json_encode(array('result'=>'fail', 'cause'=>'UNDEFINED_QUERY_STRING'));
  exit;
}

$query = $_SERVER['QUERY_STRING'];
  $andPos = strpos($query, "&");

  if($andPos !== false){
    $query = substr($query, 0, $andPos);
  }
$convQuery = (strlen($query) == 0) ? "" : $query;

switch($convQuery){
  case 'login' :
    require_once('./modules/user.php');
    echo doLogin();
    break;
  case 'signup' :
    require_once('./modules/user.php');
    echo doSignUp();
    break;
  case 'getRoomList' :
    require_once('./modules/room.php');
    echo getRoomList();
    break;

  case 'book' :
    require_once('./modules/book.php');
    addBookingData();
    break;  

  case 'cancelBook' :
    require_once('./modules/book.php');
    echo cancelBook();
    break;

  case 'delUser' :
    require_once('./modules/user.php');
    echo delUser();
  break;

  case 'logout' :
    session_start();
    session_destroy();
    echo "<meta http-equiv='refresh' content='0.1; URL=../?'>";
    break;
}



 ?>
