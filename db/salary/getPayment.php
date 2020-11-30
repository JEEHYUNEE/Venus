<?php
function getPayment(){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/dbcon.php';

    $result = null;

    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT * FROM payment');

            if ($stmt -> execute()) {
                $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
            }
            else {
                $errMSG = "사용자 추가 에러";
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
    return $result;
}
function getPaymentId(){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/dbcon.php';

    $result = null;
    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT paymentId FROM payment');

            if ($stmt -> execute()) {
                $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
            }
            else {
                $errMSG = "사용자 추가 에러";
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
    return $result;
}
function getPaymentById($id){
    include '../dbcon.php';

    $result = null;
    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT paymentName FROM payment WHERE paymentId=:id');
            $stmt->bindParam(':id',$id);
            
            if ($stmt -> execute()) {
                $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
            }
            else {
                $errMSG = "사용자 추가 에러";
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
    return $result;
}
?>