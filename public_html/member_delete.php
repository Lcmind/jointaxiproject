<?php
// $idx = $_GET["idx"]

session_start();
$idx = isset($_SESSION["idx"])? $_SESSION["idx"]:"";

// echo $idx;
// exit;


/*  DB 접속 */
$conn = mysqli_connect("localhost", "jointaxi", "1234", "joindb");


/* 쿼리 작성 */
$sql = "delete from user where idx=$idx;";
// echo $sql;
// exit;

/* 데이터베이스에 쿼리 전송 */
mysqli_query($conn, $sql);


/* 세션 삭제 */
unset($_SESSION["s_idx"]);
unset($_SESSION["userName"]);
unset($_SESSION["userID"]);


/* DB(연결) 종료 */
mysqli_close($conn);


/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        alert(\"정상처리 되었습니다.\");
        location.href = \"index.php\";
    </script>
";
?>
