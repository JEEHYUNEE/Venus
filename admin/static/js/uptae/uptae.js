document.getElementById('id-uptae-insert').addEventListener('click',function(){

    var formData = new FormData();

    formData.append('uptaeName', document.getElementById('id-uptae-name-insert').value); //append file to formData object

    $.ajax({
        url: "/venus/admin/db/uptae/insert.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("입력이 완료되었습니다..");
                location.reload();
            }
        }
     });
});
for(var i=0;i<document.getElementsByClassName('uptae-edit').length;i++){
    document.getElementsByClassName('uptae-edit')[i].addEventListener('click',function(){
        var formData = new FormData();
    var uptaeId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('uptaeId', uptaeId); //append file to formData object
    formData.append('uptaeName', document.getElementById('id-uptae-name-'+uptaeId).value); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/uptae/edit.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("수정이 완료되었습니다..");
                location.reload();
            }
        }
     });
    });
}
for(var i=0;i<document.getElementsByClassName('uptae-delete').length;i++){
    document.getElementsByClassName('uptae-delete')[i].addEventListener('click',function(){
        var formData = new FormData();
    var uptaeId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('uptaeId', uptaeId); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/uptae/delete.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("삭제가 완료되었습니다..");
                location.reload();
            }
        }
     });
    });
}