<?php
include $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/dbcon.php';
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {
                if($_POST['status']=="채용대기") // 잘못 처리해서 대기로 돌아갈 경우에는 처리날짜가 null로 바껴야함
                    $date=null;
                else
                    $date = date('Y-m-d');
                $stmt = $con -> prepare('UPDATE apply SET status=:status, resultDate=:date  WHERE applyId=:id');
                $stmt -> bindParam(':status', $_POST['status']);
                $stmt -> bindParam(':id', $_POST['applyId']);
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