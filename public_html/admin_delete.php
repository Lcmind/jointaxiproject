<?php

$u_idx = $_GET["idx"];
// echo $idx;
// exit;


/*  DB 접속 */
$conn = mysqli_connect("localhost", "jointaxi", "1234", "joindb");
/* 쿼리 작성 */
$sql = "delete from user where idx=$u_idx;";
// echo $sql;
// exit;

/* 데이터베이스에 쿼리 전송 */
mysqli_query($conn, $sql);


/* DB(연결) 종료 */
mysqli_close($conn);


/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        alert(\"정상처리 되었습니다.\");
        location.href = \"member_select.php\";
    </script>
";
?>
