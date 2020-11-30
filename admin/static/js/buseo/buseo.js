document.getElementById('id-buseo-insert').addEventListener('click',function(){

    var formData = new FormData();

    formData.append('buseoName', document.getElementById('id-buseo-name-insert').value); //append file to formData object

    $.ajax({
        url: "/venus/admin/db/buseo/insert.php",
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
for(var i=0;i<document.getElementsByClassName('buseo-edit').length;i++){
    document.getElementsByClassName('buseo-edit')[i].addEventListener('click',function(){
        var formData = new FormData();
    var buseoId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('buseoId', buseoId); //append file to formData object
    formData.append('buseoName', document.getElementById('id-buseo-name-'+buseoId).value); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/buseo/edit.php",
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
for(var i=0;i<document.getElementsByClassName('buseo-delete').length;i++){
    document.getElementsByClassName('buseo-delete')[i].addEventListener('click',function(){
        var formData = new FormData();
    var buseoId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('buseoId', buseoId); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/buseo/delete.php",
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