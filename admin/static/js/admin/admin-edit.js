
document.getElementById('id-admin-edit').addEventListener('click',function(){

    var file = document.getElementById("id-admin-profileImg").files[0]; //fetch file

    var formData = new FormData();
    formData.append('adminId', document.getElementById('id-admin-adminId').value); //append file to formData object
    if(document.getElementById('id-admin-password').value!="")
        formData.append('password', document.getElementById('id-admin-password').value); //append file to formData object
    formData.append('name', document.getElementById('id-admin-name').value); //append file to formData object
    formData.append('nameEng', document.getElementById('id-admin-nameEng').value); //append file to formData object
    formData.append('rrn', document.getElementById('id-admin-rrnFront').value+"-"+document.getElementById('id-admin-rrnBack').value); //append file to formData object
    formData.append('enteredDate', document.getElementById('id-admin-enteredDate').value); //append file to formData object
    formData.append('birthDate', document.getElementById('id-admin-birthDate').value); //append file to formData object
    formData.append('buseo', document.getElementById('id-admin-buseo').value); //append file to formData object
    formData.append('zikwi', document.getElementById('id-admin-zikwi').value); //append file to formData object
    formData.append('zikcheck', document.getElementById('id-admin-zikcheck').value); //append file to formData object
    formData.append('zikgeop', document.getElementById('id-admin-zikgeop').value); //append file to formData object
    formData.append('phone', document.getElementById('id-admin-phone').value); //append file to formData object
    formData.append('emergencyContact', document.getElementById('id-admin-emergencyContact').value); //append file to formData object
    formData.append('email', document.getElementById('id-admin-email').value); //append file to formData object
    formData.append('address', document.getElementById('id-admin-addressZipcode').value+"/"+document.getElementById('id-admin-address').value+"/"+document.getElementById('id-admin-addressDetail').value); //append file to formData object
    formData.append('fileToUpload', file); //append file to formData object

    
    $.ajax({
        url: "/venus/admin/db/admin/edit.php",
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

});




document.getElementById('accordionSidebar').style.display="none";
document.getElementById('id-admin-zipcode-btn').addEventListener('click',function(){
    new daum.Postcode({

        oncomplete:function(data) {

            jQuery("#postcode1").val(data.postcode1);

            jQuery("#postcode2").val(data.postcode2);

            jQuery("#id-admin-addressZipcode").val(data.zonecode);

            jQuery("#id-admin-address").val(data.address);

            jQuery("#address_etc").focus();

            console.log(data);

        }

    }).open();
});