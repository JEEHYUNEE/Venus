document.getElementById('pw-update-btn').addEventListener('click', function() {
    var formData = new FormData();
    formData.append('memberId', document.getElementById("update-memberId").value);
    formData.append('password', document.getElementById('update-pw').value);
    $.ajax({
        url: "/venus/db/member/pwUpdate.php",
        type: "POST",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(msg) {
            if (msg == "SUCCESS") {
                alert("비밀번호 수정이 완료되었습니다.");
                window.close();
                location.href = "venus/index.php";
            } else {

            }
        }
    });
});