<?php


  $board_no=$_GET["board_no"];
  session_start();
  $userJoin =$_GET["userJoin"];
  $conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
  //$sql1 ="SELECT board_no from board where boardPw = '$userID';";
  //$board_number=mysqli_query($conn,$sql1);
  //$board_no = mysqli_fetch_array($board_number);


  //$ss="SELECT userJoin from user;";
//  $sss=mysqli_query($conn,$ss);
  //$ssss=mysqli_fetch_array($sss);
  //echo $boardPwresult;
  //$sqlCount = "SELECT count(userjoin) FROM user where userjoin='$boardCount[board_no]';";
  //$resultCount = mysqli_query($conn,$sqlCount);

  //foreach ($ssss as $userJoinarray['userJoin']) {
  //  echo $userJoinarray['userJoin'] ;

  $sql = "SELECT userName, phoneNum FROM user where userJoin ='$board_no';";
  $result = mysqli_query($conn,$sql);
if($userJoin==$board_no){
?>
<!DOCTYPE html PUBLIC>
<html>
<head>

<meta charset="utf-8" />
  <title>With Join Taxi</title>
</head>
<body style="text-align: center;">
<h2>😀같이가요😀</h2>
   <table border="1" bordercolor="black" style="border-collapse:collapse; text-align:center;" width="400" align="center" text-align="center" class="table table-bordered ">
   <tr>
        <td style="text-align:center;">이름</td>
        <td style="text-align:center;">전화번호</td>
   </tr>
    <?php

        //반복문을 이용하여 result 변수에 담긴 값을 row변수에 계속 담아서 row변수의 값을 테이블에 출력한다.
        while($row = mysqli_fetch_array($result)){
   ?>
        <tr>
            <td>
                <?php
                    echo $row['userName'];
                ?>
            </td>
         <td>
            <?php
               echo $row['phoneNum'];
            ?>
         </td>
         <?php
       }
       ?>
</table>
<p>
</p>

  <button type="button" class="btn" style="center;"onclick="self.close();">닫기</button>

<?php
}else{
  echo "<script>alert('참여자만 볼 수 있습니다.');self.close();</script>";
}

?>
</html>
