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
            $conn = mysqli_connect("localhost", "jointaxi", "1234","joindb");
            echo "board_no : " . $board_no . "<br>";
            echo "board_pw : " . $board_pw . "<br>";
            //echo "board_start : " . $board_start . "<br>";
            //echo "board_destination : " . $board_destination . "<br>";
            //echo "board_time : " . $board_time . "<br>";
            //mysql 커넥션 객체 생성
            $query = "select * from board where board_no='$board_no';";
            $sql = mysqli_query($conn,$query);
            $result = mysqli_fetch_array($sql);
            echo $result["board_start"];
            echo $result["board_destination"];
            echo $result["board_time"];//커넥션 객체 생성 여부 확인
            if($conn) {
                echo "연결 성공<br>";
            } else {
                die("연결 실패 : " .mysqli_connect_error());
            }
            //board테이블에서 입력된 글 번호와, 글 비밀번호가 일치하는 행 삭제 쿼리
            $sqli = "DELETE FROM board WHERE board_no=".$board_no.";";
            //쿼리 실행 여부 확인
            if(mysqli_query($conn,$sqli)) {
                echo "삭제 성공: ".$result; //과제 작성시 에러메시지 출력하게 만들기
            } else {
                echo "삭제 실패: ".mysqli_error($conn);
            }

            mysqli_close($conn);
            //헤더함수를 이용하여 리스트 페이지로 리다이렉션
            header("Location: http://localhost/join%20taxi/join%20taxi/public_html/board_admin_list.php");
        ?>
    </body>
</html>