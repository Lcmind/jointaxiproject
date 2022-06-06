<html>
    <body>
        <?php
            //board_add_form.php 페이지에서 넘어온 글 번호값 저장 및 출력
            $board_pw = $_POST["boardPw"];
            $board_title = $_POST["boardTitle"];
            $board_start = $_POST["boardstart"];
            $board_destination = $_POST["boarddestination"];
            $board_time = $_POST["boardtime"];
            $board_user = $_POST["boardUser"];

            //echo "board_pw : " . $board_pw . "<br>";
            //echo "board_title : " . $board_title . "<br>";
            //echo "board_start : " . $board_start . "<br>";
            //echo "board_destination : " . $board_destination . "<br>";
            //echo "board_time : " . $board_time . "<br>";
            //echo "board_user : " . $board_user . "<br>";
            //mysql 커넥션 객체 생성
              //function package(){
                function package($board_title,$board_start,$board_destination){
                  if($board_title ==""){
                    echo "<script>alert('제목을 하나 이상 체크 해야합니다.');history.back(-1);</script>";
                    return  false;
                  }
                  if($board_start ==""){
                    echo "<script>alert('출발지를 하나 이상 체크 하거나 입력 해야합니다.');history.back(-1);</script>";
                    return  false;
                  }
                  if($board_destination ==""){
                    echo "<script>alert('도착지를 하나 이상 체크 하거나 입력 해야합니다.');history.back(-1);</script>";
                    return  false;
                  }
                  return true;
                }

            /*function checkTitle($board_title) {
                if($board_title.length <6) {
                    echo "<script>alert('제목을 하나 이상 체크 해야합니다.');history.back(-1);</script>";
                    //$('#Title').val('').focus();
                    return false;
                }
                return true;
            }

            function checkboardstart($board_start) {
                if($board_start.length < 6) {
                    alert('출발지는 4글자 이상 입력해야 합니다.');
                    //$('#boardstart').val('').focus();
                    return false;
                }
                    return true;
            }
            function checkboarddestination($board_destination) {
                if($board_destination.length < 6) {
                    alert('도착지는 4글자 이상 입력해야 합니다.');
                    //$('#boarddestination').val('').focus();
                    return false;
                }
                    return true;
              }
return true;
}*/

            /*$boradtitlepattern ='/^[가-힣~!]{3,11}$/';
            $boardstartpattern='$board_start.length<4';
            $boarddestinationpattern='$board_destination.length <4';

            if(preg_match($boardtitlepattern, $board_title, $match)){
               echo "글 제목 : ".$board_title."<br>";
               var_dump($match);
               echo "<br>";
            } else {
               echo "<script>alert('글 제목이 선택되지 않았습니다.');</script>";
               return false;
            }
            if(preg_match($boardstartpattern, $board_start, $match)){
               echo "출발지 : ".$board_start."<br>";
               var_dump($match);
               echo "<br>";
            } else {
               echo "<script>alert('출발지는 4-16자 한글만 입력가능합니다.');history.back(-1);</script>";
               return false;
            }
            if(preg_match($boarddestinationpattern, $board_destination, $match)){
               echo "도착지 : ".$board_destination."<br>";
               var_dump($match);
               echo "<br>";
            } else {
               echo "<script>alert('목적지는 4-16자 한글만 입력가능합니다.');history.back(-1);</script>";
               return false;
            }
            return true;
}*/


$conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");

            if($board_time =='10분뒤'){
              $a="(DATE_ADD(NOW(), INTERVAL 550 MINUTE))";
              //$q=mysqli_query($conn,$a);
            } elseif($board_time =='20분뒤'){
              $a="(DATE_ADD(NOW(), INTERVAL 560 MINUTE))";
            //$q=mysqli_query($conn,$a);
          }  elseif($board_time =='30분뒤'){
              $a="(DATE_ADD(NOW(), INTERVAL 570 MINUTE))";
            //  $q=mysqli_query($conn,$a);
            } elseif($board_time =='40분뒤'){
              $a="(DATE_ADD(NOW(), INTERVAL 580 MINUTE))";
            //  $q=mysqli_query($conn,$a);
            } elseif($board_time =='50분뒤'){
              $a="(DATE_ADD(NOW(), INTERVAL 590 MINUTE))";
            //  $q=mysqli_query($conn,$a);
            }
            //커넥션 객체 생성 여부 확인
            /*if($conn) {
                echo "연결 성공<br>";
            } else {
                die("연결 실패 : " .mysqli_error());
            }*/
            //board 테이블에 입력된 값을 1행에 넣고 board_date 필드에는 현재 시간을 입력하는 쿼리
            if(package($board_title,$board_start,$board_destination)==true){
              $sql = "INSERT INTO board (board_title, board_start,board_destination,board_time, board_user, board_date,boardPw) values ('".$board_title."','".$board_start."','".$board_destination."',$a,'".$board_user."',now(),'".$board_pw."')";
               mysqli_query($conn,$sql);
           echo "
                <script type=\"text/javascript\">
                  alert(\"게시물이 등록되었습니다.\");
                    location.href = \"board_add_action_ok.php\";
                </script>
            ";
          }else{
            return false;
          }

            // 쿼리 실행 여부 확인
            /*if($result) {
                echo "입력 성공: ".$result; //과제 작성시 에러메시지 출력하게 만들기
            } else {
                echo "입력 실패: ".mysqli_error($conn);
            }*/
            mysqli_close($conn);
            //헤더함수를 이용하여 리스트 페이지로 리다이렉션

             //헤더 함수를 이용해서 리다이렉션 시킬 수 있다.
        ?>
    </body>
</html>
