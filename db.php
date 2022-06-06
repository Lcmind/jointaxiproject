<?php
 session_start();
 header('Content-Type: text/html; charset=UTF-8');

 $db = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
 $db->set_charset("utf8");

 function mq($sql){
   global $db;
   return $db->query($sql);
 }

 ?>
