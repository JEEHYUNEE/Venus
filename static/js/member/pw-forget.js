// 로그인 버튼을 눌렀을때 api를 호출하는 js

document.getElementById('pw-forget').addEventListener('click', function() {
    if (document.getElementById('pw-forget-memberType-normal').checked == true) {
        var memberType = "MEMBER";
    } else {
        var memberType = "COMPANY";
    }


    var formData = new FormData();
    formData.append('name', document.getElementById('pw-forget-name').value); //append file to formData object
    formData.append('email', document.getElementById('pw-forget-email').value); //append file to formData object

    if (memberType == "MEMBER") {
        $.ajax({
            // 서버에 올리면 url 수정해야함..
            url: "/venus/db/member/pw-forget.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            error: function(request, status, error) {
                alert(error);
            },
            success: function(msg) {
                var id = document.getElementById('pw-forget-id').value;
                if (msg == id) {
                    window.open("/venus/pw-update.php?id=" + id, "proposalComment", "width=600,height=400,resizable=yes,scrollbars=yes,resizable=yes");
                }
            }
        });
    } else {
        $.ajax({
            url: "/venus/db/company/pw-forget.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(msg) {
                var id = document.getElementById('pw-forget-id').value;
                if (msg == id) {
                    //alert(id);
                    window.open("/venus/pw-update-company.php?id=" + id, "proposalComment", "width=600,height=400,resizable=yes,scrollbars=yes,resizable=yes");
                }
            }
        });
    }

});