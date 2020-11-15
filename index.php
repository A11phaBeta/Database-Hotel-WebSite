<?php

switch($_SERVER["QUERY_STRING"]){
  case 'login' :
    require_once('./modules/login.php');
    break;
  default :
    
}


 ?>
