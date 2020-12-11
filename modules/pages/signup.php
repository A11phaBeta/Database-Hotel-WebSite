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
            <h4>회원정보입력</h4>
            
           

            <div class="intro-content">
                <form action="./apis/apiControl.php/?signup" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput0">성명 입력 (필수)</label>
                        <input type="text" class="form-control" name="name" id="exampleFormControlInput0" placeholder="성명을 입력해주세요." required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">아이디 입력 (필수)</label>
                        <input type="text" class="form-control" name="id" id="exampleFormControlInput1" placeholder="아이디를 입력해주세요." required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">비밀번호 입력 (필수)</label>
                        <input type="password" class="form-control" name="pw" id="exampleFormControlInput2" placeholder="비밀번호를 입력해주세요." required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">비밀번호 재확인 (필수)</label>
                        <input type="password" class="form-control" name="repw" id="exampleFormControlInput3" placeholder="비밀번호를 재입력해주세요."required>
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlInput4">생년월일 입력 (필수)</label>
                        <input type="date" class="form-control" name="birth" id="exampleFormControlInput4" value="" placeholder="생년월일을 입력해주세요."required>
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlInput6">연락처 입력 (필수)</label>
                        <input type="phone" class="form-control" name="contact" id="exampleFormControlInput6" value="" placeholder="연락처를 입력해주세요." required>
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlInput7">이메일 입력 (필수)</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput7" value="" placeholder="이메일을 입력해주세요."required>
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlInput8">주소 입력 (필수)</label>
                        <input type="text" class="form-control" name="address" id="exampleFormControlInput8" value="" placeholder="주소를 입력해주세요."required>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck">
                            개인정보수집 및 이용약관에 동의하십니까? <a href="">약관보기</a>
                        </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">회원가입</button>
                </form>
            </div>

            
        </div>

</article>

<?php

require_once('./modules/footer.php');

?>