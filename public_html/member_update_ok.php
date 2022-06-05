<?php
/* 세션 시작 */
session_start();
$userID = $_SESSION["userID"];
// echo  $userID;
// exit;


/* 이전 페이지에서 값 가져오기 */
$password = $_POST["password"];
$password1 = $_POST["password1"];
$email = $_POST["email"];
$phoneNum =$_POST["phoneNum"];

// 값 확인
//echo "비밀번호 : ".$password."<br>";
//echo "비밀번호 확 : ".$password1."<br>";
//echo "이메일 : ".$email."<br>";
//echo "전화번호 : ".$phoneNum."<br>";
// exit;

function package($password,$email,$phoneNum,$password1,$userID){

	$phonePattern = '/^[0-9]{11}$/';
	$passwordPattern='/^[a-zA-z0-9]{4,12}$/';
	$emailPattern='/^[A-Za-z0-9_]+[A-Za-z0-9]*[@]{1}[A-Za-z0-9]+[A-Za-z0-9]*[.]{1}[A-Za-z]{1,3}$/';

if(preg_match($emailPattern, $email, $match)){
	echo "이메일 : ".$email."<br>";
	var_dump($match);
	echo "<br>";
} else {
	echo "<script>alert('올바른 이메일이 아닙니다. 다시 입력해 주세요.');history.back(-1);</script>";
	return false;
}
if(preg_match($passwordPattern, $password, $match)){
	echo "비밀번호 : ".$password."<br>";
	var_dump($match);
	echo "<br>";
} else {
	echo "<script>alert('올바른 비밀번호가 아닙니다. 다시 입력해 주세요.');history.back(-1);</script>";
	return false;
}
if($password != $password1){
	echo "<script>alert('비밀번호가 같지 않습니다.');history.back(-1);</script>";
	return false;
}
if($password == $userID){
	echo "<script>alert('아이디와 비밀번호는 같을 수 없습니다.');history.back(-1);</script>";
	return false;
}
	if(preg_match($phonePattern, $phoneNum, $match)){
		echo "전화번호 : ".$phoneNum."<br>";
		var_dump($match);
	} else {
		echo "<script>alert('올바른 전화번호가 아닙니다. 다시 입력해 주세요.');history.back(-1);</script>";
		return false;
	}
return true;
}
/*if (!$password!=$password1) {
  echo "비밀번호 : ".$password."<br>";
	var_dump($match);
	echo "<br>";
}else {
  alert("비밀번호와 비밀번호 확인이 일치하지 않습니다!");
}
if(!$password==$userID){
  echo "비밀번호 : ".$password."<br>";
	var_dump($match);
	echo "<br>";
}else{
  alert("비밀번호가 아이디와 동일합니다.");
}*/
/*  DB 접속 */
$conn = mysqli_connect("localhost", "jointaxi", "1234", "joindb");


/* 쿼리 작성 */
// update 테이블명 set 필드명=값, 필드명=값, ....;
/*if(!$password!=/^[a-zA-z0-9]{4,12}$/){
  alert("비밀번호는 영문 대소문자와 숫자 4~12자리로 입력해야합니다!");
}
elseif (!$password!=$password1) {
  alert("비밀번호와 비밀번호 확인이 일치하지 않습니다!");
}
elseif(!$password==$userID){
  alert("비밀번호가 아이디와 동일합니다.");
}
elseif(!$email !=/^[A-Za-z0-9_]+[A-Za-z0-9]*[@]{1}[A-Za-z0-9]+[A-Za-z0-9]*[.]{1}[A-Za-z]{1,3}$/) {
  alert("이메일 형식이 올바르지 않습니다.");
}
elseif (!$phoneNum !=/^[0-9]{11}$/) {
  alert("휴대폰번호는 숫자 11자리입니.");
}*/
  // code...

  //  $sql = "update user set email='$email', phoneNum='$phoneNum' where userID= $userID;";
//} else{
    $sql = "update user set password='$password', email='$email', phoneNum='$phoneNum' where userID=$userID;";
//};
echo $sql;
// exit;


/* 데이터베이스에 쿼리 전송 */
mysqli_query($conn, $sql);


/* DB(연결) 종료 */
mysqli_close($conn);


/* 리디렉션 */
if( package($password,$email,$phoneNum,$password1,$userID)==true){
echo "
    <script type=\"text/javascript\">
        alert(\"정보가 수정되었습니다.\");
        location.href = \"member_update.php\";
    </script>
";
}
?>
