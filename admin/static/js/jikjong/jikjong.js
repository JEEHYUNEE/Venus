document.getElementById('id-jikjong-insert').addEventListener('click',function(){

    var formData = new FormData();

    formData.append('jikjongName', document.getElementById('id-jikjong-name-insert').value); //append file to formData object

    $.ajax({
        url: "/venus/admin/db/jikjong/insert.php",
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

for(var i=0;i<document.getElementsByClassName('jikjong-edit').length;i++){
    document.getElementsByClassName('jikjong-edit')[i].addEventListener('click',function(){
        var formData = new FormData();
    var jikjongId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('jikjongId', jikjongId); //append file to formData object
    formData.append('jikjongName', document.getElementById('id-jikjong-name-'+jikjongId).value); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/jikjong/edit.php",
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
for(var i=0;i<document.getElementsByClassName('jikjong-delete').length;i++){
    document.getElementsByClassName('jikjong-delete')[i].addEventListener('click',function(){
        var formData = new FormData();
    var jikjongId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('jikjongId', jikjongId); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/jikjong/delete.php",
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