document.getElementById('id-salary-insert').addEventListener('click',function(){
    
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
    formData.append('id',new URL(document.URL).searchParams.get('id'));
    formData.append('paymentId',JSON.stringify($('#form-payment').serializeArray()));
    formData.append('deductibleId',JSON.stringify($('#form-deductible').serializeArray()));


    $.ajax({
        url: "/venus/admin/db/salary/insert.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("급여가 등록되었습니다.");
                var id = new URL(document.URL).searchParams.get('id');
                location.href="salary-history.php?id="+id;
            }
        }
     });
     
});