<?php
    $con = mysqli_connect("localhost", "jointaxi", "1234", "joindb") or die("MySQL 접속 실패!!");

    //$idx = $_POST["idx"];
    $userID = $_POST["userID"];
    $password = $_POST["password"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $phoneNum = $_POST["phoneNum"];
    $checkStr = $_POST["checkStr"];
  $mDate = date("Y-m-j H:j:s");

  $query = "SELECT userID FROM user where userID='{$userID}'";
   $result = $con->query($query);
   $num = $result->num_rows;
   if($num > 0) { echo "<script>alert('학번이 중복됩니다.');history.back(-1);</script>"; exit; }
   else {
     $sql =" INSERT INTO user(userID, password, userName, phoneNum, email, checkStr, mDate)VALUES('".$userID."','".$password."','".$userName."','".$phoneNum."','".$email."','".$checkStr."','".$mDate."');";


  $ret = mysqli_query($con, $sql);

  if($ret) {
    echo "
        <script type=\"text/javascript\">
          alert(\"Join 해주셔서 감사합니다.\");
            location.href = \"login.php\";
        </script>
    ";
  }

  else {
  echo "회원가입 실패!!!"."<BR>";
  echo "관리자한테 연락바랍니다.";
  }
  mysqli_close($con);
}


?>
