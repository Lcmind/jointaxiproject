<?php
include "db.php";

  //$userID = $_POST["userID"];
  $password = $_POST["password"];

//$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$sql = mq("UPDATE user set password='".$password."' WHERE userID= '".$_SESSION['uid']."'");
//$sql = "UPDATE user set password='".$password."' WHERE userID = '".$userID."'";

  echo "<script>alert(\"회원님의 비밀번호가 변경되었습니다.\"); location.href='login.php';</script>";
session_destroy();
?>
<!--?php
$conn = mysqli_connect("localhost", "jointaxi", "1234", "joindb");

            $userID = $_POST['userID'];
            $password = $_POST['password'];

            $sql =  "UPDATE user set password='".$password."' WHERE userID = '".$userID."'";

          //  if(!$pw1 || !$pw2){
          //      errMsg("비밀번호를 입력해주세요.");
          //  } elseif($pw1 != $pw2){
          //      errMsg("비밀번호가 일치하지 않습니다.");
            // if($password == $password['password']){
                echo "<script>alert('비밀번호가 변경되었습니다.');</script>";
            //}
            //$sql -> execute();
//header('location:login.php');

?-->
