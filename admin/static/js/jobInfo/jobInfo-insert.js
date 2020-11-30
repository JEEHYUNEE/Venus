document.getElementById('id-insert-jobInfo').addEventListener('click',function(){
    var formData = new FormData();

    // var region= document.getElementById('id-region'); //append file to formData object
    // var regionId=region.options[region.selectedIndex].id.split("-")[1];

    var jikjong= document.getElementById('id-jikjong'); //append file to formData object
    var jikjongId=jikjong.options[jikjong.selectedIndex].id.split("-")[1];

    var MyDiv2 = document.getElementsByClassName('note-editable');
    m = MyDiv2[0];

    formData.append('companyCode', document.getElementById('id-companyCode').value); //append file to formData object
    formData.append('companyName',document.getElementById('id-companyName').value);
    formData.append('workPosition',document.getElementById('id-workPosition').value);
    formData.append('workPlace', document.getElementById('id-workPlace').value); //append file to formData object
    formData.append('region', document.getElementById('id-region').value); //append file to formData object
    formData.append('subRegion', document.getElementById('id-subRegion').value); //append file to formData object
    formData.append('jikjong',  jikjongId); //append file to formData object
    formData.append('applyNumber', document.getElementById('id-applyNumber').value); //append file to formData object
    formData.append('dueDate', document.getElementById('id-dueDate').value); //append file to formData object
    formData.append('managerName', document.getElementById('id-managerName').value); //append file to formData object
    formData.append('managerPhone', document.getElementById('id-managerPhone').value); //append file to formData object
    formData.append('managerEmail', document.getElementById('id-managerEmail').value); //append file to formData object
    formData.append('contents', m.innerHTML); //append file to formData object


    $.ajax({
        url: "/venus/admin/db/jobInfo/insert.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("구인정보 등록이 완료되었습니다..");
                location.href="jobInfo.php";
            }
        }
     });
});


document.getElementById('id-search-companyCode').addEventListener('click',function(){
    window.open("findCompanyCode.php","proposalComment","width=600,height=600,resizable=yes,scrollbars=yes,resizable=yes");
});