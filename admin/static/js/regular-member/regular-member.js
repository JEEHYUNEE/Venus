
for (var i=0;i<document.getElementsByClassName('class-member').length;i++){
    document.getElementsByClassName('class-member')[i].addEventListener('click',function(){
        // alert(this.innerHTML);
        // var id= this.parentNode.id.split("-")[2];
        window.open("member-form.php?id="+this.innerHTML,"proposalComment","width=880,height=700,resizable=yes,scrollbars=yes,resizable=yes");
    });
}
for (var i=0;i<document.getElementsByClassName('class-rm').length;i++){
    document.getElementsByClassName('class-rm')[i].addEventListener('click',function(){
        var id= this.parentNode.id.split("-")[2];
        window.open("regular-member-form.php?id="+id,"proposalComment","width=880,height=800,resizable=yes,scrollbars=yes,resizable=yes");
    });
}
for (var i=0;i<document.getElementsByClassName('show-salary-history').length;i++){
    document.getElementsByClassName('show-salary-history')[i].addEventListener('click',function(){
        var id= this.parentNode.parentNode.id.split("-")[2];
        location.href="salary-history.php?id="+id;
    });
}