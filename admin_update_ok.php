<?php
/* 세션 시작 */

$u_idx = $_POST["idx"];
// echo  $userID;



/* 이전 페이지에서 값 가져오기 */
$pwd = $_POST["pwd"];
$email = $_POST["email_id"]."@".$_POST["email_dns"];
$phoneNum = $_POST["phoneNum"];


// exit;


/*  DB 접속 */
$conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
//$s_idx="select idx from user where idx=1;";
//echo $s_idx;

/* 쿼리 작성 */
// update 테이블명 set 필드명=값, 필드명=값, ....;
if(!$pwd){
    $sql = "update user set email='$email', phoneNum='$phoneNum' where idx='$u_idx';";
} else{
    $sql = "update user set password='$pwd', email='$email', phoneNum='$phoneNum' where idx='$u_idx';";
};
echo $sql;
// exit;


/* 데이터베이스에 쿼리 전송 */
mysqli_query($conn, $sql);


/* DB(연결) 종료 */
mysqli_close($conn);


/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        alert(\"정보가 수정되었습니다.\");
        location.href = \"member_select.php\";
    </script>
";
?>
