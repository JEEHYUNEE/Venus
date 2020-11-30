
    // var file = document.getElementById("id-admin-profileImg").files[0]; //fetch file
    // formData.append('fileToUpload', file); //append file to formData object
document.getElementById('id-excel-insert').addEventListener('click',function(){
    var file=document.getElementById("id-salary-excel").files[0]; //fetch file
    var formData = new FormData();
    formData.append('fileToUpload', file);
    
    $.ajax({
        url: "/venus/admin/db/salary/insert-excel.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("급여등록이 완료되었습니다...");
                location.reload();
            }
        }
     });
});