<?php

function getSalaryHistory($id){
    include 'db/dbcon.php';

    $result = null;

    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT * FROM salary_history WHERE memberId=:id');
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
function getSalaryHistoryById($historyId){
    include 'db/dbcon.php';
    // include 'db/salary/payment/getPayment.php';

    $result = null;
    $history=null;

    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT * FROM salary_history WHERE historyId=:id');
            $stmt->bindParam(':id',$historyId);

            if ($stmt -> execute()) {
                $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
                $data = json_decode((json_decode($result[0]['paymentId'])));

                for($i=0;$i<sizeof($data);$i++){
                    $history['payment'][$i][$data[$i]->name]=$data[$i]->value;
                }
                $data = json_decode((json_decode($result[0]['deductibleId'])));
                for($i=0;$i<sizeof($data);$i++){
                    $history['deductible'][$i][$data[$i]->name]=$data[$i]->value;
                }
                $history['all']=$result[0];
            }
            else {
                $errMSG = "사용자 추가 에러";
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
    return $history;
}

?>