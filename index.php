<?php
    session_start();

    $userID = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
    $userName = isset($_SESSION["userName"])? $_SESSION["userName"]:"";
    $idx = isset($_SESSION["idx"])? $_SESSION["idx"]:"";
    // echo "Session ID : ".$userID." / Name : ".$userName;
?>

<html lang="ko">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Creative Design landing page.">
    <meta name="author" content="Devcrud">
    <title>JOIN TAXI</title>

    <!-- font icons -->
   

    <!-- Bootstrap + Creative Design main styles -->
	<link rel="stylesheet" href="Join Taxi.css">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="#home">

    <!-- Page Navbar -->
    <nav id="scrollspy" class="navbar page-navbar navbar-light navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="#home"><strong class="text-primary">Join</strong> <span class="text-dark">Taxi</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">HOME</a>
                    </li>
										<li class="nav-item">
											<a class="nav-link" href="#about">PROJECT</a>
										</li>
                    <li class="nav-item">
                        <a class="nav-link" href="#weather">날씨</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testmonial">개발자들</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">연락</a>
                    </li>
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
                                   <?php if($idx== "1"){ ?>
                                     <li class="nav-item ml-md-4">
                                       <a class="nav-link btn btn-primary" href="admin.php">관리자</a>
                                     </li>
                                       <?php }; ?>
																	 <li class="nav-item ml-md-4">
																			 <a class="nav-link btn btn-primary" href="logoutProcess.php">로그아웃</a>
																	 </li>
                                   <li class="nav-item ml-md-4">
																			 <a class="nav-link btn btn-primary" href="member_update.php" method="post"><img src="assets/imgs/mypage.png" width="20" height="20"/></a>
																	 </li>
																 </p>
                             <?php }; ?>
                </ul>
            </div>
        </div>
    </nav><!-- End of Page Navbar -->

    <!-- Page Header -->
    <header id="home" class="header">
        <div class="overlay"></div>
        <div class="header-content">
            <p>건국대학교 텀프로젝트</p>
            <h6>JOIN TAXI</h6>
            <button onclick="location.href='board_list.php#about'"class="btn btn-outline-light">TAXI SHARING
					</button>
        </div>
    </header><!-- End of Page Header -->

    <!-- About Section -->
    <section class="about" id="about">
        <!-- Container -->
        <div class="container">
            <!-- About wrapper -->
            <div class="about-wrapper">
                <div class="after"></div>
                <div class="content">
                    <h5 class="title mb-3">TERM PROJECT</h5>
                    <!-- row -->
                    <div class="row">
                      <div class="col">
                        <p><b>JOIN TAXI</b></p>
                        <p>
                          택시의 노란 이미지과 데이터베이스의 조인에 영감을 받아서 색상은 노란색으로 기본 마크는 외부조인으로 선택하게 되었습니다. 기본적으로 Bootstrap을 사용하였고, Google과 Youtube를 참조 하였으며,
                          서버로는 Heroku를,&nbsp;&nbsp;&nbsp; 데이터베이스는 My SQL을 사용하였습니다.
                        </p>
                      </div>
                        <div class="col">
                            <p><b>TAXI SHARING</b></p>
                            <p>건국대학교 학생들이 충주시내를 가거나 충주 터미널에서 학교로 올때&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 택시를 자주 이용하는데 혼자서 택시를 이용함에 있어 비용적인 측면에서
                               <br />경제적으로 부담을 느낄수 있는 점에 의의하여 개발하였습니다.</p>
                        </div>
                      </div>
                      <div class="row">

                        <div class="col">
                          <p><b>TEAM</b></p>
                            <p>주요기능으로는 메인페이지의 PROJECT, 충주날씨 API, 팀 소개, 실제메일이 오는 연락, 그리고 마무리 단이 있습니다.<br />
                              회원파트에는 로그인, 비밀번호 찾기, 정보수정, 회원 탈퇴, 유효성 검사가 있으며,<br />
                              게시글파트의 게시물 작성, 수정, 삭제, 참여, 참여취소, 탑승인원확인, 작성자 권한으로 팝업확인, 유효성 검사가 있고, <br />
                              마지막으로 관리자파트의 관리자 권한으로 회원 수정, 강제탈퇴, 게시판 삭제, 수정, 참여자 확인, 그리고 수많은 유효성 검사가 있습니다.

                            </p>
                        </div>
                    </div><!-- End of Row -->

                </div>
            </div><!-- End of About Wrapper -->
        </div>  <!-- End of Container-->
     </section><!--End of Section -->


    <!-- section -->
    <section class="weather" id="weather">
        <!-- Container -->
        <div class="container">
            <!-- Row --><!-- 첫번째 날씨 위젯-->
<a id="lbBtn" href="https://www.weather.go.kr/w/index.do" target="_blank"><strong class="text-primary">충주의 날씨</strong></a>

<div id="lb-1" class="lb-weather">
	<iframe  src="https://forecast.io/embed/#lat=37.5266&lon=127.0403&name=Chungju, 충주&color=&font=&units=si" width="100%" height="250px"></iframe>
</div>


        </div><!-- End of Container-->
    </section><!-- End of Section -->

    <!-- Testmonial Section -->
    <section class="text-center pt-5" id="testmonial">
        <!-- Container -->
        <div class="container">
            <h3 class="mt-3 mb-5 pb-5">OUR TEAM</h3>
            <!-- Row -->
            <div class="row">
                <div class="col-sm-10 col-md-4 m-auto">
                    <div class="testmonial-wrapper">
                        <img src="assets/imgs/김의겸.jpg" alt="Client Image">
                        <h6 class="title mb-3">김의겸</h6>
                        <p>건국대학교 글로컬캠퍼스-컴퓨터공학과 3학년-201820869 <br />
                        SQL 및 게시판, 관리자 세션 관리 </p>
                    </div>
                </div>
                <div class="col-sm-10 col-md-4 m-auto">
                    <div class="testmonial-wrapper">
                        <img src="assets/imgs/이상준.jpg" alt="Client Image">
                        <h6 class="title mb-3">이상준</h6>
                        <p>건국대학교 글로컬캠퍼스-컴퓨터공학과 3학년-201820987<br />
                        게시판 데이터 및 SQL 관리</p>
                    </div>
                </div>
                <div class="col-sm-10 col-md-4 m-auto">
                    <div class="testmonial-wrapper">
                        <img src="assets/imgs/이창민.jpg" alt="Client Image">
                        <h6 class="title mb-3">이창민</h6>
                        <p>건국대학교 글로컬캠퍼스-컴퓨터공학과 3학년-201821020<br>
                          <b>LEADER</b> - SQL, CSS, 모든페이지 전체 총괄
                        </br></p>
                    </div>
                </div>
            </div><!-- end of Row -->
        </div><!-- End of Cotanier -->
    </section><!-- End of Testmonial Section -->

    <!-- Contact Section -->
    <section id="contact" class="text-center">
        <!-- container -->
        <div class="container">
            <h1>연락</h1>
            <p class="mb-5">사이트 구성에 있어 필요한 사항이나 피드백은 이쪽으로 연락부탁드립니다.
					<strong><br>>회원탈퇴 문의 또한 메일로 연락부탁드립니다.<</strong></p>

            <!-- Contact form -->
            <form class="gform" action="https://script.google.com/macros/s/AKfycbzlkiinFDeaYISg_O89sVvGosg0FxXdoedv5VRu/exec" method="POST" data-email="">
                <div class="form-row">
                    <div class="col form-group">
                        <input type="text" class="form-control" name="name" placeholder="이름">
                    </div>
                    <div class="col form-group">
                        <input type="email" class="form-control" name="email" placeholder="이메일">
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="message" id="userMessage" cols="30" rows="5" class="form-control" placeholder="메세지를 입력하세요."></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="전 송">
										<script data-cfasync="false" type="text/javascript" src="form-submission-handler.js"></script>
										<div style="display:none" class="thankyou_message">
											<p>
											</p>
											 <p>연락주셔서 감사합니다. 빠른 시일 내에 답변 드리겠습니다🚀</p>
										</div>
                </div>
            </form><!-- End of Contact form -->
        </div><!-- End of Container-->
    </section><!-- End of Contact Section -->

    <!-- Section -->
    <section class="pb-0">
        <!-- Container -->
        <div class="container">
            <!-- Pre footer -->
            <div class="pre-footer">
                <ul class="list">
                    <li class="list-head">
                        <h6 class="font-weight-bold">저작권</h6>
                    </li>
                    <li class="list-body">
                        <p>상업용목적이 아닌 단순 개발용으로 저작권에 문제가 없음을 알립니다.</p>
												<p>
														<strong class="text-dark">MADE BY <a href="https://www.devcrud.com/" style="display:inline">DevCRUD</a></strong>
												</p>

                        <a href="#home"><strong class="text-primary">JOIN</strong> <span class="text-dark">TAXI</span></a>
                    </li>
                </ul>
                <ul class="list">
                    <li class="list-head">
                        <h6 class="font-weight-bold">MAIN LINKS</h6>
                    </li>
                    <li class="list-body">
                        <div class="row">
                            <div class="col">
                                <a href="https://www.kku.ac.kr/mbshome/mbs/wwwkr/index.do">건국대학교</a>

                            </div>
                            <div class="col">
                                <a href="https://tls.kku.ac.kr/login.php">TLS</a>

                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="list">
                    <li class="list-head">
                        <h6 class="font-weight-bold">With Us</h6>
                    </li>
                    <li class="list-body">
                        <p>텀프로젝트용 과제서버</p>
                        <p><i class="ti-location-pin"></i> 충청북도 충주시 충열4길</p>
                        <p><i class="ti-email"></i>  ckealss@naver.com</p>
                        <div class="Only instagram">
                          <a href="https://www.instagram.com/lcmind_24" class="link"><i class="ti-instagram"> lcmind_24</i></a>
                          <a href="https://www.instagram.com/gimmik_yummy/" class="link"><i class="ti-instagram"> gimmik_yummy</i></a>
                          <a href="https://www.instagram.com/juxxn_i/" class="link"><i class="ti-instagram"> juxxn_i</i></a>
                        </div>
                    </li>
                </ul>
            </div><!-- End of Pre footer -->

            <!-- foooter -->
            <footer class="footer">
                <p>Copyright <script>document.write(new Date().getFullYear())</script> &copy; <a href="http://www.devcrud.com">DevCRUD</a></p>
            </footer><!-- End of Footer-->

        </div><!--End of Container -->
    </section><!-- End of Section -->

    <!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Creative Design js -->
    <script src="assets/js/creative-design.js"></script>

</body>
</html>
