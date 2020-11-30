document.getElementById('id-salary-insert').addEventListener('click',function(){
    var id = new URL(document.URL).searchParams.get('id');
    location.href="salary-form.php?id="+id;
});


    

for(var i=0;i<document.getElementsByClassName('tr-salary-history').length;i++){
    document.getElementsByClassName('tr-salary-history')[i].addEventListener('click',function(){
        window.open("show-salary-history.php?id="+this.id.split("-")[2],"proposalComment","width=1000,height=760,resizable=yes,scrollbars=yes,resizable=yes");
    });
}