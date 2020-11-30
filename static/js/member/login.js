// 로그인 버튼을 눌렀을때 api를 호출하는 js

document.getElementById('id-login').addEventListener('click',function(){
    if(document.getElementById('id-login-memberType-normal').checked==true){
        var memberType = "MEMBER";
    }else{
        var memberType= "COMPANY";
    }
    
    var formData = new FormData();

    formData.append('id', document.getElementById('id-login-id').value); //append file to formData object
    formData.append('password', document.getElementById('id-login-password').value); //append file to formData object
    
    if(memberType=="MEMBER"){
        $.ajax({
            // 서버에 올리면 url 수정해야함..
            url: "/venus/db/member/login.php",
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            error:function(request, status, error){
                alert(error);
            },
            success: function (msg) {
                if(msg=="SUCCESS"){
                    alert("로그인성공");
                    location.href="index.php";
                }else{
                    alert("로그인실패["+msg+"]");
                }
            }
         });
    }else{
        $.ajax({
            url: "/venus/db/company/login.php",
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function (msg) {
                if(msg=="SUCCESS"){
                    alert("로그인성공");
                    location.href="/venus/admin/index.php";
                }else{
                    alert("로그인실패["+msg+"]");
                }
            }
         });
    }

});