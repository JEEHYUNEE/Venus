document.getElementById('id-payment-insert').addEventListener('click',function(){

    var formData = new FormData();

    formData.append('paymentName', document.getElementById('id-payment-name-insert').value); //append file to formData object

    $.ajax({
        url: "/venus/admin/db/salary/payment/insert.php",
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
for(var i=0;i<document.getElementsByClassName('payment-edit').length;i++){
    document.getElementsByClassName('payment-edit')[i].addEventListener('click',function(){
        var formData = new FormData();
    var paymentId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('paymentId', paymentId); //append file to formData object
    formData.append('paymentName', document.getElementById('id-payment-name-'+paymentId).value); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/salary/payment/edit.php",
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
for(var i=0;i<document.getElementsByClassName('payment-delete').length;i++){
    document.getElementsByClassName('payment-delete')[i].addEventListener('click',function(){
        var formData = new FormData();
    var paymentId=this.parentNode.parentNode.id.split("-")[2];
    formData.append('paymentId', paymentId); //append file to formData object
    $.ajax({
        url: "/venus/admin/db/salary/payment/delete.php",
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