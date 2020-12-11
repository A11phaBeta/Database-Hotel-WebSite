<?php

require_once('./modules/header.php');

session_start();
if(isset($_SESSION['user_id'])){
    echo "<script>alert('잘못된 접근 입니다!');</script>";
    echo "<meta http-equiv='refresh' content='0.1; URL=./?'>";
}

?>

<article class="container-fluid">

    <div class="container-fluid login-form" id="contact">
            <h4>회원 로그인</h4>
            <div class="intro-content">
                <form action="./apis/apiControl.php/?login" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" id="exampleFormControlInput1" placeholder="아이디를 입력해주세요.">
                    </div>
                    <div class="form-group">
                        
                        <input type="password" class="form-control" name="pw" id="exampleFormControlInput1" placeholder="비밀번호를 입력해주세요.">
                    </div>
                    <div class="form-group">  
                        아직 계정이 없으신가요? <a href="./?signup">가입하기</a>
                    </div>
                    <div class="form-group">  
                        계정을 잊으셨나요? <a href="">아이디/비밀번호 찾기</a>
                    </div>

                    <input type="hidden" name="Return" value="login">
                    <button type="submit" class="btn btn-primary">로그인</button>
                </form>
            </div>

            
        </div>

</article>

<?php

require_once('./modules/footer.php');

?>