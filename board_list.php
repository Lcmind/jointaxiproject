<?php require 'vendor/autoload.php'; ?>
<!DOCTYPE html>
<?php
    $conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
    session_start();

    $userID = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
    $userName = isset($_SESSION["userName"])? $_SESSION["userName"]:"";
    $idx =isset($_SESSION["idx"])? $_SESSION["idx"]:"";
    // echo "Session ID : ".$userID." / Name : ".$userName;
    if($idx == NULL){
        echo "
            <script type=\"text/javascript\">
                alert(\"로그인이 필요합니다.\");
                location.href = \"login.php\";
            </script>
        ";
    };
    $edit = "SELECT userName,userID,userJoin from user where userID='$userID';";

     $a=mysqli_query($conn,$edit);

     $arr=mysqli_fetch_array($a);
 ?>

<html lang="ko">
<head>
    <!-- Bootstrap + Creative Design main styles -->
   <link rel="stylesheet" href="Join Taxi.css">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="#about">

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
                                   <?php if($_SESSION['idx']== "1"){ ?>
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
                                                 <script language="javascript">
                                                  function showPopup() { window.open("popup.php", "a", "width=500, height=200, left=250, top=250"); }
                                                  </script>
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
    <section class="about" id="about"style="height:1113px;">
        <!-- Container -->
        <div class="containers"style="
        width: 100%;
        padding-right: 65px;
        padding-left: 65px;
        margin-right: auto;
        margin-left: auto;">
            <!-- About wrapper -->
          <div class="about-wrappers"style="
          background-color: #fff;
          box-shadow: 0 3px 80px rgba(173, 181, 189, 0.3), 0 0 10px rgba(173, 181, 189, 0.3) !important;
          border-radius: 0.2rem;
          padding: 30px;
          position: relative;;">
                <!--div class="after"><h1>Taxi Sharing</h1></div-->
                <div>
                  <h2><b>게시판</b></h2>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>번호</td>
                                            <td>제목</td>
                                            <td>작성자</td>
                                            <td>출발지</td>
                                            <td>도착지</td>
                                            <td>모이는 시간</td>
                                            <td>작성일</td>
                                            <td>참가 인원</td>
                                            <td>참가</td>
                                            <!--if 문으로 보이게-->
                                            <td>수정</td>
                                            <td>삭제</td>
                                        </tr>
                  <?php

                      if (isset($_GET["page"])) {
                          $page = $_GET["page"];
                      }else{$page = 1;}

                      //페이징 작업을 위한 테이블 내 전체 행 갯수 조회 쿼리
                      $sql1 = "SELECT board_no FROM board";
                      $resultCount = mysqli_query($conn,$sql1);
                      $row_num = mysqli_num_rows($resultCount);
                      $list = 10;   //페이지당 보여줄 게시물 행의 수
                      $block_ct = 1;

                      $block_num = ceil($page/$block_ct);
                      $block_start = (($block_num - 1) * $block_ct) + 1;
                      $block_end = $block_start + $block_ct - 1;

                      $total_page = ceil($row_num / $list);
                      if($block_end > $total_page) $block_end = $total_page;
                      $total_block = ceil($total_page/$block_ct);
                      $start_num = ($page-1) * $list;

                      //board 테이블을 조회해서 board_no, board_title, board_user, board_date 필드 값을 내림차순으로 정렬하여 모두 가져 오는 쿼리
                      //입력된 begin값과 list 값에 따라 가져오는 행의 시작과 갯수가 달라지는 쿼리
                      $sql2 = "SELECT * FROM board order by board_no desc limit $start_num, $list";
                      $sql22 = mysqli_query($conn, $sql2);
                      $result = mysqli_query($conn,$sql2);
                      $b = "SELECT userJoin FROM user order by userJoin";
                      $count = mysqli_query($conn, $b);

                      while($board = $sql22->fetch_array()){
                        $title=$board["board_title"];
                        if(strlen($title)>30)
                        {
                          $title=str_replace($board["board_title"],mb_substr($board["board_title"],0,30,"utf-8")."...",$board["board_title"]);
                        }
                        $sql3 = "SELECT * from board where board_no='".$board['board_no']."'";
                        $sql33 = mysqli_query($conn, $sql3);
                        $rep_count = mysqli_num_rows($sql33);
                  ?>
                          <tr>
                              <td>
                                  <?php
                                      echo $board["board_no"];
                                  ?>
                              </td>
                              <td>
                                  <?php
                                  echo "<a href='board_popup.php?board_no=";
                                  echo "$board[board_no]&userJoin=";
                                  echo "$arr[userJoin]'";
                                  echo "onclick=\"window.open(this.href,'팝업창','width=500,height=200,top=300, left=300');return false;\">";
                                      echo $board["board_title"];
                                      echo "</a>";
                                  ?>
                              </td>
                              <td>
                                  <?php
                                      echo $board["board_user"];
                                  ?>
                              </td>
                              <td>
                                  <?php
                                      echo $board["board_start"];
                                  ?>
                              </td>
                              <td>
                                  <?php
                                      echo $board["board_destination"];
                                  ?>
                              </td>
                              <td>
                                  <?php
                                      echo $board["board_time"];
                                  ?>
                              </td>
                              <td>
                                  <?php
                                      echo $board["board_date"];
                                  ?>
                              </td>
                           <td>
                                  <?php
                                      echo $board["board_attend"],"/4";
                                  ?>
                              </td>
                                  <?php

                                  if($arr["userID"]==$board["boardPw"]&& $arr["userName"]==$board["board_user"]){
                                      echo "<td><a href='popup.php' onclick='showPopup(); return false;'>참여자</a></td>";
                                      echo "<td><a href='board_update_form.php?board_no=".$board["board_no"]."'>수정</a></td>";
                                      echo "<td><a href='board_delete_form.php?board_no=".$board["board_no"]."'>삭제</a></td>";
                                  }
                                  elseif($arr["userJoin"]==$board["board_no"]) {
                                      echo "<td><a href='board_unjoin_action.php?board_no=".$board["board_no"]."'>참가 취소</a></td>";
                                  }
                              /*elseif(mysqli_fetch_array($count)>=4){
                                 echo "<td>만석</td>";
                               }*/
                              else {
                                 echo "<td><a href='board_join_action.php?board_no=".$board["board_no"]."&userJoin=".$arr["userJoin"]."'>참가</a></td>";
                              }
                           ?>
                         </tr>
                      <?php
                          }
                      ?>
                  </table>

                  <div id="page_num">
                        <ul>
                          <?php
                            if($page <= 1)
                            { //만약 page가 1보다 크거나 같다면 빈값

                            }else{
                            $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                              echo "<a class='btn btn-primary'  style='float:right;' href='?page=$pre'>이전</a>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                            }
                            if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                            }else{
                              $next = $page + 1; //next변수에 page + 1을 해준다.
                              echo "<a class='btn btn-primary' style='float:right;' href='?page=$total_page'>다음</a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                            }
                          ?>
                        </ul>
                      </div>
                      <a class="btn btn-primary" href="board_add_form.php">글 쓰기</a>
                      <br />

                    </div>
                  </body>
                  </html>
