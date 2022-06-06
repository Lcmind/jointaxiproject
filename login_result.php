
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>
   <?php
   session_start();
   $conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");

      //login.php에서 입력받은 id, password
      $userID = $_POST["userID"];
      $password = $_POST["password"];

      $sql = "SELECT * from user where userID='$userID'and password='$password';";

      $result = $conn->query($sql);
      $row = $result->fetch_array(MYSQLI_ASSOC);

      //결과가 존재하면 세션 생성
      if ($row != null) {
         $_SESSION['userID'] = $row['userID'];
         $_SESSION['userName'] = $row['userName'];
         $_SESSION['idx'] = $row['idx'];
         echo "<script type=\"text/javascript\">alert(\"".$_SESSION["userName"]."님 환영합니다.\");</script>";
         echo "<script>location.replace('index.php');</script>";
         exit;
      }

      //결과가 존재하지 않으면 로그인 실패
      if($row == null){
         echo "<script>alert('ID 혹은 비밀번호를 확인하세요.')</script>";
         echo "<script>location.replace('login.php');</script>";
         exit;
      }
      ?>
   </body>
