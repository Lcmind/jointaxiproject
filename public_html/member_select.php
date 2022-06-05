<?php
     include "admin_session.php";
     $conn = mysqli_connect("localhost", "jointaxi", "1234", "joindb");

     $sql = "SELECT * FROM user;";

     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);

/* paging : 한 페이지 당 데이터 개수 */
$list_num = 5;

/* paging : 한 블럭 당 페이지 수 */
$page_num = 3;

/* paging : 현재 페이지 */
$page = isset($_GET["page"])? $_GET["page"] : 1;

/* paging : 전체 페이지 수 = 전체 데이터 / 페이지당 데이터 개수, ceil : 올림값, floor : 내림값, round : 반올림 */
$total_page = ceil($num / $list_num);
// echo "전체 페이지 수 : ".$total_page;

/* paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수 */
$total_block = ceil($total_page / $page_num);

/* paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 */
$now_block = ceil($page / $page_num);

/* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1 */
$s_pageNum = ($now_block - 1) * $page_num + 1;
// 데이터가 0개인 경우
if($s_pageNum <= 0){
    $s_pageNum = 1;
};

/* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
$e_pageNum = $now_block * $page_num;
// 마지막 번호가 전체 페이지 수를 넘지 않도록
if($e_pageNum > $total_page){
    $e_pageNum = $total_page;
};
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원목록</title>
    <style type="text/css">
        body{font-size:16px}
        a{text-decoration:none;color:rgb(0, 132, 255)}
        a:hover{color:rgb(255, 153, 0)}
        table{width:1328px;border-collapse:collapse}
        td{padding:10px 15px;text-align:center}
        .title{border-top:3px solid #999;border-bottom:2px solid #999;background:#eee;font-weight:bold}
        .brd{border-bottom:1px solid #999}
        table a{text-decoration:none;color:#000;border:1px solid #333;display:inline-block;padding:3px 5px;font-size:12px;border-radius:5px}
        table a:hover{border:0 none;background:rgb(0, 132, 255);color:#fff}
    </style>
    <script type="text/javascript">
        function del_check(idx){
            var i = confirm("정말 삭제하시겠습니까?");

            if(i == true){
                // alert("delete.php?u_userID="+userID);
                location.href = "admin_delete.php?idx="+idx;
            };
        };
        function edit_check(idx){
            var i = confirm("수정하시겠습니까?");

            if(i == true){
                // alert("delete.php?u_userID="+userID);
                location.href = "admin_update.php?idx="+idx;
            };
        };
    </script>
</head>
<body>
    <h2>* 관리자 페이지 *</h2>
    <p>"<?php echo $s_name; ?>"님, 안녕하세요.</p>
    <p>
        <button onclick="location.href='main.php'" class="bar">Home</button>
        <button onclick="location.href='board_admin_list.php#about'" class="bar">게시판 관리</button>
        <button onclick="location.href='member_select.php'" class="bar">회원관리</button>
        <button onclick="location.href='logoutProcess.php'" class="bar">로그아웃</button>
        <!-- <a href="../board/board_member_select.php">게시판 관리</a> -->
        <!--a href="#none" class="bar">게시판 관리</a>
        <a href="join%20taxi/public_html/member_select.php" class="bar">회원 관리</a>
        <a href="join%20taxi/public_html/logout.php">로그아웃</a-->
    </p>
    <hr>
    <p>총 <?php echo $num; ?>명</p>
    <table>
        <tr class="title">
            <td>번호</td>
            <td>이름</td>
            <td>아이디</td>
            <td>이메일</td>
            <td>전화번호</td>
            <td>가입일</td>
            <td>수정</td>
            <td>삭제</td>
        </tr>

        <?php
        // for($i = 1; $i <= $num; $i++){
        /* $i = 1;
        while($array = mysqli_fetch_array($result)){ */

        /* paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 */
        $start = ($page - 1) * $list_num;

        /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
        $sql = "select * from user limit $start, $list_num;";

        /* paging : 쿼리 전송 */
        $result = mysqli_query($conn, $sql);

        /* paging : 글번호 */
        $cnt = $start + 1;

        /* paging : 회원정보 가져오기(반복) */
        while($array = mysqli_fetch_array($result)){
        ?>
        <tr class="brd">
            <!-- <td><?php echo $i; ?></td> -->
            <td><?php echo $cnt; ?></td>
            <td><?php echo $array["userName"]; ?></td>
            <td><?php echo $array["userID"]; ?></td>
            <td><?php echo $array["email"]; ?></td>
            <td><?php echo $array["phoneNum"]; ?></td>
            <td><?php echo $array["mDate"]; ?></td>
            <td><a href="#" onclick="edit_check(<?php echo $array["idx"]; ?>)">수정</a></td>
            <td><a href="#" onclick="del_check(<?php echo $array["idx"]; ?>)">삭제</a></td>
        </tr>
        <?php
            /* $i++; */
            /* paging */
            $cnt++;
        };
        ?>
    </table>
    <p class="pager">

    <?php
    /* paging : 이전 페이지 */
    if($page <= 1){
    ?>
    <a href="member_select.php?page=1">이전</a>
    <?php } else{ ?>
    <a href="member_select.php?page=<?php echo ($page-1); ?>">이전</a>
    <?php };?>

    <?php
    /* pager : 페이지 번호 출력 */
    for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
    ?>
    <a href="member_select.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
    <?php };?>

    <?php
    /* paging : 다음 페이지 */
    if($page >= $total_page){
    ?>
    <a href="member_select.php?page=<?php echo $total_page; ?>">다음</a>
    <?php } else{ ?>
    <a href="member_select.php?page=<?php echo ($page+1); ?>">다음</a>
    <?php };?>

    </p>
</body>
</html>
