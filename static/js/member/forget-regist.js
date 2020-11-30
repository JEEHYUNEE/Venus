// login-regist 화면에서 상단에 로그인버튼/등록버튼 클릭했을때 일어나는 action화면

var x = document.getElementById("id-forget-form");
var y = document.getElementById("pw-forget-form");
var z = document.getElementById("btn");


function id_forget() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0";
    document.getElementById('id-form').style.height = "480px";
    document.getElementById('title').innerHTML = "Forget ID";
}

function pw_forget() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "120px";
    document.getElementById('title').innerHTML = "Forget PW";
    document.getElementById('id-form').style.height = "520px";
}

document.getElementById('id-forget-btn').addEventListener('click', id_forget);
document.getElementById('pw-forget-btn').addEventListener('click', pw_forget);

document.getElementById('id-forget-memberType-company').addEventListener('click', function() {
    document.getElementById('id-forget-name').placeholder = '담당자명';
    document.getElementById('id-forget-email').placeholder = '담당자메일';
});
document.getElementById('id-forget-memberType-normal').addEventListener('click', function() {
    document.getElementById('id-forget-name').placeholder = '이름';
    document.getElementById('id-forget-email').placeholder = '메일';
});

document.getElementById('pw-forget-memberType-company').addEventListener('click', function() {
    document.getElementById('pw-forget-name').placeholder = '담당자명';
    document.getElementById('pw-forget-email').placeholder = '담당자메일';
});
document.getElementById('pw-forget-memberType-normal').addEventListener('click', function() {
    document.getElementById('pw-forget-name').placeholder = '이름';
    document.getElementById('pw-forget-email').placeholder = '메일';
});

function start() {
    id_forget();
}
window.onload = start;