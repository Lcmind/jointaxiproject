<!DOCTYPE html>
<?php
    session_start();
    $conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");
    $userID = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
    $userName = isset($_SESSION["userName"])? $_SESSION["userName"]:"";
    $idx =isset($_SESSION["idx"])? $_SESSION["idx"]:"";
    $check = "SELECT userJoin from user where userID='$userID';";
        $userJoin = mysqli_query($conn,$check);
        $userCheck = mysqli_fetch_array($userJoin);
        if(!empty($userCheck['userJoin'])){
          echo "<script type=\"text/javascript\">alert(\"이미 다른 택시에 탑승 예정인 멤버입니다!!\");location.href = \"board_list.php\";</script>";
       }
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
        <div class="container">
            <!-- About wrapper -->
            <div class="about-wrapper">

                <div class="content">

    <!-- About Section -->

       <h2><b>게시물 작성</b></h2><br />
        <!-- board_add_action.php로 넘기는 폼 -->
        <form name=form class="form-horizontal" action="board_add_action.php" method="post">
            <div class="form-group">
                <label for="exampleInputPassword1" class="col-sm-2 control-label">비밀번호(학번) : </label>
                <div class="col-sm-10">
                    <!-- 글 비밀번호 입력 상자 -->
                    <input class="form-control" name="boardPw" id="password" type="id"value="<?php echo $userID;?>"readonly />

                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle1" class="col-sm-2 control-label">글 제목 : </label>
                <div class="col-sm-10">
                    <!-- 글 제목 입력 상자 -->
                    <input class="form-control" name="boardTitle" id="boardTitle" type="text" placeholder="Title"readonly/>
                    <input type="checkbox" name="boardtitle" value="같이타자~!" onclick="checktitle(this)">같이타자~!</input> &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="boardtitle" value="지금 당장 출발~!" onclick="checktitle(this)">지금당장출발~!</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="boardtitle" value="급구중~!" onclick="checktitle(this)">급구중~!</input>&nbsp;&nbsp;&nbsp;
                    <script>
                    function checktitle(chk){
                      var checkboxs = document.getElementsByName("boardtitle");
                      var rVal = "";

                      for(i=0;i<checkboxs.length;i++) {
                        if(checkboxs[i]!=chk){
                          checkboxs[i].checked = false;
                      }else{
                        rVal += checkboxs[i].value;
                      }
                    }
                    document.getElementById("boardTitle").value = rVal;
                    }

                    </script>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputContent1" class="col-sm-2 control-label">출발지 : </label>
                <div class="col-sm-10">
                    <!-- 글 내용 입력 텍스트영역 -->
                    <input type="text" class="form-control" name="boardstart" id="boardstart" rows="1" cols="20" placeholder="start"></input>
                    <input type="checkbox" name="start_destination" value="신촌 베스트마트" onclick="check(this)">신촌 베스트마트</input> &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="start_destination" value="모시래 기숙사" onclick="check(this)">모시래 기숙사</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="start_destination" value="해오름 기숙사" onclick="check(this)">해오름 기숙사</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="start_destination" value="연수동" onclick="check(this)">연수동</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="start_destination" value="성서동" onclick="check(this)">성서동</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="start_destination" value="충주 터미널" onclick="check(this)">충주 터미널</input>&nbsp;&nbsp;&nbsp;
                    <script>
                    function check(chk){
                      var checkboxs = document.getElementsByName("start_destination");
                      var rVal = "";

                      for(i=0;i<checkboxs.length;i++) {
                        if(checkboxs[i]!=chk){
                          checkboxs[i].checked = false;
                      }else{
                        rVal += checkboxs[i].value;
                      }
                    }
                    document.getElementById("boardstart").value = rVal;
                    }

                    </script>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputContent1" class="col-sm-2 control-label">목적지 : </label>
                <div class="col-sm-10">

                    <!-- 글 내용 입력 텍스트영역 -->
                    <input type="text" class="form-control" name="boarddestination" id="boarddestination" rows="1" cols="20" placeholder="destination"></input>
                    <input type="checkbox" name="destination" value="충주 터미널" onclick="checkdestination(this)">충주 터미널</input> &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="destination" value="연수동" onclick="checkdestination(this)">연수동</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="destination" value="성서동" onclick="checkdestination(this)">성서동</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="destination" value="신촌 베스트마트" onclick="checkdestination(this)">신촌 베스트마트</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="destination" value="모시래 기숙사" onclick="checkdestination(this)">모시래 기숙사</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="destination" value="해오름 기숙사" onclick="checkdestination(this)">해오름 기숙사</input>&nbsp;&nbsp;&nbsp;
                    <script>
                    function checkdestination(chk){
                      var checkboxs = document.getElementsByName("destination");
                      var rVal = "";

                      for(i=0;i<checkboxs.length;i++) {
                        if(checkboxs[i]!=chk){
                          checkboxs[i].checked = false;
                      }else{
                        rVal += checkboxs[i].value;
                      }
                    }
                    document.getElementById("boarddestination").value = rVal;
                    }

                    </script>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputContent1" class="col-sm-2 control-label">출발 시간 : </label>
                <div class="col-sm-10">
                  <script type="text/javascript">
                  function printTime() {
              var clock = document.getElementById("clock");            // 출력할 장소 선택
              var now = new Date();                                                  // 현재시간
              var nowTime = now.getFullYear() + "년 " +(now.getMonth()+1) + "월 " + now.getDate() + "일 " + now.getHours() + "시 " + now.getMinutes() + "분 " ;
              clock.innerHTML = nowTime;           // 현재시간을 출력
              setTimeout("printTime()",1000);         // setTimeout(“실행할함수”,시간) 시간은1초의 경우 1000
              }
              window.onload = function() {                         // 페이지가 로딩되면 실행
              printTime();
              }
              </script>
                  <div>
                    <span id="clock"></span>
                  </div>
                    <!-- 글 내용 입력 텍스트영역 -->
                    <!--textarea class="form-control" type="text"name="boardtime" id="boardtime" rows="1" cols="20" ></textarea-->
                    <input type="text" name="boardtime" id="boardtime"></input>
                    <input type="checkbox" name="time" value="10분뒤" onclick="checktime(this)">10분후</input> &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="time" value="20분뒤" onclick="checktime(this)">20분후</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="time" value="30분뒤" onclick="checktime(this)">30분후</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="time" value="40분뒤" onclick="checktime(this)">40분후</input>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="time" value="50분뒤" onclick="checktime(this)">50분후</input>&nbsp;&nbsp;&nbsp;
                    <br />게시물 작성을 완료하면 지금시간 + 선택하신 시간이 됩니다.
                    <script>
                    function checktime(chk){
                      var checkboxs = document.getElementsByName("time");
                      var rVal = "";

                      for(i=0;i<checkboxs.length;i++) {
                        if(checkboxs[i]!=chk){
                          checkboxs[i].checked = false;
                      }else{
                        rVal += checkboxs[i].value;
                      }
                    }
                    document.getElementById("boardtime").value = rVal;
                    }
                    </script>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName1" class="col-sm-2 control-label">작성자명 : </label>
                <div class="col-sm-10">
                    <!-- 작성자명 입력 상자 -->
                    <input class="form-control" name="boardUser" id="name" value="<?php echo $userName;?>" readonly type="text" />
                </div>
            </div>

            <div>
                &nbsp;&nbsp;&nbsp;
                <!-- 글 입력 버튼 -->
                <input class="btn btn-primary" type="submit" value="글 입력"></input>
                &nbsp;&nbsp;
                <!-- 입력 내용 초기화 버튼 -->
                <button class="btn btn-primary" type="reset" value="초기화">초기화</button>
                &nbsp;&nbsp;
                <!-- 리스트로 돌아가는 버튼 -->
                <a class="btn btn-primary" href="board_list.php">리스트로 돌아가기</a>
            </div>

        <script type="javascript">
            //id가 XX인 객체에 변화가 생기면 checkXX 함수를 변화된 객체의 값을 매개로 호출
            /*$("#password").change(function(){
                checkPassword($('#password').val());
            });
            $("#Title").change(function(){
                checkTitle($('#Title').val());
            });
            $("#boardstart").change(function(){
                checkTitle($('#boardstart').val());
            });
            $("#boarddestination").change(function(){
                checkTitle($('#boarddestination').val());
            });
            $("#boardtime").change(function(){
                checkTitle($('#boardtime').val());
            });
            $("#name").change(function(){
                checkName($('#name').val());
            });*/
            //입력된 변수의 길이를 참조하여 조건문을 통해 최소 입력 길이 유효성 검사를 하는 함수
            function ckeck_everything(){
              if (!checkboardTitle(form.boardTitle.value)) {
                  return false;
              }
              if (!checkboardstart(form.boardstart.value)) {
                  return false;
              }
              if (!checkboarddestination(form.boarddestination.value)) {
                  return false;
              }
              return true;
            }
              /*if (!checkboardtime(form.boardtime.value)) {
                  return false;
              }*/
              function checkExist(value, dataName) {
                  if (value == "") {
                      alert(dataName + " 선택해주세요!");
                      return false;
                  }
                  return true;
              }
              function checkboardTitle(boardTitle) {
                  //Id가 입력되었는지 확인하기
                  if (!checkExist(boardTitle, "글 제목을"))
                      return false;

                  var boardTitleRegExp = /^[가-힣]{2,10}$/; //아이디 유효성 검사
                  if (boardTitleRegExp.test(boardTitle)) {
                      alert("글 제목 양식이 어긋납니다!");
                      form.boardTitle.value = "";
                      form.boardTitle.focus();
                      return false;
                  }
                 return true; //확인이 완료되었을 때
              }
              function checkboardstart(boardstart) {
                    //Id가 입력되었는지 확인하기
                    if (!checkExist(boardstart, "출발지를"))
                        return false;

                    var boardstartRegExp = /^[가-힣]{2,12}$/; //아이디 유효성 검사
                    if (boardstartRegExp.test(boardstart)) {
                        alert("글 제목 양식이 어긋납니다!");
                        form.boardstart.value = "";
                        form.boardstart.focus();
                        return false;
                    }
                   return true; //확인이 완료되었을 때
                }
                function checkboarddestination(boarddestination) {
                      //Id가 입력되었는지 확인하기
                      if (!checkExist(boarddestination, "도착지를"))
                          return false;

                      var boarddestinationRegExp = /^[가-힣]{2,12}$/; //아이디 유효성 검사
                      if (boarddestination.test(boarddestination)) {
                          alert("글 제목 양식이 어긋납니다!");
                          form.boarddestination.value = "";
                          form.boarddestination.focus();
                          return false;
                      }
                     return true; //확인이 완료되었을 때
                  }
            /*function checkboardtime(boardtime) {
                if(boardtime.strTime <= strTime) {
                    alert('지금 또는 과거를 입력할수 없습니다.');
                    //$('#boardtime').val('').focus();
                    return false;
                } else {
                    return true;
                }
            }*/



        </script>
      </form>
        <script type="text/javascript" src="js/bootstrap.js"></script>
&nbsp;&nbsp;
<br><br><br><br><br>
<script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- Section -->

</body>
</html>
