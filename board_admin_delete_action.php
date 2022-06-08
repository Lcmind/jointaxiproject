<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>board_delete.php</title>
    </head>
    <body>
        <h1>board_delete_action.php</h1>
        <?php
        if($idx == 1){
            }else{echo "
                <script type=\"text/javascript\">
                    alert(\"관리자가 아닙니다.\");
                    location.href = \"index.php\";
                </script>
            ";
        };
            //board_delete_form.php 페이지에서 넘어온 글 번호값 저장 및 출력
            $board_no = $_POST["board_no"];
            $board_pw = $_POST["board_pw"];
            //$board_start = $_POST["board_start"];
            //$board_destination = $_POST["board_destination"];
            //$board_time = $_POST["board_time"];
            $conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
            echo "board_no : " . $board_no . "<br>";
            echo "board_pw : " . $board_pw . "<br>";
            //echo "board_start : " . $board_start . "<br>";
            //echo "board_destination : " . $board_destination . "<br>";
            //echo "board_time : " . $board_time . "<br>";
            //mysql 커넥션 객체 생성
            $query = "select * from board where board_no='$board_no';";
            $sql = mysqli_query($conn,$query);
            $result = mysqli_fetch_array($sql);
            $sql1 = "DELETE FROM board WHERE board_no=".$board_no.";";
            $sql2 = "UPDATE user SET userJoin=NULL WHERE userJoin='$board_no'";
           
              echo "
                  <script type=\"text/javascript\">
                      alert(\"삭제되었습니다.\");
                      location.href = \"board_list.php\";
                  </script>
              ";
              mysqli_query($conn,$sql1);   //과제 작성시 에러메시지 출력하게 만들기
              mysqli_query($conn,$sql2);

            mysqli_close($conn);
            //헤더함수를 이용하여 리스트 페이지로 리다이렉션
            header("Location: board_admin_list.php");
        ?>
    </body>
</html>
