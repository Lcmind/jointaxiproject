<?php
    session_start();
    $idx = isset($_SESSION["idx"])? $_SESSION["idx"]:"";
  $userID = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
  if($idx == 1){
      }else{echo "
          <script type=\"text/javascript\">
              alert(\"관리자가 아닙니다.\");
              location.href = \"index.php\";
          </script>
      ";
  };
$u_idx = $_GET["idx"];
/* DB 연결 */
$conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b2309899f63726", "fc8f7b8f", "heroku_d98212802736d5a");

/* 쿼리 작성 */
$sql = "SELECT * from user where idx='$u_idx';";

/* 쿼리 전송 */
$result = mysqli_query($conn, $sql);

/* 결과 가져오기 */
$array = mysqli_fetch_array($result);

?>
<html>
<style type="text/css">
  body,select,option,button{font-size:16px}
  input{border:1px solid #999;font-size:14px;padding:5px 10px}
  input,button,select,option{vertical-align:middle}
  form{width:700px;margin:auto}
  input[type=checkbox]{width:20px;height:20px}
  span{font-size:14px;color:#f00}
  legend{font-size:20px;text-align:center}
  p span{display:block;margin-left:130px}
  button{cursor:pointer}
  .txt{display:inline-block;width:120px}
  .btn{background:#fff;border:1px solid #999;font-size:14px;padding:4px 10px}
  .btn_wrap{text-align:center}
  .email_sel{width:120px;height:28px}
  .postal_code{width:100px;margin-bottom:5px}
  .addr1{width:300px;margin-bottom:5px}
  .addr2{width:300px;margin-bottom:5px}
</style>
<form name="edit_form" action="admin_update_ok.php" method="post" onsubmit="return edit_check1()">
<fieldset>
    <legend>정보 수정</legend>
    <input type="hidden" name="idx" value="<?php echo $u_idx; ?>"/>
    <p>
        <div class="txt">이름</div>
        <?php echo $array["userName"]; ?>
    </p>

    <p>
        <div class="txt">아이디</div>
        <?php echo $array["userID"]; ?>
    </p>

    <p>
        <label for="pwd" class="txt">비밀번호</label>
        <input type="password" name="pwd" id="pwd" class="pwd">
        <br>
        <span class="err_pwd">* 비밀번호는 영문 대소문자와 숫자로 이루어진 4~12자리만 입력할 수 있습니다.</span>
    </p>

    <p>
        <label for="repwd" class="txt">비밀번호 확인</label>
        <input type="password" name="repwd" id="repwd" class="repwd">
        <br>
        <span class="err_repwd"></span>
    </p>
    <?php
        // explode("기준 문자", "어떤 문장에서");
        $email = explode("@", $array["email"]);
    ?>
    <p>
        <label for="" class="txt">이메일</label>
        <input type="text" name="email_id" id="email_id" class="email_id" value="<?php echo $email[0]; ?>"> @
        <input type="text" name="email_dns" id="email_dns" class="email_dns" value="<?php echo $email[1]; ?>">

        </select>
    </p>

    <p>
        <label for="phoneNum" class="txt">전화번호</label>
        <input type="text" name="phoneNum" id="phoneNum" class="phoneNum" value="<?php echo $array["phoneNum"]; ?>">
        <br>
        <span class="err_phoneNum">"-"없이 숫자만 입력</span>
    </p>

    <p class="btn_wrap">
        <button type="button" class="btn" onclick="history.back()">이전으로</button>
        <button type="button" class="btn" onclick="location.href='index.php'">홈으로</button>
        <button type="button" class="btn" onclick="del_check()">회원탈퇴</button>
        <button type="submit" class="btn">정보수정</button>
    </p>
    <script type="text/javascript">
    function edit_check1(){

        var pwd = document.getElementById("pwd");
        var repwd = document.getElementById("repwd");
        var phoneNum = document.getElementById("phoneNum");

        var password1RegExp = /^[a-zA-z0-9]{4,12}$/; //비밀번호 유효성 검사
        if (!password1RegExp.test(password)) {
            var err_txt = document.querySelector(".err_pwd");
            err_txt.textContent = "비밀번호는 영문 대소문자와 숫자로 이루어진 4~12자리로 입력해야합니다!";
            form.pwd.value = "";
            form.repwd.value = "";
            form.repwd.focus();
            return false;
        }

        //아이디와 비밀번호가 같을 때..
        if (userID == pwd) {
            alert("아이디와 비밀번호는 같을 수 없습니다!");
            form.password.value = "";
            form.password1.value = "";
            form.password1.focus();
            return false;
        }

        if(pwd.value){
            if(pwd.value != repwd.value){
                var err_txt = document.querySelector(".err_repwd");
                err_txt.textContent = "두 비밀번호가 맞지 않습니다.";
                repwd.focus();
                return false;
            };
        };

        if(phoneNum.value){
            var reg_phoneNum = /^[0-9]+$/g;
            if(!reg_phoneNum.test(phoneNum.value)){
                var err_txt = document.querySelector(".err_phoneNum");
                err_txt.textContent = "전화번호는 숫자만 입력할 수 있습니다.";
                phoneNum.focus();
                return false;
            };
        };
    };

    function change_email(){
        var email_dns = document.getElementById("email_dns");
        var email_sel = document.getElementById("email_sel");

        var userID = email_sel.options.selectedIndex;

        var sel_txt = email_sel.options[idx].value;
        email_dns.value = sel_txt;
    };

    function addr_search(){
        window.open("search_addr.php", "", "width=600, height=400, left=0, top=0");
    };

    function del_check(){
        var i = confirm("정말 탈퇴시키겠습니까?");

        if(i == true){
            location.href = "admin_delete.php?idx=<?php echo $u_idx; ?>";
            //location.href = "member_delete.php";
        };
    };
    </script>
</fieldset>
</form>
</html>
