// 로그인 버튼을 눌렀을때 api를 호출하는 js

document.getElementById('id-forget').addEventListener('click', function() {
    if (document.getElementById('id-forget-memberType-normal').checked == true) {
        var memberType = "MEMBER";
    } else {
        var memberType = "COMPANY";
    }

    var formData = new FormData();

    formData.append('name', document.getElementById('id-forget-name').value); //append file to formData object
    formData.append('email', document.getElementById('id-forget-email').value); //append file to formData object

    if (memberType == "MEMBER") {
        $.ajax({
            // 서버에 올리면 url 수정해야함..
            url: "/venus/db/member/id-forget.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            error: function(request, status, error) {
                alert(error);
            },
            success: function(msg) {
                alert("찾기결과 : " + msg);
            }
        });
    } else {
        $.ajax({
            url: "/venus/db/company/id-forget.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(msg) {
                alert("찾기결과 : " + msg);
            }
        });
    }

});