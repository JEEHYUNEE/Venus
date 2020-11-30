<?php
include_once 'header.php';
include_once 'db/salary/getPayment.php';
include_once 'db/salary/getDeductible.php';
include_once 'db/salary/getSalary.php';
$history = getSalaryHistoryById($_GET['id']);

?>
<style>
        #header{
        display:none;
    }
    #footer{
        display:none;
    }
</style>
<div class="site-section ">
    <div class="container ">
        <!--메뉴 제목 입력-->
        <div class="row justify-content-center text-center ">
            <div class="col-md-7 mb-5 ">
                <h2><?php echo $history['all']['year']."년 ".$history['all']['month']."월 " ?>급여</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5 ml-auto mr-auto">
                <?php
            $payment = getPayment();
            $i=0;
            while($i<sizeof($payment)){
                echo ' <div class="form-group row">';
                for($j=0;$j<2;$j++){
                    if($i==sizeof($payment)) break;
                     echo '<div class="col-md-3 mb-4 mb-lg-0">
                     <div class="form-control form-control-title"> '.$payment[$i]['paymentName'].' </div>
                   </div>';
                   if(isset($history['payment'][$i][$payment[$i]['paymentId']])){
                     echo '<div class="col-md-3">
                     <input disabled type="text" class="form-control" value='.$history['payment'][$i][$payment[$i]['paymentId']].'>
                   </div>';
                   }else{
                       echo '<div class="col-md-3"><input disabled type="text" class="form-control"></div>';
                   }
                   $i++;
                }
                echo '</div>';
            }?>
            <br>
            <?php
            $deductible = getDeductible();
            $i=0;
            while($i<sizeof($deductible)){
                echo ' <div class="form-group row">';
                for($j=0;$j<2;$j++){
                    if($i==sizeof($deductible)) break;
                     echo '<div class="col-md-3 mb-4 mb-lg-0">
                     <div class="form-control form-control-title"> '.$deductible[$i]['deductibleName'].' </div>
                   </div>';
                   if(isset($history['deductible'][$i][$deductible[$i]['deductibleId']])){
                     echo '<div class="col-md-3">
                     <input disabled type="text" class="form-control" value='.$history['deductible'][$i][$deductible[$i]['deductibleId']].'>
                   </div>';
                   }else{
                    echo '<div class="col-md-3"> <input disabled type="text" class="form-control" ></div>';
                   }
                   $i++;
                }
                echo '</div>';
            }?>
            </div>
        </div>
    </div>
</div>
