
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
        <h1><img class="fit-picture" src="join1.png" height="42"weight="38"></img>   US</h1>
        </div>
      <form name=form method="POST" class="joinForm"onsubmit="return checkAll()" action="insert_result.php">

          <div class="textForm">
            <input name="userID" type="text" maxlength="9" class="id" placeholder="학번">
            </input>
          </div>
          <div class="textForm">
            <input name="password" type="password"maxlength="12" class="pw" placeholder="비밀번호">
          </div>
           <div class="textForm">
            <input name="password1" type="password"maxlength="12" class="pw" placeholder="비밀번호 확인">
          </div>
          <div class="textForm">
            <input name="userName" type="text" class="Name" placeholder="이름">
          </div>
           <div class="textForm">
            <input name="email" type="text" class="email" placeholder="이메일">
          </div>
          <div class="textForm">
            <input name="phoneNum" type="text" maxlength="11" class="cellphoneNum" placeholder="전화번호">
          </div>
          <div class="textForm">
            <input name="checkStr" type="text" maxlength="9" class="card" placeholder="본인확인문구 (1~9자리의 문자,숫자,영어)">
          </div>
<p></p>
          <input type="submit" class="btn" style="font-weight:bold;"  value="J O I N"></input>
          <!-- 가입상오류 보여주기-->

          <script language="javascript">
              function checkAll() {
                  if (!checkUserID(form.userID.value)) {
                      return false;
                  }
                  if (!checkPassword(form.userID.value, form.password.value, form.password1.value)) {
                      return false;
                  }
                  if (!checkName(form.userName.value)) {
                      return false;
                  }
                  if (!checkMail(form.email.value)) {
                      return false;
                  }
                  if (!checkphonenum(form.phoneNum.value)) {
                      return false;
                  }
                  if (!checkcheckStr(form.checkStr.value)) {
                      return false;
                  }
                  return true;
              }

              // 공백확인 함수
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

              function checkPassword(userID, password, password1) {
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
                  if (userID == password) {
                      alert("아이디와 비밀번호는 같을 수 없습니다!");
                      form.password.value = "";
                      form.password1.value = "";
                      form.password1.focus();
                      return false;
                  }
                 return true; //확인이 완료되었을 때
              }

              function checkMail(email) {
                  //mail이 입력되었는지 확인하기
                  if (!checkExistData(email, "이메일을"))
                      return false;

                  var emailRegExp = /^[A-Za-z0-9_]+[A-Za-z0-9]*[@]{1}[A-Za-z0-9]+[A-Za-z0-9]*[.]{1}[A-Za-z]{1,3}$/;
                  if (!emailRegExp.test(email)) {
                      alert("이메일 형식이 올바르지 않습니다!");
                      form.email.value = "";
                      form.email.focus();
                      return false;
                  }
                 return true; //확인이 완료되었을 때
              }

              function checkName(userName) {
                  if (!checkExistData(userName, "이름을"))
                      return false;

                  var nameRegExp = /^[가-힣]{2,4}$/;
                  if (!nameRegExp.test(userName)) {
                      alert("이름이 올바르지 않습니다.");
                      return false;
                  }
               return true; //확인이 완료되었을 때
              }
              function checkphonenum(phoneNum) {
                  //Id가 입력되었는지 확인하기
                  if (!checkExistData(phoneNum, "휴대폰 번호를"))
                      return false;

                  var phoneNumRegExp = /^[0-9]{11}$/; //아이디 유효성 검사
                  if (!phoneNumRegExp.test(phoneNum)) {
                      alert("휴대폰 번호는 숫자 11자리 입니다!");
                      form.phoneNum.value = "";
                      form.phoneNum.focus();
                      return false;
                  }
                 return true; //확인이 완료되었을 때
              }
              function checkcheckStr(checkStr) {
                  if (!checkExistData(checkStr, "문자를"))
                      return false;

                  var checkStrRegExp = /^[A-Za-z0-9가-힣]{1,9}$/;
                  if (!checkStrRegExp.test(checkStr)) {
                      alert("형식이 올바르지 않습니다!");
                      return false;
                  }
                  return true; //확인이 완료되었을 때
              }
          </script>

        </form>

       </div>
   </header><!-- End of Page Header -->
<!-- db연동-->
