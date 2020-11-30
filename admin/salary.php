<?php
include_once 'nav.php';
include_once 'db/salary/payment/getPayment.php';
include_once 'db/salary/deductible/getDeductible.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content" class="col-sm-11" style="margin:0 auto;">

        <div class="container-fluid" style="width:45%; display:inline-block;">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">지급 관리</h1>
            <p class="mb-4">지급 정보를 추가/삭제/변경 가능한 페이지입니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">지급 TABLE</h6>
                </div>
                
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input id="id-payment-name-insert" type="text" class="form-field-title-white" placeholder="지급명">
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                        <div id="id-payment-insert"  class="form-field-title">등록</div>
                        </div>
                    </div>
                    <table id="example1" class="display">
                        <thead>
                            <tr>
                                <th>지급 코드</th>
                                <th>지급명</th>
                                <th>.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $payment=getpayment();
                                for($i=0;$i<sizeof($payment);$i++){
                                    echo "<tr id='id-payment-".$payment[$i]['paymentId']."'>";
                                    echo "<td>".$payment[$i]['paymentId']."</td>";
                                    echo "<td><input id='id-payment-name-".$payment[$i]['paymentId']."' type='text' value='".$payment[$i]['paymentName']."'>
                                    <span hidden>".$payment[$i]['paymentName']."</span></td>";
                                    echo "<td><button class='payment-edit'>수정</button><button class='payment-delete'>삭제</button></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
       <div class=" container-fluid" style="width:45%; display:inline-block;">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">공제 관리</h1>
            <p class="mb-4">공제 정보를 추가/삭제/변경 가능한 페이지입니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">공제 TABLE</h6>
                </div>
                
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input id="id-deductible-name-insert" type="text" class="form-field-title-white" placeholder="공제명">
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                        <div id="id-deductible-insert"  class="form-field-title">등록</div>
                        </div>
                    </div>
                    <table id="example2" class="display">
                        <thead>
                            <tr>
                                <th>공제 코드</th>
                                <th>공제명</th>
                                <th>.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for($i=0;$i<sizeof($deductible=getDeductible());$i++){
                                    echo "<tr id='id-deductible-".$deductible[$i]['deductibleId']."'>";
                                    echo "<td>".$deductible[$i]['deductibleId']."</td>";
                                    echo "<td><input id='id-deductible-name-".$deductible[$i]['deductibleId']."' type='text' value='".$deductible[$i]['deductibleName']."'><span hidden>".$deductible[$i]['deductibleName']."</span></td>";
                                    echo "<td><button class='deductible-edit'>수정</button><button class='deductible-delete'>삭제</button></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="static/js/salary/payment/payment.js"></script>
<script src="static/js/salary/deductible/deductible.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example1').DataTable();
        $('#example2').DataTable();
    });
    // document.getElementById('example_filter').style.display="none";
</script>
