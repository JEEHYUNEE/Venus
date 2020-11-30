<?php
include_once '../dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/venus/admin/session.php';

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {

            $stmt = $con-> prepare('SELECT * FROM company WHERE companyId=:id and password=:password');
            $password = base64_encode(hash('sha256',$_POST['password'],true));
            $stmt->bindParam(':id',$_POST['id']);
            $stmt->bindParam(':password',$password);
            $stmt -> execute();
            $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
            if(sizeof($result)!=0)
            {
                echo "SUCCESS";
                $_SESSION["companyId"]=$_POST['id'];

            }
            else {
                echo "Doesn't exist";
            }
        }catch (PDOException $e) {
        die("Database error: ".$e -> getMessage());
        }
        
    }
}

?>