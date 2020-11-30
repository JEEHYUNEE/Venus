
document.getElementById('accordionSidebar').style.display="none";

document.getElementById('id-rm-insert').addEventListener('click',function(){
    var buseo= document.getElementById('id-rm-buseo'); //append file to formData object
    var buseoId=buseo.options[buseo.selectedIndex].id.split("-")[1];
    var type= document.getElementById('id-rm-memberType'); //append file to formData object
    var typeId=type.options[type.selectedIndex].id.split("-")[1];

    var formData = new FormData();

    formData.append('memberId', document.getElementById('id-rm-memberId').value); //append file to formData object
    formData.append('jobinforCode',document.getElementById('id-jobInfoCode').value);
    formData.append('companyCode',document.getElementById('id-companyCode').value);
    formData.append('buseoId', buseoId); //append file to formData object
    formData.append('memberType', typeId); //append file to formData object
    formData.append('enteredDate', document.getElementById('id-rm-enteredDate').value); //append file to formData object


    $.ajax({
        url: "/venus/admin/db/regular-member/insert.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("정규회원 등록이 완료되었습니다..");
                window.close();
                opener.parent.location.reload();
            }
        }
     });
});
document.getElementById('id-jobinfoSearch').addEventListener('click',function(){
    
   window.open("findJobinfoCode.php","findJobinfo","width=600,height=600,resizable=yes,scrollbars=yes,resizable=yes");
});