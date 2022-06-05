<?php
session_start();

/* 로그인 사용자 */
$u_idx = $_SESSION["idx"];

/* DB 연결 */
$conn = mysqli_connect("localhost", "jointaxi", "1234", "joindb");

/* 쿼리 작성 */
$sql = "SELECT * from user where idx=$u_idx;";

/* 쿼리 전송 */
$result = mysqli_query($conn, $sql);

/* 결과 가져오기 */
$array = mysqli_fetch_array($result);

?>

<link rel="stylesheet" href="assets/css/Join Taxi.css">
<html>
<HEAD>
     <META http-equiv="content-type" content="text/html; charset=utf-8">
 </HEAD>
 <body>
   <!-- Page Navbar -->
   <nav id="scrollspy" class="navbar page-navbar1 navbar-light navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
       <div class="container">
           <a class="navbar-brand" href="index.php"><strong class="text-primary">Join</strong> <span class="text-dark">Taxi</span></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                   <li class="nav-item ml-md-4">
                       <a class="nav-link btn btn-primary" href="logoutProcess.php">로그아웃</a>
                   </li>
                   <li class="nav-item ml-md-4">
                       <a class="nav-link btn btn-primary" href="member_update.php"><img src="assets/imgs/mypage.png" width="20" height="20"/></a>
                   </li>
               </ul>
           </div>
       </div>
   </nav><!-- End of Page Navbar -->
   <header id="home" class="header1">
       <div class="overlay"></div>
       <div class="header-content1">

   <form name="form" method="POST" class="joinFormmypage" action="member_update_ok.php">

       <legend>정보 수정</legend>
           <div class="textForm" style="color:#495057; text-align:left;">이름 : <?php echo $array["userName"]; ?></div>
           <div class="textForm" style="color:#495057; text-align:left;">아이디 : <?php echo $array["userID"]; ?></div>

        <div class="textForm">
        <input type="text" name="password" maxlength="12" class="pw" placeholder="비밀번호"/>
        <!--span class="err_pwd">* 비밀번호는 영문 대소문자와 숫자로 이루어진 4~12자리만 입력할 수 있습니다.</span--></div>
        <div class="textForm">
        <input type="text" name="password1" maxlength="12"class="pw" placeholder="비밀번호 확인"/>
        </div>
    <!--?php
        // explode("기준 문자", "어떤 문장에서");
        $email = explode("@", $array["email"]);
    ?-->
        <div class="textForm">
          <input type="text" name="email" class="email" value="<?php echo $array["email"]; ?>"/>
        </div>

        <!--input type="text" name="email_dns" id="email_dns" class="email" value="<--?php echo $email[1]; ?>">
        <select name="email_sel" id="email_sel" class="email_sel" onchange="change_email()">
            <option value="">직접 입력</option>
            <option value="naver.com">NAVER</option>
            <option value="hanmail.net">DAUM</option>
            <option value="gmail.com">GOOGLE</option>
        </select-->

        <div class="textForm">
          <input type="text" name="phoneNum" class="cellphoneNum" maxlength="11"value="<?php echo $array["phoneNum"]; ?>"></input>
        </div>

        <!--span class="err_phoneNum">"-"없이 숫자만 입력</span-->
        <input type="submit" class="btn btn-primary"  value="정보수정"></input>
    <button type="button" class="btn btn-primary" onclick="del_check()">회원탈퇴</button>
        <!--button type="submit" class="btn btn-primary" onclick="checkAll()">정보수정</button-->

<script type="text/javascript">
    function del_check(){
        var i = confirm("정말 탈퇴하시겠습니까?");

        if(i == true){
            location.href = "member_delete.php?idx=<?php echo $u_idx; ?>";
            //location.href = "member_delete.php";
        }
    }
</script>

</form>
</div>
</header>
</html>
