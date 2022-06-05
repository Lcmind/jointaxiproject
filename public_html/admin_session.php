<?php
session_start();

$s_id = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
$s_name = isset($_SESSION["userName"])? $_SESSION["userName"]:"";
$s_idx = isset($_SESSION["idx"])? $_SESSION["idx"]:"";
$u_idx = isset($_SESSION["idx"])? $_SESSION["idx"]:"";
/* 관리자가 아닌 경우 index문서로 이동 */
if($s_idx != "1"){
    echo "
        <script type=\"text/javascript\">
            alert(\"관리자 로그인이 필요합니다.\");
            location.href = \"login.php\";
        </script>
    ";
};
?>
