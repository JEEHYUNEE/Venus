<?php
include '../dbcon.php';
include '../regular-member/getRegularMember.php';

$result = null;
$totalPayment = 0;
$totalDeductible = 0;
$accountHolder=getRegularMemberById($_POST['id'])[0]['accountHolder'];
$bankName=getRegularMemberById($_POST['id'])[0]['bankName'];
$account=getRegularMemberById($_POST['id'])[0]['account'];

    if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        if (!isset($errMSG)) {
            try {
                $stmt = $con -> prepare('INSERT INTO salary_history(year, month, memberId,totalSalary,totalPayment,totalDeductible,paymentId,deductibleId,accountHolder,bankName,account) values(:year,:month,:memberId,:totalSalary,:totalPayment,:totalDeductible,:paymentId,:deductibleId,:accountHolder,:bankName,:account)');//여기서 memberId는 정규회원아이디 이당~~
                $sum  = $_POST['totalPayment']-$_POST['totalDeductible'];

                $data1=json_encode( $_POST['paymentId']);
                $data2=json_encode( $_POST['deductibleId']);

                $stmt -> bindParam(':year', $_POST['year']);
                $stmt -> bindParam(':month', $_POST['month']);
                $stmt -> bindParam(':memberId', $_POST['id']);
                $stmt -> bindParam(':totalSalary', $sum);
                $stmt -> bindParam(':totalPayment', $_POST['totalPayment']);
                $stmt -> bindParam(':totalDeductible', $_POST['totalDeductible']);
                $stmt -> bindParam(':paymentId',$data1);
                $stmt -> bindParam(':deductibleId',$data2);
                $stmt -> bindParam(':accountHolder',$accountHolder);
                $stmt -> bindParam(':bankName',$bankName);
                $stmt -> bindParam(':account',$account);


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