
<html lang="en">
    <head>
        <title>로그인 / 회원가입</title>
        <!-- 로그인/회원가입 css 따로 추가했음 -->
        <link rel="stylesheet" href="static/css/login_regist.css">
    </head>
    <body>
        <div class="wrap">
            <div id="id-form" class="form-wrap">
                <div class="button-wrap">
                    <div id="btn"></div>
                    <button id='id-login-btn' type="button" class="togglebtn">LOG IN</button>
                    <button id='id-register-btn' type="button" class="togglebtn">REGISTER</button>
                </div>
                <h3 id="title" class="social-icons">Login</h3>
                <form id="login" action="" class="input-group" >
                    <input id="id-login-id" type="text" class="input-field" placeholder="ID" required>
                    <input id="id-login-password" type="password" class="input-field" placeholder="Password" required>
                    <input id="id-login-memberType-normal" type="radio" class="checkbox" name="login-type" checked><div class="radio-text">일반회원</div>
                    <input id="id-login-memberType-company" type="radio" class="checkbox" name="login-type"><div class="radio-text">기업회원</div>
                    <span><a href="./forget.php">forget ID/PASSWORD</a></span>
                    <input type="submit" id="id-login" class="submit" value="LOGIN">
                </form>
                <form id="register" action="" class="input-group">
                    <input id='id-register-id' type="text" class="input-field" placeholder="ID" required>
                    <input id='id-register-crn' type="text" class="input-field" placeholder="Company Registration Number" required
                    hidden>
                    <input type="text" id="id-register-email" class="input-field" placeholder="Email" required>
                    <input type="password" id="id-register-password" class="input-field" placeholder="Password" required>
                    <input type="text" id="id-register-name" class="input-field" placeholder="Name" required>
                    <input type="text" id="id-register-phone" class="input-field" placeholder="Phone Number" required>
                    <input id='id-register-memberType-normal' type="radio" class="checkbox" name="login-type" checked><div  class="radio-text">일반회원</div>
                    <input id='id-register-memberType-company' type="radio" class="checkbox" name="login-type"><div  class="radio-text">기업회원</div>
                    <input type="submit" id='id-register' class="submit" value="REGISTER">
                </form>
                <!-- 홈화면 back -->
                <a href="index.php" class="back-btn">HOME</a>
            </div>
        </div>

        <script src="static/js/origin/jquery-3.3.1.min.js "></script>
        <script src="static/js/member/register.js "></script>
        <script src="static/js/member/login.js "></script>
        <script src="static/js/member/login-regist.js "></script>
    </body>
</html>