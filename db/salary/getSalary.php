<?php

function getSalaryHistory($id){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';

    $result = null;

    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT * FROM salary_history WHERE memberId=(SELECT rmId FROM regularmember WHERE memberId=:id)');
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
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';

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

function getSalaryHistory_limit($id,$start_num, $list){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM salary_history WHERE memberId=(SELECT rmId FROM regularmember WHERE memberId=:id) order by historyId    desc limit '.$start_num.",".$list);
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
?>