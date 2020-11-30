for(var i=0;i<document.getElementsByClassName('company-table-row').length;i++){
    document.getElementsByClassName('company-table-row')[i].addEventListener('click',function(){ 
        window.open("company-form.php?id="+this.id.split("-")[2],"proposalComment","width=900,height=800,resizable=yes,scrollbars=yes,resizable=yes");
    });
}
