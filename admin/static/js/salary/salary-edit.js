document.getElementById('id-salary-edit').addEventListener('click',function(){
    
    var formData = new FormData();
    var totalPayment=0;
    var totalDeductible=0;


    for(var i=0;i<document.getElementsByClassName('class-payment').length;i++){
        totalPayment+=Number(document.getElementsByClassName('class-payment')[i].value);
    }
    for(var i=0;i<document.getElementsByClassName('class-deductible').length;i++){
        totalDeductible+=Number(document.getElementsByClassName('class-deductible')[i].value);
    }

    formData.append('year',document.getElementById('year').value);
    formData.append('month',document.getElementById('month').value);
    formData.append('totalPayment',totalPayment);
    formData.append('totalDeductible',totalDeductible);
    formData.append('historyId',new URL(document.URL).searchParams.get('id'));
    formData.append('paymentId',JSON.stringify($('#form-payment').serializeArray()));
    formData.append('deductibleId',JSON.stringify($('#form-deductible').serializeArray()));

    $.ajax({
        url: "/venus/admin/db/salary/edit.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("급여가 수정되었습니다.");
                window.close();
                opener.parent.location.reload();
            }
        }
     });
     
});

document.getElementById('id-salary-delete').addEventListener('click',function(){

    var formData = new FormData();
    formData.append('historyId',new URL(document.URL).searchParams.get('id'));
    
    $.ajax({
        url: "/venus/admin/db/salary/delete.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("급여가 삭제되었습니다..");
                window.close();
                opener.parent.location.reload();
            }
        }
     });
     
});
document.getElementById('accordionSidebar').style.display="none";