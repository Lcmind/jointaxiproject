<!DOCTYPE html>
<?php
    session_start();

    $userID = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
    // echo "Session ID : ".$userID." / Name : ".$userName;
?>
<html>
    <head>
    </head>
    <body>
        <?php
            //board_add_form.php 페이지에서 넘어온 글 번호값 저장 및 출력

            $conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
            //커넥션 객체 생성 여부 확인
            //board 테이블에 입력된 값을 1행에 넣고 board_date 필드에는 현재 시간을 입력하는 쿼리
            $sql1 = "SELECT board_no from board where boardPw='$userID';";
            $board_no = mysqli_query($conn,$sql1);
            $userJoin = mysqli_fetch_array($board_no);
            $sql = "UPDATE user set userJoin='$userJoin[board_no]' where userID='$userID';";
            $result = mysqli_query($conn,$sql);
            $sql1 = "UPDATE board set board_attend='1' where boardPw='$userID';";
            mysqli_query($conn,$sql1);

            mysqli_close($conn);
            //헤더함수를 이용하여 리스트 페이지로 리다이렉션
            header("Location: http://localhost/join%20taxi/join%20taxi/public_html/board_list.php"); //헤더 함수를 이용해서 리다이렉션 시킬 수 있다.
           // echo "<script>history.forword(board_list.php)</script>"
        ?>
    </body>
</html>
