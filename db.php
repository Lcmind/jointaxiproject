<?php
 session_start();
 header('Content-Type: text/html; charset=UTF-8');

 $db = new mysqli("localhost", "jointaxi", "1234", "joindb");
 $db->set_charset("utf8");

 function mq($sql){
   global $db;
   return $db->query($sql);
 }

 ?>
