document.getElementById('id-zipcode-btn').addEventListener('click',function(){
    new daum.Postcode({

        oncomplete:function(data) {

            jQuery("#postcode1").val(data.postcode1);

            jQuery("#postcode2").val(data.postcode2);

            jQuery("#id-addressZipcode").val(data.zonecode);

            jQuery("#id-address").val(data.address);

            jQuery("#address_etc").focus();

            console.log(data);

        }

    }).open();
});
document.getElementById('id-change-password').addEventListener('click',function(){
    var pwField = document.getElementById('id-password');
    if(this.value=="변경"){
        document.getElementById('id-password').removeAttribute('disabled');
        document.getElementById('id-password').setAttribute('placeholder',"새로운 비밀번호를 입력하세요");
        this.value="취소"
    }else{
        document.getElementById('id-password').setAttribute('placeholder',"");
        document.getElementById('id-password').setAttribute('disabled',"disabled");
        document.getElementById('id-password').value="";
        this.value="변경"
    }
   
});
document.getElementById('id-edit').addEventListener('click',function(){
    var formData = new FormData();
    var jikjong= document.getElementById('id-hopeField'); //append file to formData object
    var jikjongId=jikjong.options[jikjong.selectedIndex].id.split("-")[1];
    formData.append('memberId',document.getElementById('id-memberId').value);
    if(document.getElementById('id-password').value!=""){
        formData.append('password',document.getElementById('id-password').value);
    }
    formData.append('email',document.getElementById('id-email').value);
    formData.append('birthDate',document.getElementById('id-birthDate').value);
    formData.append('phone',document.getElementById('id-phone').value);
    formData.append('address',document.getElementById('id-addressZipcode').value+"/"+document.getElementById('id-address').value+"/"+document.getElementById('id-addressDetail').value);
    formData.append('hopeArea',document.getElementById('id-hopeArea').value);
    formData.append('hopeField',jikjongId);
    formData.append('fileToUpload', document.getElementById("id-profile").files[0]);

    $.ajax({
        url: "/venus/db/member/edit.php?"+Math.random(),
        type: "POST",
        data: formData,
        cache : false,
        processData: false, 
        contentType: false, 
        success: function (msg) {
            if(msg=="SUCCESS"){
                alert("수정이 완료되었습니다..");
                location.href="mypage-main.php";
            }
        }
     });
});
