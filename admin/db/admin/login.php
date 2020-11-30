<?php
include '../dbcon.php';
include "../../session.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {
            $stmt = $con->prepare("SELECT * FROM administrator WHERE adminId=:id and password=:password");
            $password = base64_encode(hash('sha256',$_POST['password'],true));
            

            $stmt->bindParam(':id',$_POST['adminId']);
            $stmt->bindParam(':password',$password);
            $stmt -> execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(sizeof($result)!=0)
             {
                echo "SUCCESS";
                $_SESSION['adminId'] = $_POST['adminId'];
            }
            else {
                echo "해당 아이디가 존재하지 않습니다";
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
}
?>