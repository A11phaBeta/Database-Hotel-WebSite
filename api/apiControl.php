<?php

if(strlen($_SERVER['QUERY_STRING'])){
  echo json_encode(array('result'=>'fail', 'cause'=>'UNDEFINED_QUERY_STRING'));
  exit;
}

switch($_SERVER['QUERY_STRING']){
  case 'login' :
    
    break;
  case 'signup' :
    break;
}



 ?>
