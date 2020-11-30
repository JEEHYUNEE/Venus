<?php
include_once 'nav.php';
include_once 'db/salary/payment/getPayment.php';
include_once 'db/salary/deductible/getDeductible.php';
include_once 'db/salary/getSalary.php';
$history = getSalaryHistoryById($_GET['id']);

?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="form-group row">
        
        <div class="col-sm-9 mb-3 mb-sm-0"></div>
        <div class="col-sm-2 mb-3 mb-sm-0">
            <input id='year'  class="form-field-title-white" value="<?php echo $history['all']['year'] ?>">
        </div>
        <div class="col-sm-1 mb-3 mb-sm-0">
            <input id='month' class="form-field-title-white" value="<?php echo $history['all']['month'] ?>">
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">지급액 </h6><span><?php echo $history['all']['totalPayment'] ?>원</span>
        </div>
        <div class="card-body">
          <form id='form-payment' class="user">
            <?php
            $payment = getPayment();
            $i=0;
            while($i<sizeof($payment)){
                echo ' <div class="form-group row">';
                for($j=0;$j<3;$j++){
                    if($i==sizeof($payment)) break;
                     echo '<div class="col-sm-2 mb-3 mb-sm-0">
                     <div class="form-field-title"> '.$payment[$i]['paymentName'].' </div>
                   </div>';
                   if(isset($history['payment'][$i][$payment[$i]['paymentId']])){
                     echo '<div class="col-sm-2 mb-3 mb-sm-0">
                     <input id="payment-'.$payment[$i]['paymentId'].'" name="'.$payment[$i]['paymentId'].'" type="text" class="form-field-title-white class-payment" value = "'.$history['payment'][$i][$payment[$i]['paymentId']].'"> </div>';
                   }else{
                     echo '<div class="col-sm-2 mb-3 mb-sm-0">
                     <input id="payment-'.$payment[$i]['paymentId'].'" name="'.$payment[$i]['paymentId'].'" type="text" class="form-field-title-white class-payment" ></div>';
                       }
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
          <h6 class="m-0 font-weight-bold text-primary">공제액</h6><span><?php echo $history['all']['totalDeductible'] ?>원</span>
        </div>
        <div class="card-body">
          <form id='form-deductible' class="user">
            <?php
            $deductible = getDeductible();
            $i=0;
            while($i<sizeof($deductible)){
                echo ' <div class="form-group row">';
                for($j=0;$j<3;$j++){
                    if($i==sizeof($deductible)) break;
                     echo '<div class="col-sm-2 mb-3 mb-sm-0">
                     <div class="form-field-title"> '.$deductible[$i]['deductibleName'].' </div>
                   </div>';
                   if(isset($history['deductible'][$i][$deductible[$i]['deductibleId']])){
                     echo '<div class="col-sm-2 mb-3 mb-sm-0">
                     <input id="deductible-'.$deductible[$i]['deductibleId'].'" name="'.$deductible[$i]['deductibleId'].'"  type="text" class="form-field-title-white class-deductible" value="'.$history['deductible'][$i][$deductible[$i]['deductibleId']].'"></div>';
                    }else{
                      echo '<div class="col-sm-2 mb-3 mb-sm-0">
                     <input id="deductible-'.$deductible[$i]['deductibleId'].'" name="'.$deductible[$i]['deductibleId'].'"  type="text" class="form-field-title-white class-deductible" >
                     </div>';
                    }
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
      <div class="col-sm-4 mb-3 mb-sm-0"></div>    
        <div class="col-sm-2 mb-3 mb-sm-0">
            <div id = 'id-salary-edit' class='form-field-title register-btn'>수정</div>
        </div> 
        <div class="col-sm-2 mb-3 mb-sm-0">
            <div id='id-salary-delete' class='form-field-title register-btn'>삭제</div>
        </div> 
       </div>

    </div>
  </div>
</div>
</div>


<script src="static/js/salary/salary-edit.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });
     
</script>