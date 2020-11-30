document.getElementById('id-deductible-insert').addEventListener('click',function(){

    var formData = new FormData();

    formData.append('deductibleName', document.getElementById('id-deductible-name-insert').value); //append file to formData object

    $.ajax({
        url: "/venus/admin/db/salary/deductible/insert.php",
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
for(var i=0;i<document.getElementsByClassName('deductible-edit').length;i++){
    document.getElementsByClassName('deductible-edit')[i].addEventListener('click',function(){
        var formData = new FormData();
    var deductibleId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('deductibleId', deductibleId); //append file to formData object
    formData.append('deductibleName', document.getElementById('id-deductible-name-'+deductibleId).value); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/salary/deductible/edit.php",
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
for(var i=0;i<document.getElementsByClassName('deductible-delete').length;i++){
    document.getElementsByClassName('deductible-delete')[i].addEventListener('click',function(){
        var formData = new FormData();
    var deductibleId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('deductibleId', deductibleId); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/salary/deductible/delete.php",
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