function editMember(){
    
    var formData = new FormData();

    var type= document.getElementById('id-rm-memberType'); //append file to formData object
    var typeId=type.options[type.selectedIndex].id.split("-")[1];

    var buseo= document.getElementById('id-rm-buseo'); //append file to formData object
    var buseoId=buseo.options[buseo.selectedIndex].id.split("-")[1];

    formData.append('rmId', document.getElementById('id-rm-rmId').value); //append file to formData object
    formData.append('workPosition', document.getElementById('id-rm-workPosition').value); //append file to formData object
    formData.append('workPlace', document.getElementById('id-rm-workPlace').value); //append file to formData object
    formData.append('enteredDate', document.getElementById('id-rm-enteredDate').value); //append file to formData object
    formData.append('bankName', document.getElementById('id-rm-bankName').value); //append file to formData object
    formData.append('accountHolder', document.getElementById('id-rm-accountHolder').value); //append file to formData object
    formData.append('account', document.getElementById('id-rm-account').value); //append file to formData object
    formData.append('memberType', typeId); //append file to formData object
    formData.append('buseoId', buseoId); //append file to formData object

    $.ajax({
        url: "/venus/admin/db/regular-member/edit.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("수정이 완료되었습니다..");
                window.close();
                opener.parent.location.reload();
            }
        }
     });

}
function deleteMember(){

    var formData = new FormData();

    var formData = new FormData();
    formData.append('rmId', document.getElementById('id-rm-rmId').value); //append file to formData object

    $.ajax({
        url: "/venus/admin/db/regular-member/delete.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("삭제가 완료되었습니다..");
                window.close();
                opener.parent.location.reload();
            }
        }
     });
}

document.getElementById('id-rm-edit').addEventListener('click', editMember);
document.getElementById('id-rm-delete').addEventListener('click', deleteMember);
document.getElementById('accordionSidebar').style.display="none";