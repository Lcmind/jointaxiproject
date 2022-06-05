<?php
include "db.php";
  if(isset($_SESSION['userID'])){
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
  }else{ ?>
<!DOCTYPE html>
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
       <h3><b>비밀번호 변경</b></h3>
        </div>
      <form name=form action="changePw_ok.php" method="POST" class="joinFormlogin" onsubmit="return checkAll();" >

          <div class="textForm">
            <input name="password" type="password"  class="pw" placeholder="새로운 비밀번호">
            </input>
          </div>
          <div class="textForm">
            <input name="password1" type="password" class="pw" placeholder="비밀번호 확인">
            </input>
          </div>
          <script language="javascript">
              function checkAll() {
                  if (!checkPassword( form.password.value, form.password1.value)) {
                      return false;
                    }
                    return true;
                  }
          function checkExistData(value, dataName) {
              if (value == "") {
                  alert(dataName + " 입력해주세요!");
                  return false;
              }
              return true;
          }
          function checkPassword( password, password1) {
              //비밀번호가 입력되었는지 확인하기
              if (!checkExistData(password, "비밀번호를"))
                  return false;
              //비밀번호 확인이 입력되었는지 확인하기
              if (!checkExistData(password1, "비밀번호 확인을"))
                  return false;

              var password1RegExp = /^[a-zA-z0-9]{4,12}$/; //비밀번호 유효성 검사
              if (!password1RegExp.test(password)) {
                  alert("비밀번호는 영문 대소문자와 숫자 4~12자리로 입력해야합니다!");
                  form.password.value = "";
                  form.password1.value = "";
                  form.password1.focus();
                  return false;
              }
              //비밀번호와 비밀번호 확인이 맞지 않다면..
              if (password != password1) {
                  alert("두 비밀번호가 맞지 않습니다.");
                  form.password.value = "";
                  form.password1.value = "";
                  form.password1.focus();
                  return false;
              }

              //아이디와 비밀번호가 같을 때..

             return true; //확인이 완료되었을 때
          }
          </script>

<p></p>
          <input type="submit" class="btn" style="font-weight:bold;" value="C H A N G"></input>
        </form>
       </div>
   </header><!-- End of Page Header -->
<?php } ?>
