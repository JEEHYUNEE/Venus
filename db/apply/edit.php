<?php
include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
if (($_SERVER['REQUEST_METHOD'] == 'GET')) {
    if (!isset($errMSG)) {
        try {

                $date = date('Y-m-d');
                $stmt = $con -> prepare('UPDATE apply SET status="취소", resultDate=:date  WHERE applyId=:id');
                $stmt -> bindParam(':id', $_GET['id']);
                $stmt -> bindParam(':date', $date);

                if ($stmt -> execute()) {
                    echo "<script>alert('취소처리 되었습니다.');</script>";
                    echo "<script>location.href='/venus/mypage-apply.php';</script>";
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