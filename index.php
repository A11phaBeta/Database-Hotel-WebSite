<?php


$query = $_SERVER['QUERY_STRING'];
  $andPos = strpos($query, "&");

  if($andPos !== false){
    $query = substr($query, 0, $andPos);
  }
$convQuery = (strlen($query) == 0) ? "" : $query;




switch($convQuery){
  case 'login' :
    require_once('./modules/login.php');
    break;
  case 'roomList' :
    require_once('./modules/roomList.php');
    break;
  default :
    require_once('./modules/main.php');
    break;

}


 ?>
