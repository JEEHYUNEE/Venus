<?php
include_once 'nav.php';
include_once 'db/company/getCompany.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">기업회원</h1>
            <p class="mb-4">기업회원정보를 수정/삭제가 가능한 페이지 입니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">기업회원 TABLE</h6>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>회사이름</th>
                                <th>대표이사</th>
                                <th>업태</th>
                                <th>희망구인분야</th>
                                <th>회사전화</th>
                                <th>회사주소</th>
                                <th>담당전화</th>
                                <th>홈페이지</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $company = getCompany();
                            for($i=0;$i<sizeof($company);$i++){
                                echo "<tr class='company-table-row' id='id-company-".$company[$i]['companyId']."'>";
                                echo "<td>".$company[$i]['companyId']."</td>";
                                echo "<td>".$company[$i]['companyName']."</td>";
                                echo "<td>".$company[$i]['ceoName']."</td>";
                                echo "<td>".$company[$i]['uptaeId']."</td>";
                                echo "<td>".$company[$i]['jikjongId']."</td>";
                                echo "<td>".$company[$i]['phone']."</td>";
                                echo "<td>".$company[$i]['address']."</td>";
                                echo "<td>".$company[$i]['managerPhone']."</td>";
                                echo "<td>".$company[$i]['homepageUrl']."</td>";
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


<script src="static/js/company/company.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
