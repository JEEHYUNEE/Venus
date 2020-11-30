<?php
include_once 'nav.php';
include_once 'db/jobInfo/getJobInfo.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>채용코드</th>
                                <th>회사코드</th>
                                <th>회사명</th>
                                <th>근무처</th>
                                <th>근무지</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            for($i=0;$i<sizeof($jobinfo = getJobInfo());$i++){
                                echo "<tr class='jobinfo-table-row' id='id-jobinfo-".$jobinfo[$i]['id']."'>";
                                echo "<td id='id-jobinfoId-".$jobinfo[$i]['id']."'>".$jobinfo[$i]['id']."</td>";
                                echo "<td id='id-companyCode-".$jobinfo[$i]['companyCode']."'>".$jobinfo[$i]['companyCode']."</td>";
                                echo "<td >".$jobinfo[$i]['companyName']."</td>";
                                echo "<td id='".$jobinfo[$i]['workPosition']."' >".$jobinfo[$i]['workPosition']."</td>";
                                echo "<td >".$jobinfo[$i]['workPlace']."</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>

<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    
    document.getElementById('accordionSidebar').style.display="none";
    
    $(document).ready(function () {
        $('#example').DataTable();
    });
    
    for(var i=0;i<document.getElementsByClassName('jobinfo-table-row').length;i++){
        document.getElementsByClassName('jobinfo-table-row')[i].addEventListener('click',function(){
            // var jobinfoId = this.id.split("-")[2];
            var formData = new FormData();
            var jobinfoId = this.children[0].id.split("-")[2];
            var companyCode = this.children[1].id.split("-")[2];
            var memberId = opener.document.getElementById('id-rm-memberId').value;


            formData.append('jobInfoId', jobinfoId); //append file to formData object
            formData.append('memberId',memberId);

            $.ajax({
            url: "/venus/admin/db/apply/check-apply.php",
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            success: function (msg) {
                if(msg=="SUCCESS"){
                opener.document.getElementById('id-jobInfoCode').value=jobinfoId;
                opener.document.getElementById('id-companyCode').value=companyCode;
                window.close();
                }
                else{
                    alert("해당 구인정보의 회원의 지원상태가 [채용]상태가 아닙니다!");
                }
            }
         });

            
        });
    }
</script>
