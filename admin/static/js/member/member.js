

for(var i=0;i<document.getElementsByClassName('member-table-row').length;i++){
    document.getElementsByClassName('member-table-row')[i].addEventListener('click',function(){ 
        var id=this.parentNode.id.split("-")[2];
        window.open("member-form.php?id="+id,"proposalComment","width=900,height=800,resizable=yes,scrollbars=yes,resizable=yes");
    });
}
for (var i=0;i<document.getElementsByClassName('change-regular-member').length;i++){
    document.getElementsByClassName('change-regular-member')[i].addEventListener('click',function(){ 
        var id=this.parentNode.parentNode.id.split("-")[2];
        window.open("change-regular-member.php?id="+id,"proposalComment","width=600,height=660,resizable=yes,scrollbars=yes,resizable=yes");
    });
}