<?php
   include "db.php";
   $userID = $_POST['userID'];
   $checkStr = $_POST['checkStr'];
$sql = mq("SELECT * from user where userID='{$userID}' and checkStr='{$checkStr}'");
$result = $sql->fetch_array();
//if($result["userID"] == $userID && $result["checkStr"] == $checkStr){
 //$_SESSION['uid'] = $userID;

 if($result["userID"] == $userID && $result["checkStr"] == $checkStr) {
   $_SESSION['uid'] = $userID;
   echo "<script>alert('회원님의 비밀번호를 변경합니다.'); location.href='changePw.php';</script>";
 }

else{
   echo "<script>alert('ID 또는 본인확인문구가 일치하지 않습니다.'); history.back();</script>";
}
?>
