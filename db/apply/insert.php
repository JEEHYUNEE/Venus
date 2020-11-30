<?php
include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {

                // 후 넣기
                $date = date('Y-m-d');
                $stmt = $con -> prepare('INSERT INTO apply(memberId, jobInfoId, cvPath, RegisterDate) VALUES(:memberId, :jobInfoId, (SELECT cvPath from cv WHERE cvId=:cvId), :date)');
                $stmt -> bindParam(':memberId', $_POST['memberId']);
                $stmt -> bindParam(':jobInfoId', $_POST['jobInfoId']);
                $stmt -> bindParam(':cvId', $_POST['cvId']);
                $stmt -> bindParam(':date', $date);

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