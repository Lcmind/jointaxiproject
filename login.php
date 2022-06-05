<?php require 'vendor/autoload.php'; ?>
<link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

<!-- Bootstrap + Creative Design main styles -->
<link rel="stylesheet" href="assets/css/Join Taxi.css">
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
                       <a class="nav-link btn btn-primary" href="login.php">로그인</a>
                       <li class="nav-item ml-md-4">
                           <a class="nav-link btn btn-primary" href="insert.php">회원가입</a>
                   </li>
               </ul>
           </div>
       </div>
   </nav><!-- End of Page Navbar -->

   <header id="home" class="header1">
       <div class="overlay"></div>
       <div class="header-content1">
          <br /><br /><br /><br /><br /><br /><br  />
        <div style="clear:both">
          <style>img{float:middle;}</style>
        <img class="fit-picture" src="assets/imgs/join1.png" height="42"weight="38"></img>
        </div>
      <form action="login_result.php" name=form method="POST" class="joinFormlogin" >

          <div class="textForm">
            <input name="userID" type="text" maxlength="9" class="id" placeholder="학번">
            </input>
          </div>
          <div class="textForm">
            <input name="password" type="password" class="pw" placeholder="비밀번호">
          </div>



<p></p>
          <input type="submit" class="btn" style="font-weight:bold;" value="J O I N"></input>
        </form>
        <br /><br /><br /><br /><br /><br /><br  />  <br /><br /><br /><br />
        <input type="button"  onclick="location.href='fnd.php'" class="fnd" value="비밀번호찾기"></input>
       </div>
   </header><!-- End of Page Header -->
</body>
