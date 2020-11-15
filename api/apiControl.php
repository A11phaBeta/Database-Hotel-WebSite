<?php

if(strlen($_SERVER['QUERY_STRING']) == 0){
  echo json_encode(array('result'=>'fail', 'cause'=>'UNDEFINED_QUERY_STRING'));
  exit;
}

switch($_SERVER['QUERY_STRING']){
  case 'login' :
    require_once('./modules/user.php');
    echo doLogin();
    break;
  case 'signup' :
    require_once('./modules/user.php');
    echo doSignUp();
    break;
}



 ?>
