<?php
include '../dbcon.php';
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {

            // 중복검사
            $chk = $con -> prepare('SELECT * FROM member WHERE memberId=:id');
            $chk -> bindParam(':id', $_POST['id']);
            $chk -> execute();
            $result = $chk -> fetchAll(PDO:: FETCH_ASSOC);
            if (sizeof($result) != 0) {
                echo "Already Exist";
            }
            else {
                // 후 넣기
                $stmt = $con -> prepare('INSERT INTO member(memberId, email, password, name, phone) VALUES(:id, :email, :password, :name, :phone)');
                $password = base64_encode(hash('sha256',$_POST['password'],true));
                $stmt -> bindParam(':id', $_POST['id']);
                $stmt -> bindParam(':email', $_POST['email']);
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