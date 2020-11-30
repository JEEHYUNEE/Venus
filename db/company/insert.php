<?php
include '../dbcon.php';
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {

            $chk = $con -> prepare('SELECT * FROM company WHERE companyId=:id');
            $chk -> bindParam(':id', $_POST['id']);
            $chk -> execute();
            $result = $chk -> fetchAll(PDO:: FETCH_ASSOC);
            if (sizeof($result) != 0) {
                echo "Already Exist";
            }
            else {
                $password = base64_encode(hash('sha256',$_POST['password'],true));
                $stmt = $con -> prepare('INSERT INTO company(companyId,crn, password, companyName, phone) VALUES(:id, :crn, :password, :name, :phone)');
                $stmt -> bindParam(':id', $_POST['id']);
                $stmt -> bindParam(':crn', $_POST['crn']);
                $stmt -> bindParam(':password', $password);
                $stmt -> bindParam(':name', $_POST['name']);
                $stmt -> bindParam(':phone', $_POST['phone']);

                if ($stmt -> execute()) {
                    echo "SUCCESS";
                }
                else {
                    $errMSG = "사용자 추가 에러";
                }
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
}

?>