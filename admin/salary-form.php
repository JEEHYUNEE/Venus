<?php
include_once 'nav.php';
include_once 'db/salary/payment/getPayment.php';
include_once 'db/salary/deductible/getDeductible.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">급여데이터등록</h1>
      <p class="mb-4">급여데이터를 등록할 수 있는 페이지 입니다. </p>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">지급액</h6>
        </div>
        <div class="card-body">
          <form id='form-payment' class="user">
            <?php
            $payment = getPayment();
            $i=0;
            while($i<sizeof($payment)){
                echo ' <div class="form-group row">';
                for($j=0;$j<4;$j++){
                    if($i==sizeof($payment)) break;
                     echo '<div class="col-sm-1 mb-3 mb-sm-0">
                     <div class="form-field-title"> '.$payment[$i]['paymentName'].' </div>
                   </div>';
                     echo '<div class="col-sm-2 mb-3 mb-sm-0">
                     <input id="payment-'.$payment[$i]['paymentId'].'" name="'.$payment[$i]['paymentId'].'" type="text" class="form-field-title-white class-payment">
                   </div>';
                   $i++;
                }
                echo '</div>';
            }
          ?>
            <hr>
          </form>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">공제액</h6>
        </div>
        <div class="card-body">
          <form id='form-deductible' class="user">
            <?php
            $deductible = getDeductible();
            $i=0;
            while($i<sizeof($deductible)){
                echo ' <div class="form-group row">';
                for($j=0;$j<4;$j++){
                    if($i==sizeof($deductible)) break;
                     echo '<div class="col-sm-1 mb-3 mb-sm-0">
                     <div class="form-field-title"> '.$deductible[$i]['deductibleName'].' </div>
                   </div>';
                     echo '<div class="col-sm-2 mb-3 mb-sm-0">
                     <input id="deductible-'.$deductible[$i]['deductibleId'].'" name="'.$deductible[$i]['deductibleId'].'"  type="text" class="form-field-title-white class-deductible">
                   </div>';
                   $i++;
                }
                echo '</div>';
            }
          ?>
            <hr>
          </form>
        </div>

      </div>
      <div class="form-group row">
        <div class="col-sm-3 mb-3 mb-sm-0"></div>
        <div class="col-sm-2 mb-3 mb-sm-0">
          <input type="text" class='form-field-title-white' placeholder='급여년도' id='year'></div>
        <div class="col-sm-2 mb-3 mb-sm-0">
          <input type="text" class='form-field-title-white' placeholder='급여월' id='month'></div>
        <div class="col-sm-1 mb-3 mb-sm-0">
          <div id='id-salary-insert' class='form-field-title register-btn'>등록</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<script src="static/js/salary/salary-insert.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });
    // document.getElementById('example_filter').style.display="none";
</script>