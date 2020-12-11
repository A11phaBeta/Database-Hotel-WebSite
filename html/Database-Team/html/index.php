<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);

ini_set("display_errors", 1);

$query = $_SERVER['QUERY_STRING'];
  $andPos = strpos($query, "&");

  if($andPos !== false){
    $query = substr($query, 0, $andPos);
  }
$convQuery = (strlen($query) == 0) ? "main" : $query;

$fileDIR = "./modules/pages/".$convQuery.".php";

if(file_exists($fileDIR)){
    require_once($fileDIR);
}else{
    echo "<script>alert('404 Not Found');</script>";
}

 ?>
