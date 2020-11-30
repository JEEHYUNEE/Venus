// login-regist 화면에서 상단에 로그인버튼/등록버튼 클릭했을때 일어나는 action화면

var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");


function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0";
    document.getElementById('id-form').style.height = "480px";
    document.getElementById('title').innerHTML = "Login";
}

function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "120px";
    document.getElementById('title').innerHTML = "Register";
    document.getElementById('id-form').style.height = "620px";
}
document.getElementById('id-login-btn').addEventListener('click',login);
document.getElementById('id-register-btn').addEventListener('click',register);
document.getElementById('id-register-memberType-company').addEventListener('click',function(){
    if(document.getElementById('title').innerHTML=="Register")
    {
        document.getElementById('id-register-crn').removeAttribute("hidden");
        document.getElementById('id-register-email').setAttribute("hidden","hidden");
    }
});
document.getElementById('id-register-memberType-normal').addEventListener('click',function(){
    if(document.getElementById('title').innerHTML=="Register")
    {
        document.getElementById('id-register-crn').setAttribute("hidden","hidden");
        document.getElementById('id-register-email').removeAttribute("hidden");
    }
});
