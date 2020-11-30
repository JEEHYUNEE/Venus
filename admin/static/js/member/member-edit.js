function editMember(){
    
    var file = document.getElementById("id-member-profileImg").files[0]; //fetch file

    var formData = new FormData();

    formData.append('memberId', document.getElementById('id-member-memberId').value); //append file to formData object
    if(document.getElementById('id-member-password').value!="")
        formData.append('password', document.getElementById('id-member-password').value); //append file to formData object
    formData.append('name', document.getElementById('id-member-name').value); //append file to formData object
    formData.append('birthDate', document.getElementById('id-member-birthDate').value); //append file to formData object
    formData.append('phone', document.getElementById('id-member-phone').value); //append file to formData object
    formData.append('email', document.getElementById('id-member-email').value); //append file to formData object
    formData.append('address', document.getElementById('id-member-addressZipcode').value+"/"+document.getElementById('id-member-address').value+"/"+document.getElementById('id-member-addressDetail').value); //append file to formData object
    formData.append('fileToUpload', file); //append file to formData object

    
    $.ajax({
        url: "/venus/admin/db/member/edit.php",
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

    formData.append('memberId', document.getElementById('id-member-memberId').value); //append file to formData object

    $.ajax({
        url: "/venus/admin/db/member/delete.php",
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
document.getElementById('id-member-zipcode-btn').addEventListener('click',function(){
    new daum.Postcode({

        oncomplete:function(data) {

            jQuery("#postcode1").val(data.postcode1);

            jQuery("#postcode2").val(data.postcode2);

            jQuery("#id-member-addressZipcode").val(data.zonecode);

            jQuery("#id-member-address").val(data.address);
            
            jQuery("#id-member-addressDetail").val("");

            jQuery("#address_etc").focus();

            console.log(data);

        }

    }).open();
});
document.getElementById('id-member-edit').addEventListener('click', editMember);
document.getElementById('id-member-delete').addEventListener('click', deleteMember);
document.getElementById('accordionSidebar').style.display="none";