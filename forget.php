
<html lang="en">
    <head>
        <title>ID/PW 찾기</title>
        <!-- 로그인/회원가입 css 따로 추가했음 -->
        <link rel="stylesheet" href="static/css/forget_.css">
    </head>
    <body>
        <div class="wrap">
            <div id="id-form" class="form-wrap">
                <div class="button-wrap">
                    <div id="btn"></div>
                    <button id='id-forget-btn' type="button" class="togglebtn">ID 찾기</button>
                    <button id='pw-forget-btn' type="button" class="togglebtn">PW 찾기</button>
                </div>
                <h3 id="title" class="social-icons">ID 찾기</h3>
                <form id="id-forget-form" action="" class="input-group" >
                    <input id="id-forget-name" type="text" class="input-field" placeholder="이름" required>
                    <input id="id-forget-email" type="text" class="input-field" placeholder="메일" required>
                    <input id="id-forget-memberType-normal" type="radio" class="checkbox" name="login-type" checked><div class="radio-text">일반회원</div>
                    <input id="id-forget-memberType-company" type="radio" class="checkbox" name="login-type"><div class="radio-text">기업회원</div>
                    <span><a href="./login-regist.php">Login/Register</a></span>
                    <button type="button" id="id-forget" class="submit">SUBMIT</button>
                </form>
                <form id="pw-forget-form" action="" class="input-group">
                    <input id='pw-forget-id' type="text" class="input-field" placeholder="아이디" required>
                    <input type="text" id="pw-forget-name" class="input-field" placeholder="이름" required>
                    <input type="text" id="pw-forget-email" class="input-field" placeholder="메일" required>
                    <input id='pw-forget-memberType-normal' type="radio" class="checkbox" name="login-type" checked><div  class="radio-text">일반회원</div>
                    <input id='pw-forget-memberType-company' type="radio" class="checkbox" name="login-type"><div  class="radio-text">기업회원</div>
                    <span><a href="./login-regist.php">Login/Register</a></span>
                    <button type="button" id="pw-forget" class="submit">SUBMIT</button>
                </form>
                <!-- 홈화면 back -->
                <a href="index.php" class="back-btn">HOME</a>
            </div>
        </div>

        <script src="static/js/origin/jquery-3.3.1.min.js "></script>
        <script src="static/js/member/pw-forget.js "></script>
        <script src="static/js/member/id-forget.js "></script>
        <script src="static/js/member/forget-regist.js "></script>
    </body>
</html>