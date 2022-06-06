<!DOCTYPE html>
<?php
    session_start();

    $userID = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
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
               <button
               class="btn btn-outline-light">CAR SHARING
            </button>

</div>
    </header><!-- End of Page Header -->

    <!-- About Section -->
    <section class="about" id="about">
        <!-- Container -->
        <div class="container">
            <!-- About wrapper -->
            <div class="about-wrapper">

                <div class="content">

    <!-- About Section -->

       <h2><b>게시물 수정</b></h2><br />
        <!-- board_add_action.php로 넘기는 폼 -->

        <?php
            //커넥션 객체 생성 (데이터 베이스 연결)
            $conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
            $board_no = $_GET["board_no"];
            echo $board_no."번째 글 수정 페이지<br>";
            //board 테이블을 조회하여 board_no의 값이 일치하는 행의 board_no, board_title, board_content, board_user, board_date 필드의 값을 가져오는 쿼리
            $sql = "SELECT board_no, board_title, board_start, board_destination, board_time, board_user, board_date FROM board WHERE board_no = '".$board_no."'";
            $result = mysqli_query($conn,$sql);
            if($row = mysqli_fetch_array($result)){
        ?>
        <br>
        <form action="board_update_action.php" method="post">
            <table class="table table-bordered" style="width:70%">
                <tr>
                    <td style="width:20%">글 번호</td>
                    <td style="width:50%"><input type="text" name="board_no" value="<?php echo $row["board_no"]?>" readonly/> <--수정 할 수 없습니다.</td>
                </tr>
                <tr>
                    <td style="width:20%">글 제목</td>
                    <td style="width:50%"><input type="text" name="board_title" value="<?php echo $row["board_title"]?>"readonly> <--수정 할 수 없습니다.</td>
                </tr>
                <tr>
                    <td style="width:20%">출발지</td>
                    <td style="width:50%"><input type="text" name="board_start" value="<?php echo $row["board_start"]?>"></td>
                </tr>
                <tr>
                    <td style="width:20%">목적지</td>
                    <td style="width:50%"><input type="text" name="board_destination" value="<?php echo $row["board_destination"]?>"></td>
                </tr>
                <tr>
                    <td style="width:20%">출발시간</td>
                    <td style="width:50%"><input type="text" name="board_time" value="<?php echo $row["board_time"]?>"> <--현재시간보다 커야합니다.</td>
                </tr>
            </table>
            <br>
        <?php
            }
            //커넥션 객체 종료
            mysqli_close($conn);
        ?>
            &nbsp;&nbsp;&nbsp;
            <button class="btn btn-primary" type="submit">글 수정</button>
            &nbsp;&nbsp;
            <a class="btn btn-primary" href="board_list.php"> 리스트로 돌아가기</a>
        </form>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
