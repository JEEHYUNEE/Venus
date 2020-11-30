// 로그인 버튼을 눌렀을때 api를 호출하는 js

document.getElementById('id-admin-login').addEventListener('click', function () {
    var formData = new FormData();

    formData.append('adminId', document.getElementById('id-admin-adminId').value); //append file to formData object
    formData.append('password', document.getElementById('id-admin-password').value); //append file to formData object
   
    $.ajax({
        url: "/venus/admin/db/admin/login.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (msg) {
            if (msg == "SUCCESS") {
                alert("로그인성공");
                location.href="index.php";
                
            } else {
                alert("로그인실패");
            }
        }
    });
});