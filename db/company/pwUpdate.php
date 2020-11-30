<?php
include $_SERVER['DOCUMENT_ROOT']."/venus/db/dbcon.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        try {

            $password = base64_encode(hash('sha256',$_POST['password'],true));
            $stmt = $con -> prepare('UPDATE company set password=:password  WHERE companyId=:companyId');
            $stmt -> bindParam(':password', $password);
            $stmt -> bindParam(':companyId', $_POST['companyId']);

            if ($stmt -> execute()) {
                echo "SUCCESS";
            }
            else {
                $errMSG = "비밀번호 수정 에러";
                echo $errMSG;
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
}
?>