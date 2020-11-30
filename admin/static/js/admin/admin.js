function updateAdmin(){
    // alert(this.parentNode.parentNode.id.split("-")[2]);
    // alert("Tq");
    var adminId = this.parentNode.parentNode.id.split("-")[2];

    var formData = new FormData();
    formData.append('adminId', adminId); //append file to formData object
    formData.append('authority', document.getElementById('id-admin-authority-'+adminId).value); //append file to formData object
    formData.append('workingStatus', document.getElementById('id-admin-workingStatus-'+adminId).value); //append file to formData object

     $.ajax({
        url: "/venus/admin/db/admin/authority-edit.php",
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
}
function deleteAdmin(){
    var formData = new FormData();
    var adminId = this.parentNode.parentNode.id.split("-")[2];

    formData.append('adminId', adminId); //append file to formData object

     $.ajax({
        url: "/venus/admin/db/admin/delete.php",
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
}

for(var i=0;i<document.getElementsByClassName('class-admin').length;i++){
    document.getElementsByClassName('class-admin')[i].addEventListener('click',function(){ 
        window.open("admin-edit-form.php?id="+this.parentNode.id.split("-")[2],"proposalComment","width=900,height=800,resizable=yes,scrollbars=yes,resizable=yes");
    });
}

for(var i=0;i<document.getElementsByClassName('class-admin-authority-update').length;i++){
    document.getElementsByClassName('class-admin-authority-update')[i].addEventListener('click',updateAdmin);
}
for(var i=0;i<document.getElementsByClassName('class-admin-authority-delete').length;i++){
    document.getElementsByClassName('class-admin-authority-delete')[i].addEventListener('click',deleteAdmin);
}