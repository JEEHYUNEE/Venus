document.getElementById('id-register').addEventListener('click',function(){
    if(document.getElementById('id-register-memberType-normal').checked==true){
        var memberType = "MEMBER";
    }else{
        var memberType= "COMPANY";
    }   
    //form data만들깅~
    var formData = new FormData();
    formData.append('id', document.getElementById('id-register-id').value); //append file to formData object
    formData.append('password', document.getElementById('id-register-password').value); //append file to formData object
    formData.append('name', document.getElementById('id-register-name').value); //append file to formData object
    formData.append('phone', document.getElementById('id-register-phone').value); //append file to formData object
    if(memberType=="COMPANY"){
        formData.append('crn', document.getElementById('id-register-crn').value); //append file to formData object
    }else{
        formData.append('email', document.getElementById('id-register-email').value); //append file to formData object
    }

    //ajax 비동기통신
    if(memberType=="MEMBER"){
        $.ajax({
            url: "/venus/db/member/insert.php",
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function (msg) {
                if(msg=="SUCCESS"){
                    alert("회원가입성공");
                    location.reload();
                }else{
                    alert("회원가입실패["+msg+"]");
                }
            }
         });
    }else{
        $.ajax({
            url: "/venus/db/company/insert.php",
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function (msg) {
                if(msg=="SUCCESS"){
                    alert("회원가입성공");
                    location.reload();
                }else{
                    alert("회원가입실패["+msg+"]");
                }
            }
         });
    }
    
});


