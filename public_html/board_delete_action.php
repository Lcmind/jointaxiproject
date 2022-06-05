<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
            session_start();
            $userID = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
            $board_attend = isset($_SESSION["board_attend"])? $_SESSION["board_attend"]:"";
            //board_delete_form.php 페이지에서 넘어온 글 번호값 저장 및 출력
            $board_no = $_POST["board_no"];
            $board_pw = $_POST["board_pw"];

            $conn = mysqli_connect("localhost", "jointaxi", "1234","joindb");


            $query = "select * from board where board_no='$board_no';";
            $sql = mysqli_query($conn,$query);
            $result = mysqli_fetch_array($sql);
            //echo $result["board_start"];
            //echo $result["board_destination"];
            //echo $result["board_time"];//커넥션 객체 생성 여부 확인

            //board테이블에서 입력된 글 번호와, 글 비밀번호가 일치하는 행 삭제 쿼리
            //쿼리 실행 여부 확인
            if($result["board_attend"]>1){
            echo "
                <script type=\"text/javascript\">
                    alert(\"참여자가 있습니다!!\");
                    location.href = \"board_list.php\";
                </script>
            ";
          }else{
            $sql1 = "DELETE FROM board WHERE board_no=".$board_no.";";
            $sql2 = "UPDATE user SET userJoin=NULL WHERE userID='$userID'";
            if($userID==$board_pw) {
              echo "
                  <script type=\"text/javascript\">
                      alert(\"삭제되었습니다.\");
                      location.href = \"board_list.php\";
                  </script>
              ";
              mysqli_query($conn,$sql1);   //과제 작성시 에러메시지 출력하게 만들기
              mysqli_query($conn,$sql2);
            } else {
                echo "삭제 실패: ".mysqli_error($conn);
            }
}
        ?>
    </body>
</html>
