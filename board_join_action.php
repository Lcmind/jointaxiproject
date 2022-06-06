<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>board_join.php</title>
    </head>
    <body>
        <?php
            session_start();

            $userID = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
            //board_update_form.php에서 POST 방식으로 넘어온 값 저장 및 출력
            $board_no = $_GET["board_no"];
            $userJoin = $_GET["userJoin"];
            $conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
            /*echo "board_no : " . $board_no . "<br>";
            echo "board_title : " . $board_title . "<br>";
            echo "board_start : " . $board_start . "<br>";
            echo "board_destination : " . $board_destination . "<br>";
            echo "board_time : " . $board_time . "<br>";
         echo "userJoin : " . $userJoin . "<br>";
*/

            //커넥션 객체 생성 및 연결 여부 확인하기

            //board 테이블의 board_no값이 일치하는 행의 board_title,board_content 값을 입력한 값으로,board_date값을 현재 시간으로 수정하는 쿼리

            //수정 작업의 성공 여부 확인하기
            $sql2="SELECT board_attend from board where board_no='$board_no';";
             $attendCheck = mysqli_query($conn,$sql2);
             $attendCheckok = mysqli_fetch_array($attendCheck);
             //커넥션 객체 생성 및 연결 여부 확인하기
             if($attendCheckok['board_attend']==4){
                 echo "
                 <script type=\"text/javascript\">
                     alert(\"정원 초과입니다.\");
                     location.href = \"board_list.php\";
                 </script>
             ";
             }elseif(empty($userJoin)) {
               $sql = "UPDATE user SET userJoin='".$board_no."' WHERE userID=".$userID."";
               $result = mysqli_query($conn,$sql);
               $countJoin = "(SELECT count(userJoin) from user where userJoin='$board_no')";
               $sql1 = "UPDATE board SET board_attend=$countJoin WHERE board_no='$board_no';";
               $result1 = mysqli_query($conn,$sql1);
               echo "
                   <script type=\"text/javascript\">
                       alert(\"JOIN TAXI~~!!\");
                       location.href = \"board_list.php\";
                   </script>
               ";
             } else {
               echo "
                   <script type=\"text/javascript\">
                       alert(\"이미 다른 택시에 탑승 예정인 멤버입니다.\");
                       location.href = \"board_list.php\";
                   </script>
               ";
          }

            //헤더를 이용한 리다이렉션 구현

        ?>
    </body>
</html>
