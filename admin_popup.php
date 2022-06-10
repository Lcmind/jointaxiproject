
<?php

$conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
$board_no = $_GET["board_no"];
$board_no1 = "SELECT board_no from board where board_no=$board_no;";
$boardnoresult= mysqli_query($conn,$board_no1);
$boardCount = mysqli_fetch_array($boardnoresult);
session_start();
$idx =isset($_SESSION["idx"])? $_SESSION["idx"]:"";
if($idx == 1){

    }else{echo "
        <script type=\"text/javascript\">
            alert(\"관리자가 아닙니다.\");
            location.href = \"main.php\";
        </script>
    ";
};
//echo $boardPwresult;
//$sqlCount = "SELECT count(userjoin) FROM user where userjoin='$boardCount[board_no]';";
//  $resultCount = mysqli_query($conn,$sqlCount);

$sql = "SELECT userID, userName, phoneNum FROM user where userjoin =$board_no";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html PUBLIC>
<html>
<head>

<meta charset="utf-8" />
<title>참여자 명단</title>
</head>
<body style="text-align: center;">
<h2>참여자 명단</h2>
 <table border="1" bordercolor="black" style="border-collapse:collapse; text-align:center;" width="400" align="center" text-align="center" class="table table-bordered ">
 <tr>
      <td style="text-align:center;">학번</td>
      <td style="text-align:center;">이름</td>
      <td style="text-align:center;">전화번호</td>
 </tr>

  <?php
      //반복문을 이용하여 result 변수에 담긴 값을 row변수에 계속 담아서 row변수의 값을 테이블에 출력한다.
      while($row = $result->fetch_array()){
 ?>
      <tr>
        <td>
            <?php
                //echo $board_no;
                echo $row["userID"];
            ?>
        </td>
          <td>
              <?php
                  echo $row["userName"];
              ?>
          </td>
       <td>
          <?php
             echo $row["phoneNum"];
          ?>
       </td><?php
}?>
</table>
<p>
</p>

<button type="button" class="btn" style="center;"onclick="history.back();">이전</button>


</html>