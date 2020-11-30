<?php
include '../dbcon.php';


    if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        if (!isset($errMSG)) {
            try {
                $stmt = $con->prepare('UPDATE salary_history SET year=:year, month=:month, totalSalary=:totalSalary, totalPayment=:totalPayment, totalDeductible=:totalDeductible, paymentId=:paymentId, deductibleId=:deductibleId WHERE historyId=:historyId');
                
                $sum  = $_POST['totalPayment']-$_POST['totalDeductible'];
                $data1=json_encode( $_POST['paymentId']);
                $data2=json_encode( $_POST['deductibleId' ]);


                $stmt -> bindParam(':year', $_POST['year']);
                $stmt -> bindParam(':month', $_POST['month']);
                $stmt -> bindParam(':totalSalary', $sum);
                $stmt -> bindParam(':totalPayment', $_POST['totalPayment']);
                $stmt -> bindParam(':totalDeductible', $_POST['totalDeductible']);
                $stmt -> bindParam(':paymentId',$data1);
                $stmt -> bindParam(':deductibleId',$data2);
                $stmt -> bindParam(':historyId',$_POST['historyId']);

                if ($stmt -> execute()) {
                    echo "SUCCESS";
                }
                else {
                    $errMSG = "사용자 추가 에러";
                }

            } catch (PDOException $e) {
                die("Database error: ".$e -> getMessage());
            }
        }
    }
?>