
document.getElementById('id-company-edit').addEventListener('click',function(){

    var uptae= document.getElementById('id-company-uptae'); //append file to formData object
    var uptaeId=uptae.options[uptae.selectedIndex].id.split("-")[1];
    var jikjong= document.getElementById('id-company-jikjong'); //append file to formData object
    var jikjongId=jikjong.options[jikjong.selectedIndex].id.split("-")[1];
    var formData = new FormData();
    
    formData.append('companyId', document.getElementById('id-company-companyId').value); //append file to formData object
    formData.append('name', document.getElementById('id-company-name').value); //append file to formData object
    if(document.getElementById('id-company-password').value!="")
        formData.append('password', document.getElementById('id-company-password').value); //append file to formData object
    formData.append('ceoName', document.getElementById('id-company-ceoName').value); //append file to formData object
    formData.append('crn', document.getElementById('id-company-crn').value); //append file to formData object
    formData.append('phone', document.getElementById('id-company-phone').value); //append file to formData object
    formData.append('fax', document.getElementById('id-company-fax').value); //append file to formData object
    formData.append('address',document.getElementById('id-company-addressZipcode').value+"/"+document.getElementById('id-company-address').value+"/"+document.getElementById('id-company-addressDetail').value); //append file to formData object
    formData.append('managerName', document.getElementById('id-company-managerName').value); //append file to formData object
    formData.append('managerEmail', document.getElementById('id-company-managerEmail').value); //append file to formData object
    formData.append('managerPhone', document.getElementById('id-company-managerPhone').value); //append file to formData object
    formData.append('uptaeId', uptaeId); //append file to formData object
    formData.append('jikjongId', jikjongId); //append file to formData object
    formData.append('homepageUrl', document.getElementById('id-company-homepageUrl').value); //append file to formData object

    $.ajax({
        url: "/venus/admin/db/company/edit.php",
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


document.getElementById('id-company-delete').addEventListener('click',function(){

    var formData = new FormData();

    formData.append('companyId', document.getElementById('id-company-companyId').value); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/company/delete.php",
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
});


document.getElementById('id-company-zipcode-btn').addEventListener('click',function(){
    new daum.Postcode({

        oncomplete:function(data) {

            jQuery("#postcode1").val(data.postcode1);

            jQuery("#postcode2").val(data.postcode2);

            jQuery("#id-company-addressZipcode").val(data.zonecode);

            jQuery("#id-company-address").val(data.address);

            jQuery("#address_etc").focus();

            console.log(data);

        }

    }).open();
});

document.getElementById('accordionSidebar').style.display="none";