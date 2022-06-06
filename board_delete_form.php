<!DOCTYPE html>
<?php
    session_start();

    $userID = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
    $userName = isset($_SESSION["userName"])? $_SESSION["userName"]:"";
    $idx =isset($_SESSION["idx"])? $_SESSION["idx"]:"";
    // echo "Session ID : ".$userID." / Name : ".$userName;
?>
<html lang="ko">
<head>
    <!-- Bootstrap + Creative Design main styles -->
   <link rel="stylesheet" href="Join Taxi.css">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page Navbar -->
    <nav id="scrollspy" class="navbar page-navbar navbar-light navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="index.php"><strong class="text-primary">Join</strong> <span class="text-dark">Taxi</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                              <?php if(!$userID){/* 로그인 전  */ ?>
                                                 <p>
                                                    <li class="nav-item ml-md-4">
                                                          <a class="nav-link btn btn-primary" href="login.php">로그인</a>
                                                    </li>
                                                    <li class="nav-item ml-md-4">
                                                          <a class="nav-link btn btn-primary" href="insert.php">회원가입</a>
                                                    </li>
                                                 </p>
                                 <p>
                                                 <?php } else{ /* 로그인 후 */ ?>
                                   <?php if($_SESSION['userID']== "201821020"){ ?>
                                     <li class="nav-item ml-md-4">
                                       <a class="nav-link btn btn-primary" href="admin.php">관리자</a>
                                     </li>
                                       <?php }; ?>
                                                    <li class="nav-item ml-md-4">
                                                          <a class="nav-link btn btn-primary" href="logoutProcess.php">로그아웃</a>
                                                    </li>
                                   <li class="nav-item ml-md-4">
                                                          <a class="nav-link btn btn-primary" href="member_update.php"><img src="mypage.png" width="20" height="20"/></a>
                                                    </li>
                                                 </p>
                             <?php }; ?>
                </ul>
            </div>
        </div>
    </nav><!-- End of Page Navbar -->

    <!-- Page Header -->
    <header id="home"class="header">
        <div class="overlay"></div>
        <div class="header-content">
          <h6>TAXI SHARING</h6>
            <button onclick="location.href='index.php'"class="btn btn-outline-light">Main Page</button>


</div>
    </header><!-- End of Page Header -->

    <!-- About Section -->
    <section class="about" id="about">
        <!-- Container -->
        <div class="container"  padding-right= "45px">
            <!-- About wrapper -->
            <div class="about-wrapper" >

                <div class="content">



        <?php
            //board_list.php 페이지에서 넘어온 글 번호값 저장 및 출력
            $board_no = $_GET["board_no"];
            echo "<h2>게시글 삭제&nbsp&nbsp-&nbsp",$board_no."번째 글 삭제 페이지<br></h2>";
        ?>
        <!-- board_delete_action.php 페이지로 post방식을 이용하여 값 전송 -->
        <form action="board_delete_action.php" method="post">
            <table class="table table-bordered" style="width:30%">
                <tr>
                    <td>게시글을 삭제할까요?😥</td>
                </tr>
                <tr>
                    <td><input type="text" name="board_pw" value="<?php echo $userID; ?>"readonly>
                        <input type="hidden" name="board_no" value="<?php echo $board_no ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                      <button class="btn btn-primary" type="submit">글 삭제 버튼</button>
&nbsp&nbsp&nbsp<a class="btn btn-primary" href="board_list.php">이전으로</a>
                    </td>
                </tr>
            </table>
        </form>

        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
