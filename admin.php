<?php
include "admin_session.php";
?>
<link rel="stylesheet" href="Join Taxi.css">
<HTML>
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
                       <a class="nav-link btn btn-primary" href="member_update.php"><img src="mypage.png" width="20" height="20"/></a>
                   </li>
               </ul>
           </div>
       </div>
   </nav><!-- End of Page Navbar -->
   <header id="home" class="header1">
       <div class="overlay"></div>
       <div class="header-content1">
          <br /><br /><br /><br /><br />
        <div style="clear:both">
          <style>img{float:middle;}</style>
        <h2><img class="fit-picture" src="join1.png" height="42"weight="38"> Only For Admin </img><img class="fit-picture" src="join1.png" height="42"weight="38"></img></h2>
        </div>

    <p>"<?php echo $s_name; ?>"님, 안녕하세요.</p>
    <p>
      <button type="button" onclick="location.href='board_admin_list.php#about'" class="btn btn-primary">게시판 관리
    </button>
    <button onclick="location.href='member_select.php'" class="btn btn-primary">회원정보 관리
  </button>
        <!-- <a href="board/board_list.php">게시판 관리</a> -->
    </p>
    <hr>
</body>
