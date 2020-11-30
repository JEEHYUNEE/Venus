<?php
include $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/dbcon.php';
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {
               
                $stmt = $con -> prepare('SELECT status from apply where jobInfoId=:jobInfoId and memberId=:memberId and status="채용"');
                $stmt -> bindParam(':jobInfoId', $_POST['jobInfoId']);
                $stmt -> bindParam(':memberId', $_POST['memberId']);

                if ($stmt -> execute()) {
                    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
                    if(sizeof($result)!=0){
                        echo "SUCCESS";
                                        }                    else
                        echo "NODATA";
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