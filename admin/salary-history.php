<?php
include_once 'nav.php';
include_once 'db/salary/getSalary.php';

?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">정규회원급여관리</h1>
            <p class="mb-4">정규회원의 급여 정보를 입력 및 수정/삭제 할 수 있습니다</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">정규회원 TABLE</h6>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>급여년도/월</th>
                                <th>지급총액</th>
                                <th>공제총액</th>
                                <th>총급여액</th>
                                <th>예금주/계좌</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                            for($i=0;$i<sizeof( $salaryHistory = getSalaryHistory($_GET['id']));$i++){
                              

                                echo "<tr class='tr-salary-history' id='id-salaryHistory-".$salaryHistory[$i]['historyId']."' >";
                                echo "<td>".$salaryHistory[$i]['year']."/".$salaryHistory[$i]['month']."</td>";
                                echo "<td>".$salaryHistory[$i]['totalPayment']."</td>";
                                echo "<td>".$salaryHistory[$i]['totalDeductible']."</td>";
                                echo "<td>".$salaryHistory[$i]['totalSalary']."</td>";
                                echo "<td>".$salaryHistory[$i]['accountHolder']."/(".$salaryHistory[$i]['bankName'].")".$salaryHistory[$i]['account']."</td>";
                                }
                            ?>
                        </tbody>
                        <div class="form-group row">
        <div class="col-sm-11 mb-3 mb-sm-0"></div>
        
        <div class="col-sm-1 mb-3 mb-sm-0">
          <a id='id-salary-insert' >급여등록</a>
        </div>
      </div>
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
</script>

<script src="static/js/salary/salary-history.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>