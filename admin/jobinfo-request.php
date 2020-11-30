<?php
include_once 'nav.php';
include_once 'db/jobinfo-request/getJobInfoRequest.php';

?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">구인의뢰관리</h1>
            <p class="mb-4">구인의뢰를 확인/수정/삭제 할 수 있습니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">구인의뢰 TABLE</h6>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>num</th>
                                <th>제목</th>
                                <th>이름</th>
                                <th>email</th>
                                <th>tel</th>
                                <th>회사명</th>
                                <th>직급</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                            for($i=0;$i<sizeof( $jr = getJobInfoRequest());$i++){
                              

                                echo "<tr class='tr-jr' id='id-jr-".$jr[$i]['jrId']."' >";
                                echo "<td>".$jr[$i]['jrId']."</td>";
                                echo "<td>".$jr[$i]['title']."</td>";
                                echo "<td>".$jr[$i]['name']."</td>";
                                echo "<td>".$jr[$i]['email']."</td>";
                                echo "<td>".$jr[$i]['phone']."</td>";
                                echo "<td>".$jr[$i]['companyName']."</td>";
                                echo "<td>".$jr[$i]['position']."</td>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    for(var  i=0;i<document.getElementsByClassName('tr-jr').length;i++){
        document.getElementsByClassName('tr-jr')[i].addEventListener('click',function(){
            
            window.open("show-jobinfo-request.php?id="+this.children[0].innerHTML,"proposalComment","width=460,height=600,resizable=yes,scrollbars=yes,resizable=yes");
        });
    }
</script>

<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>