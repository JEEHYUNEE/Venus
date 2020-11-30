document.getElementById('id-insert').addEventListener('click',function(){
    var formData = new FormData();
    formData.append('fileToUpload', document.getElementById("id-cv").files[0]);
    formData.append('memberId', document.getElementById("id-memberId").value);
    formData.append('cvName',document.getElementById('id-cvName').value);
    
    if(document.getElementById('id-cv').files[0]==null){
        alert("파일을 첨부해주세요");
    }else{
        $.ajax({
            url: "/venus/db/cv/insert.php",
            type: "POST",
            data: formData,
            cache : false,
            processData: false, 
            contentType: false, 
            success: function (msg) {
                if(msg=="SUCCESS"){
                    alert("이력서 등록이 완료되었습니다.");
                    window.close();
                    opener.parent.location.reload();
                }
            }
         });
    }
    
});