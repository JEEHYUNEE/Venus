for(var i=0;i<document.getElementsByClassName('jobInfo-table-row').length;i++){
    document.getElementsByClassName('jobInfo-table-row')[i].addEventListener('click',function(){
        location.href="show-jobInfo.php?id="+this.innerHTML;
    });
}
for (var i=0;i<document.getElementsByClassName('class-status').length;i++){
    document.getElementsByClassName('class-status')[i].addEventListener('change',function(){
        if(confirm('상태를 변경하시겠습니까?')){
    
            var formData = new FormData();
            formData.append('status',this.value);
            formData.append('applyId',this.parentNode.parentNode.children[0].innerHTML);
    
            $.ajax({
                url: "/venus/admin/db/apply/edit.php",
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false, 
                success: function (msg) {
                    if(msg=="SUCCESS"){
                        location.reload();
                    }
                }
             });
        }else{
    
        }
    });
}
