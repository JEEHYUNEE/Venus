<?php
include_once 'nav.php';
include_once 'db/company/getCompany.php'
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
                                <th>회사아이디</th>
                                <th>회사코드</th>
                                <th>회사명</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            for($i=0;$i<sizeof($company = getCompany());$i++){
                                echo "<tr class='company-table-row' id='id-company-".$company[$i]['companyId']."'>";
                                echo "<td id='id-companyId-".$company[$i]['companyId']."'>".$company[$i]['companyId']."</td>";
                                echo "<td id='id-companyCode-".$company[$i]['companyCode']."'>".$company[$i]['companyCode']."</td>";
                                echo "<td id='id-companyName-".$company[$i]['companyName']."' >".$company[$i]['companyName']."</td>";
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
    
    for(var i=0;i<document.getElementsByClassName('company-table-row').length;i++){
        document.getElementsByClassName('company-table-row')[i].addEventListener('click',function(){
            // var jobinfoId = this.id.split("-")[2];
            var companyCode = this.children[1].id.split("-")[2];
            var companyName = this.children[2].id.split("-")[2];
            opener.document.getElementById('id-companyCode').value=companyCode;
            opener.document.getElementById('id-companyName').value=companyName;
            window.close();
        });
    }
</script>
