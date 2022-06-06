

<!-- Bootstrap + Creative Design main styles -->
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
       <h3><b>비밀번호 찾기</b></h3>
        </div>
      <form name=form action="fnd_pw.php" method="POST" class="joinFormlogin"onsubmit="return checkAll()" >

          <div class="textForm">
            <input name="userID" type="text" maxlength="9" class="id" placeholder="학번">
            </input>
          </div>
          <div class="textForm">
            <input name="checkStr" type="text" class="pw" placeholder="본인확인문구">
          </div>
          <script language="javascript">
              function checkAll() {
                  if (!checkUserID(form.userID.value)) {
                      return false;
                  }
                  if (!checkcheckStr(form.checkStr.value)) {
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

              function checkUserID(userID) {
                  //Id가 입력되었는지 확인하기
                  if (!checkExistData(userID, "학번을"))
                      return false;

                  var userIDRegExp = /^[0-9]{9}$/; //아이디 유효성 검사
                  if (!userIDRegExp.test(userID)) {
                      alert("학번은 숫자 9자리 입니다!");
                      form.userID.value = "";
                      form.userID.focus();
                      return false;
                  }
                 return true; //확인이 완료되었을 때
              }
              function checkcheckStr(checkStr) {
                  if (!checkExistData(checkStr, "본인확인문구를"))
                      return false;

                  var checkStrRegExp = /^[A-Za-z0-9가-힣]{1,9}$/;
                  if (!checkStrRegExp.test(checkStr)) {
                      alert("형식이 올바르지 않습니다!");
                      return false;
                  }
                  return true; //확인이 완료되었을 때
              }
          </script>
<p></p>
          <input type="submit" class="btn" style="font-weight:bold;" value="F I N D"></input>
        </form>
       </div>
   </header><!-- End of Page Header -->
